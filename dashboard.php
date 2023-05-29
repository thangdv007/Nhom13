<?php
    $token = $google_client->fetchAccessTokenWithAuthCode($_GET['code']);
    $google_client->setAccessToken($token['access_token']);
    $acess_token = $token['access_token'];
    $google_service = new Google_Service_Oauth2($google_client);
    //Get user profile data from google
    $data = $google_service->userinfo->get();
    //Below you can find Get profile data
    $user_name = $data['given_name']." ".$data['family_name'];
    $user_email_address = $data['email'];
    $user_gender = $data['gender'];
    $user_image = $data['picture'];
   
?>
