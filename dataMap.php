
<?php
session_start();

if($isMain==""){
	$isMain="0";
	}
$displayMain = "block";
if($isMain=="1"){
	$displayMain = "none";
}	
?>

   <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  
  
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#datepicker" ).datepicker();
  } );
  </script>
 <style>
body {font-family: Arial;}

/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}

/* Style the close button */
.topright {
  float: right;
  cursor: pointer;
  font-size: 28px;
}

.topright:hover {color: red;}
</style>
   
    
    
    

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    var xmlhttp = new XMLHttpRequest();
     var myObj ;
     var curDate = new Date();
     drawMap( curDate.getFullYear(),curDate.getMonth()+1,curDate.getDate(),curDate.getDay()+1);
     var theDayOftheWeek;
      function drawMap(year,month,day,dayOfTheWeek){
          theDayOftheWeek = dayOfTheWeek;
            xmlhttp.onreadystatechange = function() {
              if (this.readyState == 4 && this.status == 200) {
                myObj = JSON.parse(this.responseText);
                drawRegionsMap(dayOfTheWeek);
              }
            };
            xmlhttp.open("GET", "getVacationsMap.php?lang=<?php echo $lang?>&year="+year+"&month="+month+"&day="+day, true);
            xmlhttp.send();
    
    
   
      google.charts.load('current', {
        'packages':['geochart'],
        // Note: you will need to get a mapsApiKey for your project.
        // See: https://developers.google.com/chart/interactive/docs/basic_load_libs#load-settings
        'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
      });
      google.charts.setOnLoadCallback(drawRegionsMap);
    }

      function drawRegionsMap() {
       
        
        
        
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Country'); // Implicit domain label col.
        data.addColumn('number', 'Value'); // Implicit series 1 data col.
        data.addColumn({type:'string', role:'tooltip'}); // 
     
        var data1 = new google.visualization.DataTable();
        data1.addColumn('string', 'Country'); // Implicit domain label col.
        data1.addColumn('number', 'Value'); // Implicit series 1 data col.
        data1.addColumn({type:'string', role:'tooltip'}); // 
        
          var data0 = new google.visualization.DataTable();
        data0.addColumn('string', 'Country'); // Implicit domain label col.
        data0.addColumn('number', 'Value'); // Implicit series 1 data col.
        data0.addColumn({type:'string', role:'tooltip'}); // 
        
         var arrayVac = {};
         arrayVac[1] = "<?php echo $lang_arr['workDay']?>";
         arrayVac[3] = "<?php echo $lang_arr['eventNoVacation']?>";
         arrayVac[4] = "<?php echo $lang_arr['weekEnd']?>";
        arrayVac[5] = "<?php echo $lang_arr['vacation']?>";
       
        var allOne =  true;
        var workDay =  false;
        var workDay1 =  false;
        var workDay2 =  false;
        var holidayDay =  false;
        var holidayDay1 =  false;
        var holidayDay2 =  false;
        var weekend  =  false;
        var weekend1  =  false;
        var weekend2  =  false;
        for (x in myObj) {
         if(myObj[x].east ==1){
         var mod =1;
         var vacReason = "";
         
         if(myObj[x].vacs != null && myObj[x].vacs != ""){
             mod =5;   
             vacReason = myObj[x].vacs;
             holidayDay1 = true;
              holidayDay = true;
             allOne = false;
         } else if(myObj[x].weekend != null && myObj[x].weekend != "" && myObj[x].weekend.indexOf(theDayOftheWeek)>-1){
             mod =4;   
             vacReason =arrayVac[4];
             allOne = false;
             weekend1 =  true;
              weekend =  true;
         }else{
              workDay = true;
             workDay1 = true;
            vacReason =  arrayVac[1];
         }          
         if(myObj[x].abv =="PS"){
             myObj[x].abv = "IL";
         }
         
         data.addRow([{v:myObj[x].abv,f:myObj[x].name},mod,vacReason]);
         data0.addRow([{v:myObj[x].abv,f:myObj[x].name},mod,vacReason]);
         
         } else if(myObj[x].east ==0){
             var mod =1;
         var vacReason = "";
         if(myObj[x].vacs != null && myObj[x].vacs != ""){
             mod =5;   
             vacReason = myObj[x].vacs;
             allOne = false;
             holidayDay2 = true;
             holidayDay = true;
         }else if(myObj[x].weekend != null && myObj[x].weekend != "" && myObj[x].weekend.indexOf(theDayOftheWeek)>-1){
             mod =4;   
             vacReason =arrayVac[4];
             allOne = false;
             weekend2 =  true;
             weekend =  true;
         }else{
             workDay = true;
             workDay2 = true;
             vacReason =  arrayVac[1];
         }    
         data1.addRow([{v:myObj[x].abv,f:myObj[x].name},mod,vacReason]);
         data0.addRow([{v:myObj[x].abv,f:myObj[x].name},mod,vacReason]);
          
         }
      }

       //MEA 
       if(allOne){
               var options = {
          region: '145', // MEA
          colorAxis: {colors: ['#33FFBB','#33FFBB', '#33FFBB']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       } else if(workDay1 && holidayDay1 && weekend1) {
        var options = {
          region: '145', // MEA
          colorAxis: {colors: ['#33FFBB','#FFFF00', '#FE642E']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }else if(workDay1 &&  weekend1) {
        var options = {
          region: '145', // MEA
          colorAxis: {colors: ['#33FFBB','orange', 'orange']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }else if(workDay1 &&  holidayDay1) {
        var options = {
          region: '145', // MEA
          colorAxis: {colors: ['#33FFBB','#FE642E', '#FE642E']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }else if(weekend1 &&  holidayDay1) {
        var options = {
          region: '145', // MEA
          colorAxis: {colors: ['orange','orange', '#FE642E']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }else if( holidayDay1) {
        var options = {
          region: '145', // MEA
          colorAxis: {colors: ['#FE642E','#FE642E', '#FE642E']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }else if( weekend1) {
        var options = {
          region: '145', // MEA
          colorAxis: {colors: ['orange','orange', 'orange']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }else if( workDay1) {
        var options = {
          region: '002', // NA
          colorAxis: {colors: ['#33FFBB','#33FFBB', '#33FFBB']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }
        
    
//ALL
if(allOne){
               var options0 = {
          colorAxis: {colors: ['#33FFBB','#33FFBB', '#33FFBB']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       } else if(workDay && holidayDay && weekend) {
        var options0 = {
          colorAxis: {colors: ['#33FFBB','#FFFF00', '#FE642E']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }else if(workDay &&  weekend) {
        var options0 = {
          colorAxis: {colors: ['#33FFBB','orange', 'orange']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }else if(workDay &&  holidayDay) {
        var options0 = {
          colorAxis: {colors: ['#33FFBB','#FE642E', '#FE642E']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }else if(weekend &&  holidayDay) {
        var options0 = {
          colorAxis: {colors: ['orange','orange', '#FE642E']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }else if( holidayDay) {
        var options0 = {
          colorAxis: {colors: ['#FE642E','#FE642E', '#FE642E']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }else if( weekend) {
        var options0 = {
          colorAxis: {colors: ['orange','orange', 'orange']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }else if( workDay) {
        var options0 = {
          colorAxis: {colors: ['#33FFBB','#33FFBB', '#33FFBB']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }
       

       
       //NA
           if(allOne){
               var options1 = {
          region: '002', // NA
          colorAxis: {colors: ['#33FFBB','#33FFBB', '#33FFBB']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       } else if(workDay2 && holidayDay2 && weekend2) {
        var options1 = {
          region: '002', // NA
          colorAxis: {colors: ['#33FFBB','#FFFF00', '#FE642E']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }else if(workDay2 &&  weekend2) {
        var options1 = {
          region: '002', // NA
          colorAxis: {colors: ['#33FFBB','orange', 'orange']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }else if(workDay2 &&  holidayDay2) {
        var options1 = {
          region: '002', // NA
          colorAxis: {colors: ['#33FFBB','#FE642E', '#FE642E']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }else if(weekend2 &&  holidayDay2) {
        var options1 = {
          region: '002', // NA
          colorAxis: {colors: ['orange','orange', '#FE642E']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }else if( holidayDay2) {
        var options1 = {
          region: '002', // NA
          colorAxis: {colors: ['#FE642E','#FE642E', '#FE642E']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }else if( weekend2) {
        var options1 = {
          region: '002', // NA
          colorAxis: {colors: ['orange','orange', 'orange']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }else if( workDay2) {
        var options1 = {
          region: '002', // NA
          colorAxis: {colors: ['#33FFBB','#33FFBB', '#33FFBB']},
          backgroundColor: '#81d4fa',
          datalessRegionColor: '#F2F2F2',
          defaultColor: '#f5f5f5',
        };
       }
       
        var chart = new google.visualization.GeoChart(document.getElementById('geochart-colors'));
        chart.draw(data, options);
        
           var chart0 = new google.visualization.GeoChart(document.getElementById('geochart-colors0'));
        chart0.draw(data0, options0);
     
        
      var chart1 = new google.visualization.GeoChart(document.getElementById('geochart-colors1'));
        chart1.draw(data1, options1);
      }
      
      function changeDate(){
          var dat =  $("#datepicker").val();
          
        
          if(dat != ""){
              zDate = new Date(dat); 
              
          } else {
              zDate = new Date(); 
          }
          var zYear = zDate.getFullYear();
          var zMonth = zDate.getMonth()+1;
          var zDay = zDate.getDate();
          var zDayOfTheWeek = zDate.getDay()+1;
          drawMap(zYear,zMonth,zDay,zDayOfTheWeek)
      }
    </script>
  </head>
  <body>
    <p><?php echo $lang_arr['date']; ?> <input type="text" id="datepicker"><input type="button" value="..." onclick="changeDate()"/></p>
    <center>
	<div>
	   <div style='background-color:#00FF00;width: 200px;color:white'><?php echo $lang_arr['workDay']; ?></div><br>
	   <div style='background-color:orange;width: 200px;color:white'><?php echo $lang_arr['weekEnd']; ?></div><br>
	   <div style='background-color:red;width: 200px;color:white'><?php echo $lang_arr['vacation']; ?></div><br>
	    <div style='color:white'><?php echo $lang_arr['hoverCountry']; ?></div><br>
	  </div>
	</div>
	</center>
    <div class="tab">
        <button class="tablinks" onclick="openTab(event, 'tab1')" id="defaultOpen"><?php echo $lang_arr['allArabCountries']; ?></button>
        <button class="tablinks" onclick="openTab(event, 'tab2')" style="display:<?php echo $displayMain?>"><?php echo $lang_arr['eastArabCountries']; ?></button>
        <button class="tablinks" onclick="openTab(event, 'tab3')" style="display:<?php echo $displayMain?>"><?php echo $lang_arr['westArabCountries']; ?></button>
    </div>
    
    <div id="tab1" class="tabcontent">
          <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
         <div id="geochart-colors0" style="width: 100%; height: 100%;"></div><br>
    </span>
    </div>
    
     <div id="tab2" class="tabcontent">
          <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
      <div id="geochart-colors" style="width: 100%; height: 100%;"></div><br>
        </span>
    </div>
    
     <div id="tab3" class="tabcontent">
          <span onclick="this.parentElement.style.display='none'" class="topright">&times</span>
   <div id="geochart-colors1" style="width: 100%; height: 100%;"></div>
        </span>
    </div>
    
     
   
      
  </body>
  
  <script>
function openTab(evt, region) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(region).style.display = "block";
  document.getElementById("tab1").style.width = "100%";
  document.getElementById("tab1").style.height = "100%";
  document.getElementById("tab2").style.width = "100%";
  document.getElementById("tab2").style.height = "100%";
  document.getElementById("tab3").style.width = "100%";
  document.getElementById("tab3").style.height = "100%";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
  