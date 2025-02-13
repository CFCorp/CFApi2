use crate::repository::url_repo::MyUrl;
use crate::{models::url_model::Url, repository::url_repo::UrlRepo};
use mongodb::{bson::oid::ObjectId, results::InsertOneResult};
use rocket::{http::Status, serde::json::Json, State};
use rocket::response::status::NotFound;
use mongodb::*;
use serde::{Deserialize, Serialize};

#[derive(Debug, Deserialize, Serialize)]
struct MyUrls {
    _id: bson::oid::ObjectId,
    url: String, // Adjust based on your schema
}

#[post("/url", data = "<new_url>")]
pub fn create_url(
    db: &State<UrlRepo>,
    new_url: Json<Url>,
) -> Result<Json<InsertOneResult>, Status> {
    let data = Url {
        id: None,
        url: new_url.url.to_owned()
    };
    let url_detail = db.create_url(data);
    match url_detail {
        Ok(url) => Ok(Json(url)),
        Err(_) => Err(Status::InternalServerError),
    }
}
#[get("/url")]
pub fn get_url(db: &State<UrlRepo>) -> Result<Json<MyUrl>, NotFound<String>> {
    match db.get_url() {
        Some(doc) => Ok(Json(doc)),
        None => Err(NotFound("No document found.".into())),
    }
}

#[get("/urls")]
pub fn get_all_urls(db: &State<UrlRepo>) -> Result<Json<Vec<Url>>, Status> {
    let urls = db.get_all_urls();
    match urls {
        Ok(urls) => Ok(Json(urls)),
        Err(_) => Err(Status::InternalServerError),
    }
}

