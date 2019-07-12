<head>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <!-- <link rel="stylesheet" href="../../t-css/style.css"> -->
  </head>

<!--
<div class="intro">
  <p>My name is Donald.</p>
  <p>I live in Duckburg.</p>
</div>
-->	   
<!-- Features -->
				<div id="features-wrapper">


					<div class="container">
					<br>
					<center><h2><b><?php echo $lang_arr['pressOnFlagForEvent']?><b><h2> </center>
					</br>
                   <div id="countriesDiv"></div>
<?php
//mfi
error_reporting(E_ERROR);
$foundCountry = false;
$imgSrc = './img/';
$getCountriesUrl = './t-php/t-data/';
if($isMain=="0"){
    $getCountriesUrl = '../t-data/';
    $imgSrc = '../../img/';
}

				     $arrayDays = array(
                    "Sunday" => "الأحد",
                    "Monday" => "الاثنين",
                      "Tuesday" => "الثلاثاء",
                    "Wednesday" => "الأربعاء",
                      "Thursday" => "الخميس",
                    "Friday" => "الجمعة",
                    "Saturday" =>"السبت"
                        );
						
			   $arrayMonths = array(
                    "1" => "كانون الثاني",
                    "2" => "شباط",
                      "3" => "اذار",
                    "4" => "نيسان",
                      "5" => "ايار",
                    "6" => "حزيران",
                    "7" =>"تموز",
					   "8" => "آب",
                      "9" => "أيلول",
                    "10" => "تشرين الأول",
                      "11" => "تشرين الثاني",
                    "12" => "كانون الأول"
                        );
						
				$arrayDat = array(
                    "1" => "١",
                    "2" => "٢",
                      "3" => "٣",
                    "4" => "٤",
                      "5" => "٥",
                    "6" => "٦",
                    "7" =>"٧",
					   "8" => "٨",
                      "9" => "٩",
                    "10" => "١٠",
                      "11" => "١١",
                    "12" => "١٢",
					 "13" => "١٣",
                    "14" => "١٤",
                      "15" => "١٥",
                    "16" => "١٦",
                    "17" =>"١٧",
					   "18" => "١٨",
                      "19" => "١٩",
                    "20" => "٢٠",
					 "21" => "٢١",
                    "22" => "٢٢",
                      "23" => "٢٣",
                    "24" => "٢٤",
                      "25" => "٢٥",
                    "26" => "٢٦",
                    "27" =>"٢٧",
					   "28" => "٢٨",
                      "29" => "٢٩",
                    "30" => "٣٠",
					"31" => "٣١"
                        );
                		 
			    $queryStr = "select c.id , m.text from Countries as c , multi_lang as m where c.id_name = m.id_multi and m.lang='".$lang."'"; 
			
     

                
                
                $resultCntStr="SELECT count(1)  from (".$queryStr.") as mm";
                
         
                mysqli_query($con,'SET CHARACTER SET utf8') ;
				mysqli_query($con,'set names utf8');
                $resultCnt = mysqli_query($con,$resultCntStr);
    
                //echo $resultCnt;
    
                
                if (!$resultCnt) {
    
                    printf("Error: %s\n", mysqli_error($con));
                    exit();
                }else{
    
                }
                
                $data=mysqli_fetch_array($resultCnt);
                $ttl = $data[0];
    
            	echo "<div class='row'>";
                echo "</div>";
				$result  = mysqli_query($con,$queryStr );
				//echo '<br>mfi:$result:'.$result;
				
    if($result!=""){
        while($row = mysqli_fetch_array($result)){
            if($eventCount% 3==0){
                echo "<div class='row'>";
            }
        	echo "<div class='4u 12u(medium)'>";
			if($countryCodeVisitor==$row['abv']){
				echo "<div id='countryDiv".$row['id']."' style='display:block'>";
				$foundCountry=true;
			}else {
			   echo "<div id='countryDiv".$row['id']."' style='display:none'>";
			}
			echo "<section class='box feature'>";
		
			echo "<div class='inner'>";
			echo "<header>";
			echo "<h2><font color='red'>".$row['text']."</font></h2>";
			echo "<p></p>";
			echo "</header>";
			echo "<div class='tab'>";
			foreach ($years as $year) {
			    //echo '<br>mfi:['.$year.','.$row['id'].']';
			    //echo '<br>mfi:ok';
				echo "<input type='button' class='tablinks1' onclick=\"openYear(event, '".$year."-".$row['id']."')\" value='".$year."'></input>";
			}
			echo "</div>";
				
			foreach ($years as $year) {
				echo " <div id='".$year."-".$row['id']."' class='tabcontent1'>";
				
			    $queryStr2 = "select tbl.event_day,tbl.event_month , tbl.text,tbl.minDays,tbl.maxDays from(select e.event_day,e.event_month , m.text,ec.nb_days_min minDays,ec.nb_days_max maxDays from event as e , event_countries as ec, multi_lang as m ";
			    $queryStr2 = $queryStr2." where e.id = ec.id_event and ec.id_country=".$row['id']." and e.id_name = m.id_multi and m.lang='".$lang."' and (e.event_year='' or e.event_year=".$year.")"; 
			   
			    $queryStr2 = $queryStr2." ) as tbl order by tbl.event_month,tbl.event_day";
                $result2  = mysqli_query($con,$queryStr2 );
                if (!$result2) {
                    printf("Error 2: %s\n", mysqli_error($con));
                    exit();
                }
				
				
				echo "<table>";
				if($result2!=""){
				while($row2 = mysqli_fetch_array($result2))
				{
				//$timestamp = strtotime('".$year."-".$row2[event_month]."-".$row2[event_day]."');
$timestamp = strtotime('".$row2[event_month]."-".$row2[event_day]."-".$year."');
                $day = date('D', $timestamp);
                
                $date = '".$row2[event_day]."-".$row2[event_month]."-".$year."';
$nameOfDay = date('D', strtotime($date));
                $zday = date("l", mktime(0,0,0,$row2[event_month],$row2[event_day],$year));
                
          
               $zDays = "Days";
               $zDay = "Day";
                if($lang=="AR"){
                    $zday = $arrayDays[$zday];
                    $zDays = "أيام";
                    $zDay = "يوم";
                }
                
				echo "<tr><td>";
				if($row2[maxDays]>0){
				    echo "<font color='skyblue'><b>";
				}
				 if($lang=="AR"){
				 echo $zday."-".$arrayDat[$row2[event_day]]." ".$arrayMonths[$row2[event_month]].":".$row2[text];
				 } else {
					echo $zday."-".$row2[event_day]."/".$row2[event_month].":".$row2[text];
				}
				if($row2[maxDays]>0 && $row2[maxDays] == $row2[minDays]){
				    if ($row2[maxDays]==1){
				        echo ":".$arrayDat[$row2[minDays]]." ".$zDay." ";
				    } else {
				        echo ":".$arrayDat[$row2[minDays]]." ".$zDays." ";
				    }
				}else if($row2[maxDays]>1){
				    echo ":".$arrayDat[$row2[minDays]]."-".$arrayDat[$row2[maxDays]]." ".$zDays." ";
				}else {
				    echo " - ";
				}
				if($row2[maxDays]>0){
				    echo "</b></font>";
				}
				echo "</td></tr>";    		
				}
				}
				echo "</table>";
				echo "</div>";
				}
				echo "</div>";
				echo "</section>";
				echo "</div>";
				echo "</div>";

				$eventCount = $eventCount +1;
					if($eventCount%3==0){
								echo "</div>";
				}
				}
				}
          echo "</div></div>";
?>
			<!-- events -->


			


			<!-- Footer -->

			</div>

<script>
<?php if(!$foundCountry){ ?>
	var countryId =1;
	document.getElementById('countryDiv'+countryId).style.display='block';
<?php } ?>

 var xmlhttp1 = new XMLHttpRequest();
            xmlhttp1.onreadystatechange = function() {
            //alert("this.readyState:"+this.readyState+"\nthis.status="+this.status)
              if (this.readyState == 4 && this.status == 200) {
                myObjCountries = JSON.parse(this.responseText);
                //alert(this.responseText)
	
		var i =1;
		var txt = "<table>";
		var 	 closed = false;
		 for (x in myObjCountries) {
		 if(i%5==1){
		 txt  = txt + "<tr>";
		 closed = false;
		}
		
		i++;
		
		 txt  = txt + "<td onClick='selectCountriesImg(\""+myObjCountries[x].id+"\",\""+myObjCountries[x].flag+"\")' style='cursor: pointer;'><img src='<?php echo $imgSrc?>"+myObjCountries[x].flag+"' alt='"+myObjCountries[x].name+"'  style='width:200px;height:100px;' >"+myObjCountries[x].name+"</td>";
		if(i%5==5){
		 txt  = txt + "</tr>";
		 closed = true;
		}
		}
		 if(!closed){
		 txt  = txt + "</tr>";
		 }
		 txt  = txt + "</table>";
		document.getElementById('countriesDiv').innerHTML  = txt
		
		 
              }
            };
            xmlhttp1.open("GET", "<?php echo $getCountriesUrl?>GetCountries.php?lang=<?php echo $lang?>", true);
            xmlhttp1.send();

   function selectCountriesImg(zCountry,flag){
      document.getElementById('countryDiv'+countryId).style.display='none';
	  countryId=zCountry;
	  document.getElementById('countryDiv'+countryId).style.display='block';
  window.location = '#countryDiv'+countryId;
  openYear("", "<?php echo $years[0]?>-"+countryId)
   } 

   
   
   function openYear(evt, year) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent1");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks1");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(year).style.display = "block";
	if(evt!=""){ 
		evt.currentTarget.className += " active";
	}
}
</script>

