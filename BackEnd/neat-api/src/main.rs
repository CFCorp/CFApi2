#![allow(non_snake_case)]
#![allow(unused_variables)]
#![allow(unused_imports)]

mod api; 
mod models;
mod repository;

#[macro_use]
extern crate rocket;
use rocket::{get, http::Status, serde::json::Json};

//add imports below
use api::user_api::{create_user, get_user, update_user, delete_user, get_all_users};
use repository::mongodb_repo::MongoRepo;

use api::url_api::{create_url, get_url, get_all_urls};
use repository::url_repo::UrlRepo;

#[get("/")]
fn hello() -> Result<Json<String>, Status> {
    Ok(Json(String::from("Hello from rust and mongoDB")))
}

#[launch]
fn rocket() -> _ {
    let db = MongoRepo::init();
    let urls = UrlRepo::init();
    rocket::build()
    .configure(rocket::Config::figment().merge(("port", 3030)))
    .manage(db)
    .manage(urls)
    .mount("/", routes![hello, create_user])
    .mount("/", routes![get_user])
    .mount("/", routes![update_user])
    .mount("/", routes![delete_user])
    .mount("/", routes![get_all_users])
    .mount("/", routes![create_url])
    .mount("/", routes![get_url])
    .mount("/", routes![get_all_urls])
}

