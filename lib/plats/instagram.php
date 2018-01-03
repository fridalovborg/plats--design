<?php
/**
* Instagram posts
* @param $count, $min_id
* @return $result->data
*/
function get_instagram_posts($count = 4, $min_id = null) {
  // @plats_designbyra : 
  // access token : 
  // count limited to 20 in sandbox mode

  $token = "1236824823.1677ed0.6231a7556c6142a4a0b41088da2fca7d"; # plats_designbyra
  $user_id = "1236824823"; # plats_designbyra

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