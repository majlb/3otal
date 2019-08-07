<?php
include ('../t-data/IpInfo.php');
$countryCodeVisitor= ip_info("Visitor", "Country Code");
$pageNbr = $_REQUEST["pageNbr"];

?>

<header id="masthead" class="site-header" role="banner">
<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 2px 2px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 15px;
  margin: 2px 2px;
  cursor: pointer;
}
</style>
			
<div class="site-header-wrapper">
<div class="site-title-wrapper">

<div> 
<?php echo $pageNbr?>
<button id='AR' class="button" onclick ="changeLanguage('AR')">AR1</button>
<button id='EN' class="button" onclick ="changeLanguage('EN')">EN1</button>
</div>					
	
	<h1><img src="../../img/logo/logo.png" class="w3-circle w3-margin-right" style="width:80px"></h1>
	<h3><?php echo $lang_arr['otalArabVacations']?></h3>
</div><!-- .site-title-wrapper -->

<div class="main-navigation-container">

	
<div class="menu-toggle" id="menu-toggle">
	<div></div>
	<div></div>
	<div></div>
</div><!-- #menu-toggle -->

<nav id="site-navigation" class="main-navigation">

<div class="menu-primary-menu-container">
	<ul id="menu-primary-menu" class="menu">
	  <?php if($pageNbr = "1") {?>
		<li id="menu-item-170" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-156 current_page_item menu-item-170">
		<?php } else {?>
			<li id="menu-item-170" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home">
		<?php } ?>
		
		<a href="../../index.php?lang=<?php echo $lang?>" aria-current="page"><?php echo $lang_arr['HomePage']?></a></li>

		<?php if($pageNbr = "2") {?>
		<li id="menu-item-169" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-169 current-menu-item page_item page-item-169 current_page_item menu-item-169">
			<?php } else {?>
			<li id="menu-item-169" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-169">
		<?php } ?>
		
		
		<a href="byMap.php?lang=<?php echo $lang?>"><?php echo $lang_arr['byMap']?></a></li>
	  <?php if($pageNbr = "3") {?>
		<li id="menu-item-166" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-166 current-menu-item page_item page-item-166 current_page_item menu-item-166">
		<?php } else {?>
			<li id="menu-item-166" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-166">
		<?php } ?>
		<a href="byCalendar.php?lang=<?php echo $lang?>"><?php echo $lang_arr['byCalendar']?></a></li>
		
		
		  <?php if($pageNbr = "4") {?>
		<li id="menu-item-237" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-237 current-menu-item page_item page-item-237 current_page_item menu-item-237">
		<?php } else {?>
			<li id="menu-item-237" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-237">
		<?php } ?>
		<a href="happenThisDay.php?lang=<?php echo $lang?>"><?php echo $lang_arr['happenThisDay']?></a></li>
		
		<?php if($pageNbr = "5") {?>
			<li id="menu-item-168" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-168 current-menu-item page_item page-item-168 current_page_item menu-item-168">
		<?php } else {?>
			<li id="menu-item-168" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-168">
		<?php } ?>
		<a href="allVac.php?lang=<?php echo $lang?>"><?php echo $lang_arr['allVac']?></a></li>
		
		
			<?php if($pageNbr = "6") {?>
			<li id="menu-item-174" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-174 current-menu-item page_item page-item-174 current_page_item menu-item-174">
		<?php } else {?>
			<li id="menu-item-174" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-174">
		<?php } ?>
		<a href="weekend.php?lang=<?php echo $lang?>"><?php echo $lang_arr['weekEnd']?></a></li>
		
			<?php if($pageNbr = "7") {?>
			<li id="menu-item-173" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-173 current-menu-item page_item page-item-173 current_page_item menu-item-173">
		<?php } else {?>
			<li id="menu-item-173" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-173">
		<?php } ?>
		<a href="showCities.php?lang=<?php echo $lang?>"><?php echo $lang_arr['showCities']?></a></li>
		
		<?php if($pageNbr = "8") {?>
			<li id="menu-item-171" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-171 current-menu-item page_item page-item-171 current_page_item menu-item-171">
		<?php } else {?>
			<li id="menu-item-171" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-171">
		<?php } ?>
		<a href="contactUs.php?lang=<?php echo $lang?>"><?php echo $lang_arr['contactUs']?></a></li>
		
			<?php if($pageNbr = "9") {?>
			<li id="menu-item-172" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-172 current-menu-item page_item page-item-172 current_page_item menu-item-172">
		<?php } else {?>
			<li id="menu-item-172" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-172">
		<?php } ?>
		<a href="aboutUs.php?lang=<?php echo $lang?>"><?php echo $lang_arr['aboutUs']?></a></li>
	</ul>
</div>
</nav><!-- #site-navigation -->

</div>

			</div><!-- .site-header-wrapper -->

		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-142498123-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-142498123-1');
  
function changeLanguage(newLang) {
  var url = window.location.href;
  if(url.indexOf("lang=")<0){
  var newUrl= url+"?lang="+newLang ;
  location.assign(newUrl);
  } else {
	var oldLang =url.substring(url.indexOf("lang=")+5, url.indexOf("lang=")+7);
	if(oldLang==newLang){
	  return
	}
	var newUrl= url.replace("lang="+oldLang,"lang="+newLang )
	location.assign(newUrl);
  }
}
</script>	
	<style>[class*="fa fa-"]{font-family: FontAwesome !important;}</style>

		</header><!-- #masthead -->
		