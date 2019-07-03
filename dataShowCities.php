



	   
<!-- Features -->
				<div id="features-wrapper">


					<div class="container">
					<br>
					<center><h2><b><?php echo $lang_arr['pressOnFlagForEvent']?><b><h2> </center>
					</br>
                   <div id="countriesDiv"></div>
				<?php
				
			    $queryStr = "select c.id , m.text from Countries as c , multi_lang as m where c.id_name = m.id_multi and m.lang='".$lang."'"; 
                $resultCntStr="SELECT count(1)  from (".$queryStr.") as mm";
                
         
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
		
				   
				 $queryStr2 = "  SELECT ( select m.text from multi_lang as m where m.id_multi = c.id_name and lang='".$lang."') name,  ";
				$queryStr2 = $queryStr2."( select m.text from multi_lang as m where m.id_multi = c.id_title and lang='".$lang."') title, ";
				$queryStr2 = $queryStr2."( select m.text from multi_lang as m where m.id_multi = c.id_subject and lang='".$lang."') subject, ";
				$queryStr2 = $queryStr2."( select m.img from city_img as m where m.id_city= c.id and m.is_main='1') img FROM city as c ";
				   
				   
				   
					$result2  = mysqli_query($con,$queryStr2 );
				                if (!$result2) {
    printf("Error 2: %s\n", mysqli_error($con));
    exit();
}
				
				
					echo "<table>";
				if($result2!=""){
				while($row2 = mysqli_fetch_array($result2))
				{
			
          
				echo "<tr><td><b>".$row2[name]."</b></td></tr>";
				echo "<tr><td>".$row2[title]."</td><td><img src='img/".$row2[img]."' alt='".$row2[name]."'  style='width:200px;height:100px;' ></td></tr>";
				echo "<tr><td>".$row2[subject]."</td></tr>";
				}
				}
				echo "</table>";
				
				
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
		
		 txt  = txt + "<td onClick='selectCountriesImg(\""+myObjCountries[x].id+"\",\""+myObjCountries[x].flag+"\")' style='cursor: pointer;'><img src='img/"+myObjCountries[x].flag+"' alt='"+myObjCountries[x].name+"'  style='width:200px;height:100px;' >"+myObjCountries[x].name+"</td>";
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
            xmlhttp1.open("GET", "GetCountries.php?lang=<?php echo $lang?>", true);
            xmlhttp1.send();

   function selectCountriesImg(zCountry,flag){
      document.getElementById('countryDiv'+countryId).style.display='none';
	  countryId=zCountry;
	  document.getElementById('countryDiv'+countryId).style.display='block';
  window.location = '#countryDiv'+countryId;
   } 
</script>

