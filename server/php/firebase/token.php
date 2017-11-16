<?php
if(isset($_REQUEST['token'])){	
    $token = $_REQUEST['token'];

    include_once 'database.php';	
    $deviceTokenRegistration = new Database();
    $deviceTokenRegistration->insertUserDeviceToken($token);
}else{
    echo "not set token";
}

?>
    