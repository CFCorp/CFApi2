use mongodb::bson::oid::ObjectId;
use serde::{Deserialize, Serialize};

#[derive(Debug, Serialize, Deserialize, Clone)]
pub struct ImageUrl {
    pub _id: ObjectId,

    pub url: String,
    pub category: String, 
    
}
