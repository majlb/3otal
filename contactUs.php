<!DOCTYPE html>
<!-- saved from url=(0021)http://www.3otal.com/ -->

	
<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
	$lang = $_REQUEST["lang"];
if($lang==""){
	$lang="AR";
}
include("".$lang.".php");
if($lang=="AR"){
	$drHtml = "RTL";
	$side = "right";
} else {
	$drHtml = "LTR";
	$side = "left";
}




$isMain = "0";
$imageDim = "";
   



?>

<html dir="<?php echo $drHtml?>" ><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<?php include 'head.php';?>

<body class="home page-template-default page page-id-156 custom-background fl-builder custom-header-image layout-one-column-wide">

	

		
	<?php include 'header.php';?>

		
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
	      <table>
		   <tr><td><?php echo $lang_arr['name']?></td><td><input type='text' id='nameId'/></td></tr>
		   <tr><td><?php echo $lang_arr['email']?></td><td><input type='text' id='emailId'/></td></tr>
		   <tr><td><?php echo $lang_arr['phoneNumber']?></td><td><input type='text' id='phoneNumberId'/></td></tr>
		   <tr><td><?php echo $lang_arr['subject']?></td><td><input type='text' id='subjectId'/></td></tr>
		   <tr><td><?php echo $lang_arr['content']?></td><td><input type='text' id='contentId'/></td></tr>
		   <tr><td></td><td><button  value='....'/></td></tr>
		  </table>
	     </div>
		 </aside>
	</div>

</div>
</body>
</html>