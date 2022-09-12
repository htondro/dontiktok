<?php
// https://api.tiktokv.com/aweme/v1/multi/aweme/detail/?aweme_ids=%5B{video_id}%5D
// video_url: veri["aweme_details"][0]["video"]["play_addr"]["url_list"][0], user_name: data["aweme_details"][0]["author"]["unique_id"]
$_POST = json_decode(file_get_contents("php://input"), true);
$action = $_POST['action'];
if ($action) {
  switch ($action) {
    case 'getUrlData':
      $id = $_POST['id'];
      $contentRaw = file_get_contents("https://api.tiktokv.com/aweme/v1/aweme/detail/?aweme_id=" . $id);
      $contentJson = json_decode($contentRaw, true);
      $result = array(
        'downloadLink' => $contentJson["aweme_detail"]["video"]["play_addr"]["url_list"][0],
        'avatar' => $contentJson["aweme_detail"]["author"]["avatar_168x168"]["url_list"][0],
        'username' => $contentJson["aweme_detail"]["author"]["unique_id"],
        'cover' => $contentJson["aweme_detail"]["video"]["cover"]["url_list"][0],
      );
      echo json_encode($result, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
      break;
    default:
      die();
      break;
  }
} else {
  die();
}
