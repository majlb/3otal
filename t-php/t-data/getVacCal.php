<?php
//mfi
error_reporting(E_ERROR);

header('Content-Type: text/html; charset=utf-8');
$lang = $_REQUEST["lang"];
if($lang==""){
	$lang="AR";
}
$year = $_REQUEST["year"];
$month = $_REQUEST["month"];
$day = $_REQUEST["day"];
$country = $_REQUEST["country"];

		$years = [2019,2020,2021,2022,2023];
		include ('../t-db/connection.php');
		$connection = new createConnection(); //i created a new object
		$connection->connectToDatabase(); // connected to the database
		$con = $connection->selectDatabase();// closed connection
		
				
	 mysqli_query($con,'SET CHARACTER SET utf8') ;
	 mysqli_query($con,'set names utf8');
	$kk = 0;
	 $json = array();
	    	foreach ($years as $year) {
	    	 $queryStr1 = "";
                
                $queryStr1 = $queryStr1." select mm.text ,e.event_day ,e.event_month , e.event_year , ec.nb_days_min,ec.nb_days_max  ";
                $queryStr1 = $queryStr1." from event e , multi_lang mm , event_countries ec ";
                $queryStr1 = $queryStr1." where  e.id_name =  mm.id_multi ";
                $queryStr1 = $queryStr1." and mm.lang = '".$lang."'";
                $queryStr1 = $queryStr1." and e.id = ec.id_event and e.yearly=1 ";
                $queryStr1 = $queryStr1." and (e.event_year =".$year." or e.event_year = '') ";
                if($country!=''){
                        $queryStr1 = $queryStr1." and ec.id_country= ".$country;
                }
                $queryStr1 = $queryStr1." group by mm.text ,e.event_day ,e.event_month , e.event_year  ";
                $queryStr1 = $queryStr1." order by e.event_month , e.event_day ";
                	$result1  = mysqli_query($con,$queryStr1 );
                		if($result1!=""){
                		      while($row1 = mysqli_fetch_array($result1))
			            	{
				             $json[$kk]->name = $row1[text];
				             $json[$kk]->event_day = $row1[event_day];
				             $json[$kk]->event_month = $row1[event_month];
				             $json[$kk]->event_year = $year;
				             $json[$kk]->nb_days_min = $row1[nb_days_min];
				             $json[$kk]->nb_days_max = $row1[nb_days_max];
				           
				             $kk=$kk+1;
				            }
                		    
                		}
	    	    
	    	}
	    	
	    	   $myJSON = json_encode($json);
	    	   echo $myJSON;
						$connection->closeConnection();

?>		