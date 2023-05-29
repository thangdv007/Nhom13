<?php

//Include Google Client Library for PHP autoload file

require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('180144154748-njj1ctufpt0otac41ntlnslqqo44lloo.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/QLY_ThuVien/TrangChuDocGia.php');

//
$google_client->addScope('email');

$google_client->addScope('profile');

?>