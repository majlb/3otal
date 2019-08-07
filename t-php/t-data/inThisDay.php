<!DOCTYPE HTML>

<?php
//session_start();
//header('Content-Type: text/html; charset=utf-8');
	  
	  	include ('getInThisDay.php');

	  ?>
	  
	  <html>
	  <body>
	    <div id="countriesDiv"></div>  
		<br>
		<div>
		<table><tr>
		 <td>
		 <font color="white"><?php echo $lang_arr['day']?></font>
		 <center style='width=50px'>
		<select id='dayEvent' >
			<option value=''></option>
		    <option value='1'>1</option>
			<option value='2'>2</option>
			<option value='3'>3</option>
			<option value='4'>4</option>
			<option value='5'>5</option>
			<option value='6'>6</option>
			<option value='7'>7</option>
			<option value='8'>8</option>
			<option value='9'>9</option>
			<option value='10'>10</option>
			<option value='11'>11</option>
			<option value='12'>12</option>
			<option value='13'>13</option>
			<option value='14'>14</option>
			<option value='15'>15</option>
			<option value='16'>16</option>
			<option value='17'>17</option>
			<option value='18'>18</option>
			<option value='19'>19</option>
			<option value='20'>20</option>
			<option value='21'>21</option>
			<option value='22'>22</option>
			<option value='23'>23</option>
			<option value='24'>24</option>
			<option value='25'>25</option>
			<option value='26'>26</option>
			<option value='27'>27</option>
			<option value='28'>28</option>
			<option value='29'>29</option>
			<option value='30'>30</option>
		  <option value='31'>31</option>
		  </select>
		  </center>
		  </td>
		  <td>
		   
		   </td>
		   <td>
		   <font color="white"><?php echo $lang_arr['month']?></font>
		   	 <center style='width=50px'>
		   	<select id='monthEvent' >
				<option value=''></option>
				<option value='1'>1</option>
				<option value='2'>2</option>
				<option value='3'>3</option>
				<option value='4'>4</option>
				<option value='5'>5</option>
				<option value='6'>6</option>
				<option value='7'>7</option>
				<option value='8'>8</option>
				<option value='9'>9</option>
				<option value='10'>10</option>
				<option value='11'>11</option>
				<option value='12'>12</option>
			</select>
			</center>
			</td>
			</tr>
			<tr>
				<td colspan="4">
				  <center>
				    <input type='button' onclick='getEvents()' value='...'></input>
				   </center>
				</td>
			</tr>
			</table>
		</div>
		
		
		
	      <div id="divId">
	          
	      </div>
	  </body>
	  	      <script type="text/javascript">
			   var zzCountry ="<?php echo $country; ?>"
			
			     var xmlhttp1 = new XMLHttpRequest();
            xmlhttp1.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                myObjCountries = JSON.parse(this.responseText);
	
		var i =1;
		var txt = "<table>";
		 txt  = txt + "<tr><td solspan='3'><?php echo $lang_arr['allArabCountries']?></td><td onClick='selectCountriesImg(\"allArab\",\"allArab\")' style='cursor: pointer;'><img src='../../img/arab.jpg' alt='All'  style='width:200px;height:100px;' ></td></tr>";
		
		
		var 	 closed = false;
		 for (x in myObjCountries) {
		 if(i%5==1){
		 txt  = txt + "<tr>";
		 closed = false;
		}
		i =i+1;
		
		
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
		   if(zzCountry!=""){
			  window.location = '#divId';
			  }
		 
              }
            };
            xmlhttp1.open("GET", "../t-data/GetCountries.php?lang=<?php echo $lang?>", true);
            xmlhttp1.send(); 
			  
			  
			  
			  
			  
			  
	  myObj = JSON.parse('<?php echo $myJSON; ?>');
	  var txt = "<table>";
	  for (x in myObj) {
         txt = txt + "<tr><td></td><td><center><b><font color='red'>"+myObj[x].id+"-"+myObj[x].name+"</font></b></center></td></tr>";
         for(y in myObj[x].vacs){
              txt = txt + "<tr><td></td><td>--"+myObj[x].vacs[y].name+":  <b> "+myObj[x].vacs[y].event_day+"/" +myObj[x].vacs[y].event_month+"/" +myObj[x].vacs[y].event_year+"</b></td></tr>";
         }
		 if(myObj[x].vacs.length==0){
		  txt = txt +"<tr><td></td><td><?php echo $lang_arr['noIncidents']; ?></td></tr>";
		 }
	  }
	  txt = txt + "</table>";
	  document.getElementById("divId").innerHTML =  txt;
	  
	  
	  var mainCountry;
      function selectCountriesImg(zCountry,flag){
	  if(zCountry=="allArab"){
	    zCountry ="";
	  }
	  mainCountry = zCountry;
      window.location.href = 'happenThisDay.php?lang=<?php echo $lang?>&country='+zCountry;

   }  
	  
	 function getEvents(){
	  var zMonth = document.getElementById('monthEvent').value;
	  var zDay = document.getElementById('dayEvent').value;
	  if(mainCountry==undefined){
		mainCountry ="";
	  }
	  window.location.href = 'happenThisDay.php?lang=<?php echo $lang?>&country='+mainCountry+'&month='+zMonth+'&day='+zDay;
	 } 
	 
	 document.getElementById('monthEvent').value= "<?php echo (int)$month?>";
	 document.getElementById('dayEvent').value="<?php echo  (int)$day?>";
	 
	  </script>
</html>