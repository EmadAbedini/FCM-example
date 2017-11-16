<?php
include_once 'sendnotification.php';
include_once 'db.php';
$com = new DbConnect();
$counter = 0;
$count = 0;

if(isset($_REQUEST['token']) && isset($_REQUEST['message'])){
    
    $token = $_REQUEST['token'];
    $message = array("FCM" => $_REQUEST['message']);
    
    $sql = "SELECT token FROM firebase WHERE registered = 1";
    $result = $com->getDb()->query($sql);
    
    $serverObject = new SendNotification();	
    
    if ($result->num_rows > 0) {
        $registatoinIds = array();
        
        while($row = $result->fetch_assoc()) {
            $counter++;
            array_push($registatoinIds, $row['token']);
            
            if($counter==999){
                $jsonString = $serverObject->sendPushNotificationToGCMSever($row["token"], $message, $registatoinIds);
                $counter = 0;
                $registatoinIds = array();
                $count = $count+$counter;
                echo $jsonString;
            }else if(mysqli_num_rows($result)-$count==$counter){
                $jsonString = $serverObject->sendPushNotificationToGCMSever($row["token"], $message, $registatoinIds);
                echo $jsonString;
            }
        }
    } else {
        echo "0 results";
    }
}
?>