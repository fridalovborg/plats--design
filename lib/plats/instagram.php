<?php
/**
* Instagram posts
* @param $count, $min_id
* @return $result->data
*/
function get_instagram_posts($count = 5, $min_id = null) {
  // @plats_designbyra : 
  // access token : 
  // count limited to 20 in sandbox mode

  $token = "4642759.3a81a9f.3eb646564dbf43e98dce75421adb39a6"; # plats_designbyra
  $user_id = "4642759"; # plats_designbyra

  $url = "https://api.instagram.com/v1/users/${user_id}/media/recent/?access_token=${token}&count=${count}";

  if($min_id != null) {
    $url .= "&min_id=${min_id}";
  }

  // curl
  $ch = curl_init();

  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($ch, CURLOPT_TIMEOUT, 20);

  $result = json_decode(curl_exec($ch));

  curl_close($ch); 
  
  if ($result) {
    return array_reverse($result->data);
  } else {
    return null;
  }
}

?>