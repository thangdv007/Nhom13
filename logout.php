<?php

//logout.php

include('gconfig.php');

//Reset OAuth access token
$google_client->revokeToken();

//Destroy entire session data.

//redirect page to index.php
header('location:TrangChuDocGia.php?_');

?>

