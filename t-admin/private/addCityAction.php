<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?php 
header('Content-Type: text/html; charset=utf-8');
include ('../connection.php');
$connection = new createConnection(); 
$connection->connectToDatabase();
$con = $connection->selectDatabase();

 mysqli_query($con,'SET CHARACTER SET utf8') ;

mysqli_set_charset($con, "utf8");




$theLngMap =$_POST['lngMap'];
$theLatMap=$_POST['latMap'];
$country=$_POST['country'];


$theEnName = $_POST['EnName'];
$target = "../img/city/";
$pcName = str_replace(" ", "_", $theEnName);
if(strlen($pcName)>40){
	$pcName = substr($pcName,0,40);
}
$zDate=date("Y").date("m").date("d").date("h").date("i").date("sa");
$pcName = $pcName."_".$zDate.".jpg";
$target = $target .$pcName ;
$ok=1;
Echo $target."<br>" ;
//This is our size condition
if ($uploaded_size > 350000)
{
	echo "Your file is too large.<br>";
	$ok=0;
}

//This is our limit file type condition
/* if (!($uploaded_type=="image/jpg")) {
 echo "You may only upload JPG files.<br>";
$ok=0;
}
*/
//Here we check that $ok was not set to 0 by an error
if ($ok==0)
{
	Echo "Sorry your file was not uploaded";
}

//If everything is ok we try to upload it
else
{
	if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target))
	{
		echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
	}
	else
	{
		echo "Sorry, there was a problem uploading your file.";
	}
}



$sql="INSERT INTO city (id_name,id_title,id_subject, map_lat,map_lng ,id_country)  select (SELECT max(id_multi)+1 FROM multi_lang),(SELECT max(id_multi)+2 FROM multi_lang),(SELECT max(id_multi)+3 FROM multi_lang),'$theLatMap','$theLngMap','$country'  from dual ";
if (!mysqli_query($con,$sql))
{
	die('Error: ' . mysqli_error($con));
}


$city_id = mysql_insert_id();

$sql0="INSERT INTO city_img (id_city,img,is_main)  select (SELECT max(id) FROM city),'city/".$pcName."','1' from dual ";

if (!mysqli_query($con,$sql0)){
	die('Error: ' . mysqli_error($con));
}


$sql1="INSERT INTO multi_lang (id_multi, lang,text)  select (SELECT max(id_multi)+1 FROM multi_lang),'EN','$theEnName' from dual ";

if (!mysqli_query($con,$sql1)){
	die('Error: ' . mysqli_error($con));
}

$theArName = $_POST['ArName'];
$sql2="INSERT INTO multi_lang (id_multi, lang,text)  select (SELECT max(id_multi) FROM multi_lang),'AR','$theArName' from dual ";

if (!mysqli_query($con,$sql2)){
	die('Error: ' . mysqli_error($con));
}

$theEnTitle = $_POST['EnTitle'];
$sql2="INSERT INTO multi_lang (id_multi, lang,text)  select (SELECT max(id_multi)+1 FROM multi_lang),'EN','$theEnTitle' from dual ";

if (!mysqli_query($con,$sql2)){
	die('Error: ' . mysqli_error($con));
}

$theArTitle = $_POST['ArTitle'];
$sql2="INSERT INTO multi_lang (id_multi, lang,text)  select (SELECT max(id_multi) FROM multi_lang),'AR','$theArTitle' from dual ";

if (!mysqli_query($con,$sql2)){
	die('Error: ' . mysqli_error($con));
}


$theEnSubject = $_POST['EnSubject'];
$sql2="INSERT INTO multi_lang (id_multi, lang,text)  select (SELECT max(id_multi)+1 FROM multi_lang),'EN','$theEnSubject' from dual ";

if (!mysqli_query($con,$sql2)){
	die('Error: ' . mysqli_error($con));
}

$theArSubject = $_POST['ArSubject'];
$sql2="INSERT INTO multi_lang (id_multi, lang,text)  select (SELECT max(id_multi) FROM multi_lang),'AR','$theArSubject' from dual ";

if (!mysqli_query($con,$sql2)){
	die('Error: ' . mysqli_error($con));
}

echo "1 record added";
$connection->closeConnection();
echo "done";
header('Location: ../AddCity.php');

?>