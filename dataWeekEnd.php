



	   
<!-- Features -->


					<div class="container">
					<br>
					</br>
				<?php
			
				 $zDay1 = 1;
				if($lang=="EN"){
					$arrayDays= ["Sunday","Monday" ,"Tuesday","Wednesday","Thursday", "Friday","Saturday"];
				} else {
					$arrayDays = ["الأحد","الاثنين","الثلاثاء","الأربعاء","الخميس","الجمعة","السبت"];
				}
				
				   $queryStr = "select c.id , m.text,c.weekend ,c.flag from Countries as c , multi_lang as m where c.id_name = m.id_multi and m.lang='".$lang."'"; 
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
				$result  = mysqli_query($con,$queryStr );
				if($result!=""){
				while($row = mysqli_fetch_array($result))
				{
					echo "<div class='row'>";
				
				echo "<div class='4u 12u(medium)'>";
						echo "<div class='inner'>";
				echo "<header>";
				echo "<h2><font color='red'>".$row['text']."</font><br><img src='img/".$row['flag']."' alt='".$row['text']."'  style='width:200px;height:100px;' ><br></h2>";
				echo "<p></p>";
				echo "</header>";
				echo "</div>";
				echo "<center>";
				   $zDay1 = 1;
			   foreach($arrayDays as $day1){
			   $wkd = $row['weekend'];
			    if($wkd != null && $wkd != "" && stripos($wkd,''.$zDay1)	>-1){
				     echo "<div style='background-color:orange;width: 200px;color:white'>".$day1."</div>";
				  }else {
				    echo "<div style='background-color:#00FF00;width: 200px;color:white'>".$day1."</div>";
				  }
				     $zDay1 = $zDay1+1;
			   }
			   echo "</center>";
				echo "</div>";
				echo "</div>";
				}
				}
?>
			<!-- events -->


			


			<!-- Footer -->

			</div>



