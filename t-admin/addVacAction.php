<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php 
header('Content-Type: text/html; charset=utf-8');
include ('connection.php');
$connection = new createConnection(); 
$connection->connectToDatabase();
$con = $connection->selectDatabase();

 mysqli_query($con,'SET CHARACTER SET utf8') ;

mysqli_set_charset($con, "utf8");


$theEnName= $_POST['EnName'];
$theArName= $_POST['ArName'];
$day= $_POST['day'];
$month= $_POST['month'];
$year= $_POST['year'];
$calendar_type= $_POST['calendar_type'];
$yearly= $_POST['yearly'];
$inter= $_POST['inter'];
$id_country= $_POST['id_country'];

$ok=1;




$sql1="INSERT INTO multi_lang (id_multi, lang,text)  select (SELECT max(id_multi)+1 FROM multi_lang),'EN','$theEnName' from dual ";

if (!mysqli_query($con,$sql1)){
	die('Error(INTO multi_lang  EN): ' . mysqli_error($con));
}

$sql2="INSERT INTO multi_lang (id_multi,lang, text)  select (SELECT max(id_multi) FROM multi_lang),'AR','$theArName' from dual ";

if (!mysqli_query($con,$sql2)){
	die('Error(INTO multi_lang AR): ' . mysqli_error($con));
}

$sql3 =  "INSERT INTO event(id_name, event_day, event_month, event_year, calendar_type, Yearly, inter, id_description) select (SELECT max(id_multi) FROM multi_lang),'$day','$month','$year','$calendar_type','$yearly','$inter','' from dual";

if (!mysqli_query($con,$sql3)){
	die('Error(INTO event): ' . mysqli_error($con));
}

if($id_country!=""){
    $arr = explode(",", $id_country);
    foreach($arr as $country){
    
$sql4 =  "INSERT INTO event_countries(id_event, id_country, nb_days_min, nb_days_max, id_comment) select (SELECT max(id) FROM event),'$country',0,0,'' from dual";

if (!mysqli_query($con,$sql4)){
	die('Error(INTO event): ' . mysqli_error($con));
}
}
}


echo "1 record added";
$connection->closeConnection();
echo "done";
	header('Location: addVac.php?');
		


?>