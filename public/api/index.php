<?php
// https://api.tiktokv.com/aweme/v1/multi/aweme/detail/?aweme_ids=%5B{video_id}%5D
// video_url: veri["aweme_details"][0]["video"]["play_addr"]["url_list"][0], user_name: data["aweme_details"][0]["author"]["unique_id"]
$_POST = json_decode(file_get_contents("php://input"), true);
$action = $_POST['action'];
if ($action) {
  switch ($action) {
    case 'getUrlData':
      $id = $_POST['id'];
      $contentRaw = file_get_contents("https://api.tiktokv.com/aweme/v1/multi/aweme/detail/?aweme_ids=%5B" . $id . "%5D");
      $contentJson = json_decode($contentRaw, true);
      echo $contentJson["aweme_details"][0]["video"]["play_addr"]["url_list"][0];
      break;
    default:
      die();
      break;
  }
} else {
  die();
}
