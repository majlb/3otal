<!DOCTYPE html>
<!-- saved from url=(0021)http://www.3otal.com/ -->
<!-- local for mfi : http://localhost:8080/3otal-v1/WebContent/ -->
	
<?php
$isMain = "1";

include "t-include/common.php";
// include "t-include/common-style-main.php";
include "t-include/common-style.php";

//session_start();
//header('Content-Type: text/html; charset=utf-8');

$lang = $_REQUEST["lang"];
if($lang==""){
	$lang="AR";
}
include("t-php/t-resources/".$lang.".php");
if($lang=="AR"){
	$drHtml = "RTL";
	$side = "right";
} else {
	$drHtml = "LTR";
	$side = "left";
}


$imageDim = "";
   
$eventCount = 0;
include ('t-php/t-db/connection.php');

$connection = new createConnection(); //i created a new object
$connection->connectToDatabase(); // connected to the database
$con = $connection->selectDatabase();// closed connection

// mysqli_query($con,'SET CHARACTER SET utf8') ;
mysqli_query($con,'set names utf8');
$years = [2019,2020,2021,2022,2023];

?>

<!-- <SCRIPT language="javascript" type="text/javascript" src="./t-css/mfiTest.js"></SCRIPT> -->
<!-- <SCRIPT language="javascript" type="text/javascript" src="./t-css/mfiTest_t-css.js"></SCRIPT> -->

<html dir="<?php echo $drHtml?>" >
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<?php include 't-php/t-data/head.php';?> 

<body class="home page-template-default page page-id-156 custom-background fl-builder custom-header-image layout-one-column-wide">

<!-- for testing only, can delete
<div class="intro">
  <p>My name is Donald.</p>
  <p>I live in Duckburg.</p>
</div>
-->	
	<div id="page" class="hfeed site">
		<a class="skip-link screen-reader-text" href="http://www.3otal.com">---</a>
	<?php include 't-php/t-data/mainHeader.php';?>
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
	       <?php include './t-php/t-data/dataMap.php';?>
	     </div>
		 </aside>
	</div>

</div>

		<div id="content" class="site-content">

<div id="primary" class="content-area">

	<main id="main" class="site-main" role="main">

		
			
<article id="post-156" class="post-156 page type-page status-publish hentry">

	
	
	<div class="fl-row fl-row-full-width fl-row-bg-none fl-node-5758c7ef9b62c" data-node="5758c7ef9b62c">
	<?php include './t-php/t-data/dataAllVac.php';?>
	
	</div>
	
	
<!-- <div class="page-content"> -->

<!-- 	<div class="fl-builder-content fl-builder-content-156 fl-builder-content-primary" data-post-id="156"><div id="expect" class="fl-row fl-row-full-width fl-row-bg-none fl-node-57571353380c6" data-node="57571353380c6"> -->
<!-- 	<div class="fl-row-content-wrap"> -->
<!-- 						<div class="fl-row-content fl-row-fixed-width fl-node-content"> -->
		
<!-- <div class="fl-col-group fl-node-5757135338174" data-node="5757135338174"> -->
<!-- 			<div class="fl-col fl-node-57571353382cf fl-col-small" data-node="57571353382cf"> -->
<!-- 	<div class="fl-col-content fl-node-content"> -->
<!-- 	<div class="fl-module fl-module-callout fl-node-5758c173f3e5a" data-node="5758c173f3e5a"> -->
<!-- 	<div class="fl-module-content fl-node-content"> -->
<!-- 		<div class="fl-callout fl-callout-left fl-callout-has-photo fl-callout-photo-above-title"> -->
<!-- 		<div class="fl-callout-content"> -->
<!-- 		<div class="fl-callout-photo"><div class="fl-photo fl-photo-align-center" itemscope="" itemtype="https://schema.org/ImageObject"> -->
<!-- 	<div class="fl-photo-content fl-photo-img-jpg"> -->
<!-- 				<a href="http://www.3otal.com/#" target="_self" itemprop="url"> -->
<!-- 				<img class="fl-photo-img wp-image-189 size-full" src="./wpinfo/home-1.jpg" alt="home-1" itemprop="image" height="1277" width="1920" title="home-1" srcset="http://www.3otal.com/wp-content/uploads/2019/02/home-1.jpg 1920w, http://www.3otal.com/wp-content/uploads/2019/02/home-1-300x200.jpg 300w, http://www.3otal.com/wp-content/uploads/2019/02/home-1-768x511.jpg 768w, http://www.3otal.com/wp-content/uploads/2019/02/home-1-1024x681.jpg 1024w" sizes="(max-width: 1920px) 100vw, 1920px"> -->
<!-- 				</a> -->
<!-- 					</div> -->
<!-- 	</div> -->

	
	
	
<!-- </div><h3 class="fl-callout-title"><span><a href="http://www.3otal.com/#" target="_self" class="fl-callout-title-link fl-callout-title-text">Product / Service #1</a></span></h3>		<div class="fl-callout-text-wrap"> -->
<!-- 			<div class="fl-callout-text"><p>Whatever your company is most known for should go right here, whether that's bratwurst or baseball caps or vampire bat removal.</p> -->
<!-- </div><a href="http://www.3otal.com/#" target="_self" class="fl-callout-cta-link">Learn More</a>		</div> -->
<!-- 	</div> -->
<!-- 	</div> -->
<!-- 	</div> -->
<!-- </div> -->
<!-- 	</div> -->
<!-- </div> -->
<!-- 			<div class="fl-col fl-node-5757135338222 fl-col-small" data-node="5757135338222"> -->
<!-- 	<div class="fl-col-content fl-node-content"> -->
<!-- 	<div class="fl-module fl-module-callout fl-node-5758c0ed91818" data-node="5758c0ed91818"> -->
<!-- 	<div class="fl-module-content fl-node-content"> -->
<!-- 		<div class="fl-callout fl-callout-left fl-callout-has-photo fl-callout-photo-above-title"> -->
<!-- 		<div class="fl-callout-content"> -->
<!-- 		<div class="fl-callout-photo"><div class="fl-photo fl-photo-align-center" itemscope="" itemtype="https://schema.org/ImageObject"> -->
<!-- 	<div class="fl-photo-content fl-photo-img-jpg"> -->
<!-- 				<a href="http://www.3otal.com/#" target="_self" itemprop="url"> -->
<!-- 				<img class="fl-photo-img wp-image-192 size-full" src="./wpinfo/home-2.jpg" alt="home-2" itemprop="image" height="1248" width="1920" title="home-2" srcset="http://www.3otal.com/wp-content/uploads/2019/02/home-2.jpg 1920w, http://www.3otal.com/wp-content/uploads/2019/02/home-2-300x195.jpg 300w, http://www.3otal.com/wp-content/uploads/2019/02/home-2-768x499.jpg 768w, http://www.3otal.com/wp-content/uploads/2019/02/home-2-1024x666.jpg 1024w" sizes="(max-width: 1920px) 100vw, 1920px"> -->
<!-- 				</a> -->
<!-- 					</div> -->
<!-- 	</div> -->
<!-- </div><h3 class="fl-callout-title"><span><a href="http://www.3otal.com/#" target="_self" class="fl-callout-title-link fl-callout-title-text">Product / Service #2</a></span></h3>		<div class="fl-callout-text-wrap"> -->
<!-- 			<div class="fl-callout-text"><p>What's another popular item you have for sale or trade? Talk about it here in glowing, memorable terms so site visitors have to have it.</p> -->
<!-- </div><a href="http://www.3otal.com/#" target="_self" class="fl-callout-cta-link">Learn More</a>		</div> -->
<!-- 	</div> -->
<!-- 	</div> -->
<!-- 	</div> -->
<!-- </div> -->
<!-- 	</div> -->
<!-- </div> -->
<!-- 			<div class="fl-col fl-node-575713533837c fl-col-small" data-node="575713533837c"> -->
<!-- 	<div class="fl-col-content fl-node-content"> -->
<!-- 	<div class="fl-module fl-module-callout fl-node-5758c16fcc295" data-node="5758c16fcc295"> -->
<!-- 	<div class="fl-module-content fl-node-content"> -->
<!-- 		<div class="fl-callout fl-callout-left fl-callout-has-photo fl-callout-photo-above-title"> -->
<!-- 		<div class="fl-callout-content"> -->
<!-- 		<div class="fl-callout-photo"><div class="fl-photo fl-photo-align-center" itemscope="" itemtype="https://schema.org/ImageObject"> -->
<!-- 	<div class="fl-photo-content fl-photo-img-jpg"> -->
<!-- 				<a href="http://www.3otal.com/#" target="_self" itemprop="url"> -->
<!-- 				<img class="fl-photo-img wp-image-191 size-full" src="./wpinfo/home-3.jpg" alt="home-3" itemprop="image" height="1277" width="1920" title="home-3" srcset="http://www.3otal.com/wp-content/uploads/2019/02/home-3.jpg 1920w, http://www.3otal.com/wp-content/uploads/2019/02/home-3-300x200.jpg 300w, http://www.3otal.com/wp-content/uploads/2019/02/home-3-768x511.jpg 768w, http://www.3otal.com/wp-content/uploads/2019/02/home-3-1024x681.jpg 1024w" sizes="(max-width: 1920px) 100vw, 1920px"> -->
<!-- 				</a> -->
<!-- 					</div> -->
<!-- 	</div> -->
<!-- </div><h3 class="fl-callout-title"><span><a href="http://www.3otal.com/#" target="_self" class="fl-callout-title-link fl-callout-title-text">Product / Service #3</a></span></h3>		<div class="fl-callout-text-wrap"> -->
<!-- 			<div class="fl-callout-text"><p>Don't think of this product or service as your third favorite, think of it as the bronze medalist in an Olympic medals sweep of great products/services.</p> -->
<!-- </div><a href="http://www.3otal.com/#" target="_self" class="fl-callout-cta-link">Learn More</a>		</div> -->
<!-- 	</div> -->
<!-- 	</div> -->
<!-- 	</div> -->
<!-- </div> -->
<!-- 	</div> -->
<!-- </div> -->
<!-- 	</div> -->
<!-- 		</div> -->
<!-- 	</div> -->
<!-- </div> -->



<!-- <div class="fl-row fl-row-full-width fl-row-bg-none fl-node-579bd8f21fd8f" data-node="579bd8f21fd8f"> -->
<!-- 	<div class="fl-row-content-wrap"> -->
<!-- 						<div class="fl-row-content fl-row-fixed-width fl-node-content"> -->
		
<!-- <div class="fl-col-group fl-node-579bd8f221fda" data-node="579bd8f221fda"> -->
<!-- 			<div class="fl-col fl-node-579bd8f2220c6" data-node="579bd8f2220c6"> -->
<!-- 	<div class="fl-col-content fl-node-content"> -->
<!-- 	<div class="fl-module fl-module-cta fl-node-579bd837eda32" data-node="579bd837eda32"> -->
<!-- 	<div class="fl-module-content fl-node-content"> -->
<!-- 		<div class="fl-cta-wrap fl-cta-inline"> -->
<!-- 	<div class="fl-cta-text"> -->
<!-- 		<h3 class="fl-cta-title">Next Steps...</h3> -->
<!-- 		<div class="fl-cta-text-content"><p>This is should be a prospective customer's number one call to action, e.g., requesting a quote or perusing your product catalog.</p> -->
<!-- </div> -->
<!-- 	</div> -->
<!-- 	<div class="fl-cta-button"> -->
<!-- 		<div class="fl-button-wrap fl-button-width-full"> -->
<!-- 			<a href="http://www.3otal.com/" target="_self" class="fl-button" role="button"> -->
<!-- 							<span class="fl-button-text">Call to Action</span> -->
<!-- 					</a> -->
<!-- </div> -->
<!-- 	</div> -->
<!-- </div> -->
<!-- 	</div> -->
<!-- </div> -->
<!-- 	</div> -->
<!-- </div> -->
<!-- 	</div> -->
<!-- 		</div> -->
<!-- 	</div> -->
<!-- </div> -->
<!-- </div> -->
</div><!-- .page-content -->

	
</article><!-- #post-## -->

			
		
	</main><!-- #main -->

</div><!-- #primary -->




		</div><!-- #content -->

		


		


	</div><!-- #page -->

	<style>[class*="fa fa-"]{font-family: FontAwesome !important;}</style>
<!-- 	<script type="text/javascript" src="./wpinfo/156-layout.js.download"></script> -->
<!-- <script type="text/javascript" src="./wpinfo/navigation.min.js.download"></script> -->
<!-- <script type="text/javascript" src="./wpinfo/skip-link-focus-fix.min.js.download"></script> -->
<!-- <script type="text/javascript" src="./wpinfo/wp-embed.min.js.download"></script> -->





 <?php $connection->closeConnection();
?>

</body></html>