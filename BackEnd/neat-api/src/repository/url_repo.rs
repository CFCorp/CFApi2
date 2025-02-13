use std::{env, result};
extern crate dotenv;
use dotenv::dotenv;
use rand::Rng;
use serde::{Deserialize, Serialize};

#[derive(Debug, Deserialize, Serialize)]
pub struct MyUrl {
    _id: bson::oid::ObjectId,
    url: String, // Adjust based on your schema
}

use mongodb::{
    bson::{self, doc, extjson::de::Error, oid::ObjectId, Document},
    results::{ DeleteResult, InsertOneResult, UpdateResult},
    sync::{Client, Collection}, Cursor,
};
use rocket::data::N;
use crate::models::url_model::Url;

pub struct UrlRepo {
    col: Collection<Url>,
}

impl UrlRepo {
    pub fn init() -> Self {
        dotenv().ok();
        let uri = match env::var("DATABASE_URI") {
            Ok(v) => v.to_string(),
            Err(_) => format!("Error loading env variable"),
        };
        let client = Client::with_uri_str(uri).unwrap();
        let db = client.database("rust-api");
        let col: Collection<Url> = db.collection("Urls");
        UrlRepo { col }
    }

    pub fn create_url(&self, new_url: Url) -> Result<InsertOneResult, Error> {
        let new_doc = Url {
            id: None,
            url: new_url.url,
        };
        let url = self
            .col
            .insert_one(new_doc, None)
            .ok()
            .expect("Error creating url");
        Ok(url)
    }

    pub fn get_url(&self) -> Option<MyUrl> {
        let pipeline = vec![doc! { "$sample": { "size": 1 } }];
        let mut cursor = self.col.aggregate(pipeline, None).ok()?;

        cursor.next().and_then(|doc| bson::from_document(doc.ok()?).ok())
    }


    pub fn get_all_urls(&self) -> Result<Vec<Url>, Error> {
        let cursors = self
            .col
            .find(None, None)
            .ok()
            .expect("Error getting list of urls");
        let urls = cursors.map(|doc| doc.unwrap()).collect();
        Ok(urls)
    }
}


