#![allow(non_snake_case)]
#![allow(unused_variables)]
#![allow(unused_imports)]
use warp::{http::StatusCode, Filter, Rejection};
use dotenvy::dotenv;
use neo4rs::*;
use std::env;
use serde::{Deserialize, Serialize};
use std::fs;
use std::sync::atomic::*;
use futures::stream::*;
use std::sync::Arc;

mod handlers;

#[derive(Serialize, Deserialize)]
struct CustomUrls {
    name: String,
    url: String,
}

#[derive(Serialize, Deserialize)]
struct Endpoints {
    customUrls: Vec<CustomUrls>,
}

type Result<T> = std::result::Result<T, Rejection>;

#[tokio::main]
async fn main() {
    let _ = dotenvy::dotenv_override();
    dotenv().expect("failed to read .env file");
    let database_uri = dotenvy::var("DATABASE_URI").unwrap();
    let database_username = dotenvy::var("DATABASE_USERNAME").unwrap();
    let database_password = dotenvy::var("DATABASE_PASSWORD").unwrap();
    
    let config = ConfigBuilder::default()
        .uri(database_uri)
        .user(database_username)
        .password(database_password)
        .db("api")
        .fetch_size(1)
        .max_connections(10)
        .build()
        .unwrap();
    let graph = Arc::new(Graph::connect(config).await.unwrap());
    let mut handles = Vec::new();
    let count = Arc::new(AtomicU32::new(0));
    let mut result = graph.execute(query("RETURN 1")).await.unwrap();
    let row = result.next().await.unwrap().unwrap();
    let value: i64 = row.get("1").unwrap();
    assert_eq!(1, value);
    assert!(result.next().await.unwrap().is_none());

    let file = fs::File::open("../../FrontEnd/data.json").expect("can not read the file properly");
    let reader = std::io::BufReader::new(file);
    let custom_urls: Endpoints = serde_json::from_reader(reader).expect("file couldn't be read in time");


    for custom_url in custom_urls.customUrls {
        let graph = graph.clone();
        let count = count.clone();
        let meow = tokio::spawn(async move {
            let mut result = graph.execute(
                query("MERGE (Sex:List{name:$url}) RETURN Sex").param("url", custom_url.name)
            ).await.unwrap();
            while let Ok(Some(row)) = result.next().await {
                count.fetch_add(1, Ordering::Relaxed);
            }
        });
        handles.push(meow);
    }


    // Show debug logs by default by setting `RUST_LOG=restful_rust=debug`
    if env::var_os("RUST_LOG").is_none() {
        env::set_var("RUST_LOG", "api_stuff=debug");
    }
    pretty_env_logger::init();

    // GET /hello/warp => 200 OK with body "Hello, warp!"
    let hello = warp::path!("hello" / String)
        .map(|name| format!("Hello, {}!", name));

    // let health_route = warp::reply::with_status("Ok", StatusCode::OK);

    warp::serve(hello)
        .run(([127, 0, 0, 1], 3030))
        .await;
}
