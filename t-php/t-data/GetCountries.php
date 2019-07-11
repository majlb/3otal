<?php
//mfi
error_reporting(E_ERROR);

//include "../../t-include/common.php";
header('Content-Type: text/html; charset=utf-8');
$lang = $_REQUEST["lang"];
if($lang==""){
	$lang="EN";
}

 		include ('../t-db/connection.php');

		$connection = new createConnection(); //i created a new object
		$connection->connectToDatabase(); // connected to the database
		$con = $connection->selectDatabase();// closed connection
		
				
	 mysqli_query($con,'SET CHARACTER SET utf8') ;
	 mysqli_query($con,'set names utf8');
	 $queryStr = "select c.id as id, m.text as name, c.abv as abv,c.east as east,c.flag as flag from Countries as c , multi_lang as m where c.id_name = m.id_multi and m.lang='".$lang."'"; 
	     mysqli_query($con,'SET CHARACTER SET utf8') ;
				mysqli_query($con,'set names utf8');
					$result  = mysqli_query($con,$queryStr );
				if($result!=""){
				  //  $outp = $result->fetch_all(MYSQLI_ASSOC);
				  //   $myJSON = json_encode($outp);
                    
                   // echo $myJSON; 
                   $json = array();
                   $k=0;
				while($row = mysqli_fetch_array($result))
				{
				    $json[$k]->id = $row[id];
                    $json[$k]->name =  $row[name];
                    $json[$k]->abv =  $row[abv];
                    $json[$k]->east =  $row[east];
					$json[$k]->flag =  $row[flag];
                
                $queryStr1 = "";
                
                 $queryStr1 = $queryStr1." select  mm.text ,e.event_day ,e.event_month , e.event_year , ec.nb_days_min,ec.nb_days_max  ";
                $queryStr1 = $queryStr1." from event e , multi_lang mm , event_countries ec ";
                $queryStr1 = $queryStr1." where  e.id_name =  mm.id_multi ";
                $queryStr1 = $queryStr1." and mm.lang = '".$lang."'";
                $queryStr1 = $queryStr1." and e.id = ec.id_event and e.yearly=1 ";
                $queryStr1 = $queryStr1." and (e.event_year =2019 or e.event_year = '') ";
                $queryStr1 = $queryStr1." and ec.id_country =  ".$row[id];
                $queryStr1 = $queryStr1." order by e.event_month , e.event_day ";
                
                	$result1  = mysqli_query($con,$queryStr1 );
                		if($result1!=""){
                		      $myObj1 = array();
                		      $kk=0;
                		    while($row1 = mysqli_fetch_array($result1))
			            	{
				             $myObj1[$kk]->name = $row1[text];
				               $myObj1[$kk]->event_day = $row1[event_day];
				                 $myObj1[$kk]->event_month = $row1[event_month];
				                   $myObj1[$kk]->event_year = $row1[event_year];
				             $myObj1[$kk]->nb_days_min = $row1[nb_days_min];
				             $myObj1[$kk]->nb_days_max = $row1[nb_days_max];
				           
				             $kk=$kk+1;
				            }
				            $json[$k]->vacs = $myObj1;
                		}
               // $json[$k] = $myObj;
                $k=$k+1;
                
				}
				    
				}
				     $myJSON = json_encode($json);
                    
                   echo $myJSON; 
						$connection->closeConnection();

?>		