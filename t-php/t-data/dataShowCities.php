



	   
<!-- Features -->
  <!-- script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqgXzv4rxYIVCEUU4r_Dgxx-c2LTnHJwY&callback=initMap" type="text/javascript" language="AR"></script> -->
				<div id="features-wrapper">


					<div class="container">
					<br>
					<center><h2><b><?php echo $lang_arr['pressOnFlagForCities']?><b><h2> </center>
					</br>
                   <div id="countriesDiv"></div>
				<?php
				//mfi
				error_reporting(E_ERROR);
				
				
			    $queryStr = "select c.id , m.text from Countries as c , multi_lang as m where c.id_name = m.id_multi and m.lang='".$lang."'"; 
                $resultCntStr="SELECT count(1)  from (".$queryStr.") as mm";
                $zMapCanvas = "";
				$zMapAtt = "";
         
                mysqli_query($con,'SET CHARACTER SET utf8') ;
				mysqli_query($con,'set names utf8');
                $resultCnt = mysqli_query($con,$resultCntStr);
                if (!$resultCnt) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
  
                $data=mysqli_fetch_array($resultCnt);
                $ttl = $data[0];
            	echo "<div class='row'>";
                echo "</div>";
				$result  = mysqli_query($con,$queryStr );
				if($result!=""){
				while($row = mysqli_fetch_array($result))
				{
				
				if($eventCount% 3==0){
				echo "<div class='row'>";
				}
				echo "<div class='4u 12u(medium)'>";
				echo "<div id='countryDiv".$row['id']."' style='display:none'>";
				echo "<section class='box feature'>";
			
				echo "<div class='inner'>";
				echo "<header>";
				echo "<h2><font color='red'>".$row['text']."</font></h2>";
				echo "<p></p>";
				echo "</header>";
		
				  $zCountryId =  $row['id'];
				 $queryStr2 = "  SELECT c.id , c.map_lat,c.map_lng,( select m.text from multi_lang as m where m.id_multi = c.id_name and lang='".$lang."') name,  ";
				$queryStr2 = $queryStr2."( select m.text from multi_lang as m where m.id_multi = c.id_title and lang='".$lang."') title, ";
				$queryStr2 = $queryStr2."( select m.text from multi_lang as m where m.id_multi = c.id_subject and lang='".$lang."') subject, ";
				$queryStr2 = $queryStr2."( select m.img from city_img as m where m.id_city= c.id and m.is_main='1') img FROM city as c where c.id_country = ".$zCountryId;
				   
				   
				   
					$result2  = mysqli_query($con,$queryStr2 );
				                if (!$result2) {
    printf("Error 2: %s\n", mysqli_error($con));
    exit();
}
				
				
				if($result2!=""){
				while($row2 = mysqli_fetch_array($result2))
				{
				if($zMapCanvas!=""){
				$zMapCanvas = $zMapCanvas."*";
				}
			    $zMapCanvas = $zMapCanvas."map-canvas_".$zCountryId."_".$row2[id];
				
				if($zMapAtt!=""){
				$zMapAtt = $zMapAtt."*";
				}
			    $zMapAtt = $zMapAtt."{".$row2[map_lat]."-".$row2[map_lng]."}";
				
				
               echo "<div style='border:2px solid skyBlue;'>";
		  	   echo "<table>";
				echo "<tr><td><img src='../../img/".$row2[img]."' alt='".$row2[name]."'  style='width:300px;height:160px;' ></td></tr>";			
				echo "<tr><td><h2><font color='skyBlue'>".$row2[name]."</font></h2></td></tr>";
				echo "<tr><td>".$row2[title]."</td></tr>";
				echo "<tr><td>".$row2[subject]."</td></tr>";
					
				echo "<tr><td><font color='#adff2f' style='cursor:pointer'  onclick='showMap(\"map-canvas_".$zCountryId."_".$row2[id]."\",".$row2[map_lat].",".$row2[map_lng].")'>[".$lang_arr['showMap']."]</font><font color='#f9530b' style='cursor:pointer'  onclick='hideMap(\"map-canvas_".$zCountryId."_".$row2[id]."\")'>[".$lang_arr['hideMap']."]</font></td></tr>";
				echo "<tr><td><center><div id='map-canvas_".$zCountryId."_".$row2[id]."' style='width: 260px;height:140px;display:none' ></div></center></td></tr>";
				echo "</table>";
				echo "</div>";
				}
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
var countryId =1;
document.getElementById('countryDiv'+countryId).style.display='block';

 var xmlhttp1 = new XMLHttpRequest();
            xmlhttp1.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                myObjCountries = JSON.parse(this.responseText);
	
		var i =1;
		var txt = "<table>";
		var 	 closed = false;
		 for (x in myObjCountries) {
		 if(i%5==1){
		 txt  = txt + "<tr>";
		 closed = false;
		}
		
		i++;
		
		 txt  = txt + "<td onClick='selectCountriesImg(\""+myObjCountries[x].id+"\",\""+myObjCountries[x].flag+"\")' style='cursor: pointer;'><img src='../../img/"+myObjCountries[x].flag+"' alt='"+myObjCountries[x].name+"'  style='width:200px;height:100px;' >"+myObjCountries[x].name+"</td>";
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
            xmlhttp1.open("GET", "../t-data/GetCountries.php?lang=<?php echo $lang?>", true);
            xmlhttp1.send();

   function selectCountriesImg(zCountry,flag){
      document.getElementById('countryDiv'+countryId).style.display='none';
	  countryId=zCountry;
	  document.getElementById('countryDiv'+countryId).style.display='block';
  window.location = '#countryDiv'+countryId;
   } 
   
   
///MAPS

var   zMapCanvas = "<?php echo $zMapCanvas;?>";
var   zMapAtt = "<?php echo $zMapAtt;?>";
var zMapCanvasArr = zMapCanvas.split("*");
var zMapAttArr= zMapAtt.split("*");
var map;
var markers = [];
/*for(var i=0;i<zMapCanvasArr.length;i++){
  var mapCanvs = zMapCanvasArr[i];
  var mapAtt = zMapAttArr[i];
  var lnt = mapAtt.split("-")[0];
  var lng = mapAtt.split("-")[1];
	}*/
   

	var mapCanvs;
	var lnt;
	var lng;
	var lstCanvas = "";
	function showMap(mapCanvs1,lnt1,lng1){
	if(lstCanvas!=""){
		document.getElementById(lstCanvas).style.display="none"	;
	}
	mapCanvs =mapCanvs1;
	lnt =lnt1;
	lng =lng1;
	lstCanvas = mapCanvs1;
	google.maps.event.addDomListener(window, 'load', initialize);
	initialize();
	document.getElementById(mapCanvs1).style.display="block"	;

  }
	
function initialize() {
	  var mapOptions = {
		zoom: 4,
		center: new google.maps.LatLng(lnt,lng),
		mapTypeId: google.maps.MapTypeId.MAP
	  };
	  map = new google.maps.Map(document.getElementById(mapCanvs),
		  mapOptions);
	  var marker = new google.maps.Marker({
		  position: new google.maps.LatLng(lnt,lng),
		  map: map
		})
	  markers.push(marker);

	}
	
	
	function hideMap(mapCanvs1){
         document.getElementById(mapCanvs1).style.display="none";
     }	
</script>

