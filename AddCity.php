<!DOCTYPE html>
<?php header('Content-Type: text/html; charset=utf-8');?>

<?php



 $the_count_=0;
 $tbl=0;
 $dsplay="none";
 
include ('connection.php');
//include("lang/".$lang.".php");
$connection = new createConnection(); //i created a new object
$connection->connectToDatabase(); // connected to the database
$con = $connection->selectDatabase();// select  connection

 mysqli_query($con,'SET CHARACTER SET utf8') ;

$queryStr = "select tt.id, tt.name  from (SELECT t.id,(select m.text  from multi_lang as m where t.id_name = m.id_multi and  m.lang ='AR') as name from Countries as t) as tt";

$queryStr = $queryStr." order by tt.name";
$result = mysqli_query($con,$queryStr);


 
 session_start();

?>


<html>
   <head>
    <title>MAJ</title>
     <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
 
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqgXzv4rxYIVCEUU4r_Dgxx-c2LTnHJwY&callback=initMap" type="text/javascript" language="AR"></script>
    <script>
var map;
var markers = [];
function initialize() {
  var mapOptions = {
    zoom: 16,
    center: new google.maps.LatLng(33.762822,35.884),
    mapTypeId: google.maps.MapTypeId.SATELLITE
  };
  map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);
  var marker = new google.maps.Marker({
      position: new google.maps.LatLng(33.762822,35.884),
      map: map
    })
  markers.push(marker);
  document.getElementById('latMap').value =33.762822;
  document.getElementById('lngMap').value =35.884;
  google.maps.event.addListener(map, 'click', function(e) {
	    placeMarker(e.latLng, map);
	  });
}

function placeMarker(position, map) {
	  var marker = new google.maps.Marker({
	    position: position,
	    map: map
	  });
	  clearOverlays();
	  markers = [];
	  markers.push(marker);
	  map.panTo(position);
	  document.getElementById('latMap').value =position.lat();
	  document.getElementById('lngMap').value =position.lng();
	  //myForm.lengMap =position; 
	}

function setAllMap(map) {
	  for (var i = 0; i < markers.length; i++) {
	    markers[i].setMap(map);
	  }
	}

function clearOverlays() {
	  setAllMap(null);
	}
	
google.maps.event.addDomListener(window, 'load', initialize);

    </script>
 
  </head>
<body>

<form name="myForm" action="private/addCityAction.php" method="post" enctype="multipart/form-data">
<table>
<tr><td>Country: </td><td>

<select name="country">
<?php 
while($row = mysqli_fetch_array($result))
{  

	echo "<option value='".$row['id']."'>".$row['name']."</option>";

 
}
?>  
</select>
</td></tr> 


<tr><td>Name in English:</td><td> <input type="text" name="EnName" ></td></tr> 
<tr><td>Name in Arabic:</td><td>  <input type="text" name="ArName" ></td></tr> 

<tr><td>Title in English:</td><td> <input type="text" name="EnTitle" ></td></tr> 
<tr><td>Title in Arabic:</td><td>  <input type="text" name="ArTitle" ></td></tr> 

<tr><td>Subject in English:</td><td> <input type="text" name="EnSubject" ></td></tr> 
<tr><td>Subject in Arabic:</td><td>  <input type="text" name="ArSubject" ></td></tr> 



<tr><td>Photo: </td><td> <input type="file" name="uploaded" id="uploaded"></td></tr>
<tr><td colspan="2"><div id="map-canvas" style="width: 800px;height:270px"></div>
<input type="text" id="lngMap" name="lngMap" value = "<?php echo $rowUpdate['map_lat'] ?>" >
<input type="text" id="latMap" name="latMap" value = "<?php echo $rowUpdate['map_lng'] ?>" >
</td></tr> 
 
<tr><td></td> <td><input type="submit"></td></tr>  
</table>
</form>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44225666-1', 'al-marej.com');
  ga('send', 'pageview');

</script>
</body>
<?php 
$connection->closeConnection();
?>
</html>