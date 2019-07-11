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
<button id='AR' class="button" onclick ="changeLanguage('AR')">AR</button>
<button id='EN' class="button" onclick ="changeLanguage('EN')">EN</button>
</div>					
	
	<h1><img src="../../img/logo/logo.png" class="w3-circle w3-margin-right" style="width:80px"></h1>
	<div class="site-description"><?php echo $lang_arr['otalArabVacations']?></div>
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
		<li id="menu-item-170" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-156 current_page_item menu-item-170"><a href="../../index.php?lang=<?php echo $lang?>" aria-current="page"><?php echo $lang_arr['HomePage']?></a></li>

		<li id="menu-item-169" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-169"><a href="byMap.php?lang=<?php echo $lang?>"><?php echo $lang_arr['byMap']?></a></li>
		
		<li id="menu-item-166" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-166"><a href="byCalendar.php?lang=<?php echo $lang?>"><?php echo $lang_arr['byCalendar']?></a></li>
		
		<li id="menu-item-237" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-237"><a href="happenThisDay.php?lang=<?php echo $lang?>"><?php echo $lang_arr['happenThisDay']?></a></li>
		
		<li id="menu-item-168" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-168"><a href="allVac.php?lang=<?php echo $lang?>"><?php echo $lang_arr['allVac']?></a></li>
		
		<li id="menu-item-168" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-168"><a href="weekend.php?lang=<?php echo $lang?>"><?php echo $lang_arr['weekEnd']?></a></li>
		
        <li id="menu-item-168" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-168"><a href="showCities.php?lang=<?php echo $lang?>"><?php echo $lang_arr['showCities']?></a></li>
		
		<li id="menu-item-171" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-171"><a href="contactUs.php?lang=<?php echo $lang?>"><?php echo $lang_arr['contactUs']?></a></li>
		
		<li id="menu-item-172" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-172"><a href="about/"><?php echo $lang_arr['aboutUs']?></a></li>
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
		