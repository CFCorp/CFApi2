use crate::database::connect_to_db::MongoDB;
use crate::routes::routes::hello_name::check_from_db_real_names;
use crate::{ErrorResponse, Status, UNAUTHORIZED};
use crate::models::url_response::HelloUrlResponse;
use crate::routes::routes::HelloNameError;
use crate::models::model_url::ImageUrl;

use crate::routes::authorization::token::request_access_token::AuthorizedUser;
use rocket::serde::json::Json;
use rocket::State;

//(private) request with authorization model (token)
//This is very scuffed
#[get("/private/image/<category>")]
pub async fn get_image(
    auth: AuthorizedUser,
    database: &State<MongoDB>,
    category: &str
) -> Result<Json<HelloUrlResponse>, (Status, Json<ErrorResponse>)> {
    match check_from_db_real_names(database, auth.user_id).await {
        HelloNameError::OnlyLogin(_res_only_login) => Ok(
            Json(HelloUrlResponse {
                url: database.get_image_url(category).await.map(|s: ImageUrl| s.url).expect("URL not found"),
                success: "200".to_string()
        })),
        HelloNameError::NoOnlyLogin(res_no_only_login) => Ok(Json(HelloUrlResponse {
            success: "error".to_string(),
            url: res_no_only_login,
        })),
        HelloNameError::ErrorID => Err(UNAUTHORIZED),
    }
}