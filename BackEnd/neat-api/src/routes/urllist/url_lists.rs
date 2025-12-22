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
//TODO: need to work on making this auto update when new categories have been added
#[get("/private/list")]
pub async fn get_list(
    auth: AuthorizedUser,
    database: &State<MongoDB>
) -> Result<Json<HelloUrlResponse>, (Status, Json<ErrorResponse>)> {
    match check_from_db_real_names(database, auth.user_id).await {
        HelloNameError::OnlyLogin(_res_only_login) => Ok(
            Json(HelloUrlResponse {
                url: ("/api/v2/private/image/anime, /api/v2/private/image/hentai").to_string(),
                success: "200".to_string()
        })),
        HelloNameError::NoOnlyLogin(res_no_only_login) => Ok(
            Json(HelloUrlResponse {
                url: ("/api/v2/private/image/anime, /api/v2/private/image/hentai").to_string(),
                success: "200".to_string()
        })),
        HelloNameError::ErrorID => Err(UNAUTHORIZED),
    }
}