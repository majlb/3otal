<!DOCTYPE html>
<!-- saved from url=(0021)http://www.3otal.com/ -->

	
<?php
$isMain = "0";

//mfi
include "../../t-include/common.php";
include "../../t-include/common-style.php";

//session_start();
//header('Content-Type: text/html; charset=utf-8');
	$lang = $_REQUEST["lang"];
if($lang==""){
	$lang="AR";
}
include("../t-resources/".$lang.".php");
if($lang=="AR"){
	$drHtml = "RTL";
	$side = "right";
} else {
	$drHtml = "LTR";
	$side = "left";
}





$imageDim = "";
   
        
        			$eventCount = 0;
				include ('../t-db/connection.php');
				$connection = new createConnection(); //i created a new object
				$connection->connectToDatabase(); // connected to the database
				$con = $connection->selectDatabase();// closed connection
				
			
				
				 mysqli_query($con,'SET CHARACTER SET utf8') ;
				 mysqli_query($con,'set names utf8');
		$years = [2019,2020,2021,2022,2023];


?>

<html dir="<?php echo $drHtml?>" ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<?php include '../t-data/head.php';?>

<body class="home page-template-default page page-id-156 custom-background fl-builder custom-header-image layout-one-column-wide">
<div id="page" class="hfeed site">
	
	<?php include '../t-data/header.php?pageNbr=3';?>

		
<div class="hero">

	<div class="hero-inner">

		<aside id="primer-hero-text-2" class="widget widget_text primer-widgets primer-hero-text-widget">		<div class="textwidget primer-widgets primer-hero-text-widget">

			
				<h2 class="widget-title"><?php echo $lang_arr['allAboutArabVacations']?></h2>
			
			
				<p><?php echo $lang_arr['checkArabVacations']?></p>

			
			
				<p></p>

			
		</div>
		</aside>
		<aside id="calendar-3" class="widget widget_calendar">
		<div id="calendar_wrap" class="calendar_wrap">
	       <?php include '../t-data/dataCal.php';?>
	     </div>
		 </aside>
	</div>

</div>
</div>
</body>
</html>