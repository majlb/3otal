<?php



header('Content-Type: text/html; charset=utf-8');
$lang = $_REQUEST["lang"];
if($lang==""){
	$lang="AR";
}
$year = $_REQUEST["year"];
$month = $_REQUEST["month"];
$day = $_REQUEST["day"];


		include ('../t-db/connection.php');
		$connection = new createConnection(); //i created a new object
		$connection->connectToDatabase(); // connected to the database
		$con = $connection->selectDatabase();// closed connection
		
				
	 mysqli_query($con,'SET CHARACTER SET utf8') ;
	 mysqli_query($con,'set names utf8');
	
	    $queryStr = "select c.id as id, m.text as name, c.abv as abv,c.east as east,c.weekend, ";
        $queryStr = $queryStr." ifnull((select GROUP_CONCAT(CONCAT(mm.text ,'_',concat(ec.nb_days_min,'-',ec.nb_days_max ) ) SEPARATOR ', ') ";
        $queryStr = $queryStr." from event e , multi_lang mm , event_countries ec ";
        $queryStr = $queryStr." where e.yearly =1 ";
        if($year!=""){
            $queryStr = $queryStr."and (e.event_year  = ".$year." or  e.event_year  = '') ";
        }
        if($day!=""){
            //$queryStr = $queryStr." and e.event_day = ".$day."  ";
            $queryStr = $queryStr." and (e.event_day = ".$day." or ( e.event_day > ".$day."-ec.nb_days_max and e.event_day < ".$day."+ec.nb_days_max )) ";
        }
       // $queryStr = $queryStr." or e.event_day - ec.nb_days_min <  ".$day." or e.event_day - ec.nb_days_max <  ".$day.")";
        if($month!=""){
            $queryStr = $queryStr." and e.event_month = ".$month." ";
        }
        $queryStr = $queryStr." and e.id_name =  mm.id_multi ";
        $queryStr = $queryStr." and mm.lang = '".$lang."'";
        $queryStr = $queryStr." and e.id = ec.id_event ";
        $queryStr = $queryStr." and ec.id_country = c.id ),'') vacs ";


       $queryStr = $queryStr." from Countries as c , multi_lang as m where c.id_name = m.id_multi and m.lang= '".$lang."' ";
	     
	     
	     
	     
	     mysqli_query($con,'SET CHARACTER SET utf8') ;
				mysqli_query($con,'set names utf8');
					$result  = mysqli_query($con,$queryStr );
				if($result!=""){
				    $outp = $result->fetch_all(MYSQLI_ASSOC);
				     $myJSON = json_encode($outp);
                    
                    echo $myJSON; 
				/*while($row = mysqli_fetch_array($result))
				{
				   $myObj->id = $row[id];
                    $myObj->name =  $row[text];
                    $myObj->abv =  $row[abv];
                    $myObj->east =  $row[east];
                    
               
				}*/
				    
				}
				     //$myJSON = json_encode($myObj);
                    
                   // echo $myJSON; 
						$connection->closeConnection();

?>		