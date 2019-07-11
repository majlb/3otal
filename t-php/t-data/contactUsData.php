<?php
$name =  $_POST["nameId"];
$email =  $_POST["emailId"];
$phoneNumber =  $_POST["phoneNumberId"];
$subject =  $_POST["subjectId"];
$content =  $_POST["contentId"];
$year =  date("Y");
$month =  date("m");
$day =  date("d");
$hour =  date("H");
$mins =  date("i");
$seconds =  date("s");
$fileName = "../../contactus/file".$year.$month.$day.$hour.$seconds.".txt";
$fullContent = $name."*".$email."*".$phoneNumber."*".$subject."*".$content;
echo file_put_contents($fileName,$fullContent);
header('location: ../t-menu/ThankYou.php');

?>