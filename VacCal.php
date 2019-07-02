<!DOCTYPE HTML>
<?php
session_start();
header('Content-Type: text/html; charset=utf-8');


$lang = $_REQUEST["lang"];
if($lang==""){
	$lang="AR";
}
include("".$lang.".php");
if($lang=="AR"){
	$drHtml = "RTL";
	$side = "right";
} else {
	$drHtml = "LTR";
	$side = "left";
}

?>
<html  dir="<?php echo $drHtml?>">
    <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      var xmlhttp = new XMLHttpRequest();
      var myObj;
      var myObjCountries;
      
    var zCountry='';
		
            
            
      
      google.charts.load("current", {packages:["calendar"]});
      google.charts.setOnLoadCallback(drawChart);
      drawCall('','');
      
        function drawCall(countryId,flag){
            zCountry=countryId;
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                myObj = JSON.parse(this.responseText);
                drawChart(flag);
              }
            };
            xmlhttp.open("GET", "getVacCal.php?lang=<?php echo $lang?>&country="+countryId, true);
            xmlhttp.send();
            google.charts.setOnLoadCallback(drawChart);
    }
      

   function drawChart(flag) {
       var dataTable = new google.visualization.DataTable();
       dataTable.addColumn({ type: 'date', id: 'Date' });
       dataTable.addColumn({ type: 'number', id: 'off' });
       dataTable.addColumn({type: 'string', role: 'tooltip'});
      var lastDay = 0;
      var lastMonth = 0;
      var lastYear = 0 ;
      var zName  = "";
      var map = {};
               for (x in myObj) {
                   if(lastDay!=0 && (lastDay != myObj[x].event_day || lastMonth != myObj[x].event_month-1)){
                       if(zName == ""){
                            zName =  myObj[x].name; 
                            lastDay = myObj[x].event_day;
                       lastMonth =myObj[x].event_month-1;
                       lastYear =myObj[x].event_year;
                       }
                     /*  if( lastMonth==11){
                        alert(zName +"T:"+myObj[x].event_year);
                       }*/
                       zName =  zName  + "(" + lastDay +"/" +(lastMonth+1) + ")";
                       dataTable.addRow( [new Date(lastYear,lastMonth,lastDay).addDays(0), 5,zName ]);
                     /* if(zCountry!=''){
                       var arr =zName.split(",");
                       var zMax = -1;
                       var xName = "";
                       while(zMax!=0){
                           zMax = 0; 
                        for(var i=0;i<arr.length;i++){
                           if(map[arr[i]] > zMax){
                               zMax = map[arr[i]];
                               map[arr[i]] = map[arr[i]]-1;
                               xName = arr[i];
                           } else if(zMax>0 && map[arr[i]] == zMax){
                               map[arr[i]] = map[arr[i]]-1;
                               if(xName == ""){
                                        xName = arr[i]; 
                                 } else {
                                         xName = xName +","+arr[i];
                                   }
                           }
                        }
                         dataTable.addRow( [new Date(lastYear,lastMonth,lastDay).addDays(zMax), 5,xName]);
                       }
                       }*/
                       
                        lastDay = myObj[x].event_day;
                       lastMonth =myObj[x].event_month-1;
                       
                     lastYear =myObj[x].event_year;
                     zName =  myObj[x].name; 
                     map = {};
                       map[myObj[x].name]=myObj[x].nb_days_min;
                   } else {
                       
                       
                     lastDay = myObj[x].event_day;
                     lastMonth =myObj[x].event_month-1;
                     lastYear =myObj[x].event_year;
                       if(zName == ""){
                            zName = myObj[x].name; 
                       } else {
                            zName = zName +","+myObj[x].name;
                           
                       }
                       map[myObj[x].name]=myObj[x].nb_days_min;
                  }               
                   
               }
                  zName =  zName  + "(" + lastDay +"/" +(lastMonth+1) + ")";
                       dataTable.addRow( [new Date(lastYear,lastMonth,lastDay).addDays(0), 5,zName ]);
       
 

       var chart = new google.visualization.Calendar(document.getElementById('calendar_basic'));

       var options = {
         title: "3otal",
         height: 1000,
           colorAxis: {colors: ['#FE642E','#FE642E', '#FE642E']},
       };

       chart.draw(dataTable, options);
	   if(flag!='' && flag != undefined){
	   	var  txt1 = "<center><table><tr><td><img src='img/"+flag+"'  style='width:300px;height:200px;' ></td></tr></table></center>";
		document.getElementById('mainCountryDiv').innerHTML  = txt1
	  }
	   
   }
   
   
   Date.prototype.addDays = function(days) {
    var date = new Date(this.valueOf());
    date.setDate(date.getDate() + days);
    return date;
}
  
    </script>
  </head>
  <body>
      <select id='idCountry' onChange="selectCountries()"></select><input type="button" value="..." onClick="selectCountries()"/>
  <div id="countriesDiv"></div>  
  <div id="mainCountryDiv"></div>  
  <div id="calendar_basic" style="width: 1000px; height: 350px;"></div>
  </body>
  
  <script>
    var xmlhttp1 = new XMLHttpRequest();
            xmlhttp1.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                myObjCountries = JSON.parse(this.responseText);
                         var list1 = document.getElementById('idCountry');
	
		list1.options[0] = new Option('----', '');
		var i =1;
		var txt = "<table>";
		var 	 closed = false;
		 for (x in myObjCountries) {
		 if(i%5==1){
		 txt  = txt + "<tr>";
		 closed = false;
		}
		list1.options[i++] = new Option(myObjCountries[x].name, myObjCountries[x].id);
		
		
		
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
          
   function selectCountries(){
       var zCountry =  document.getElementById('idCountry').value;
       drawCall(zCountry,'');
       
   }  
   
      function selectCountriesImg(zCountry,flag){
       drawCall(zCountry,flag);
      window.location = '#mainCountryDiv';

   }  
      
  </script>
</html>