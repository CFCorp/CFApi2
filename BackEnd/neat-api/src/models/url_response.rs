use serde::{Deserialize, Serialize};

#[derive(Debug, Serialize, Deserialize)]
pub struct HelloUrlResponse {
    pub(crate) url: String,
    pub(crate) success: String,
}
