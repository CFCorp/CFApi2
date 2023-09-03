use warp::{Filter};
use dotenvy::dotenv;
use neo4rs::*;
use std::env;

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
    let graph = Graph::connect(config).await.unwrap();
    let mut result = graph.execute(query("RETURN 1")).await.unwrap();
    let row = result.next().await.unwrap().unwrap();
    let value: i64 = row.get("1").unwrap();
    assert_eq!(1, value);
    assert!(result.next().await.unwrap().is_none());


    // Show debug logs by default by setting `RUST_LOG=restful_rust=debug`
    if env::var_os("RUST_LOG").is_none() {
        env::set_var("RUST_LOG", "api_stuff=debug");
    }
    pretty_env_logger::init();

    // GET /hello/warp => 200 OK with body "Hello, warp!"
    let hello = warp::path!("hello" / String)
        .map(|name| format!("Hello, {}!", name));

    warp::serve(hello)
        .run(([127, 0, 0, 1], 3030))
        .await;
}
