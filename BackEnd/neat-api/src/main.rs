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

#[get("/")]
fn hello() -> Result<Json<String>, Status> {
    Ok(Json(String::from("Hello from rust and mongoDB")))
}

#[launch]
fn rocket() -> _ {
    let db = MongoRepo::init();
    rocket::build()
    .configure(rocket::Config::figment().merge(("port", 3030)))
    .manage(db)
    .mount("/", routes![hello, create_user])
    .mount("/", routes![get_user])
    .mount("/", routes![update_user])
    .mount("/", routes![delete_user])
    .mount("/", routes![get_all_users])
}

