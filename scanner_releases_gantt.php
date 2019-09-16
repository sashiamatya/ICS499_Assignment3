
<?php

  $nav_selected = "SCANNER"; 
  $left_buttons = "YES"; 
  $left_selected = "RELEASESGANTT"; 
  $null_variable = null;

  include("./nav.php");
  global $db;

  ?> 

<html>
  <head>
      <!--START OF GOOGLE GANTT CHART-->
      <!--
      <script type="text/javascript" src="https://www.google.com/jsapi"></script>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      -->

      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
      google.charts.load('current', {'packages':['gantt']});
      google.charts.setOnLoadCallback(drawChart);
      //google.charts.setOnLoadCallback(drawChart2);

      function daysToMilliseconds(days) {
        return days * 24 * 60 * 60 * 1000;
      }     
      
      
      function drawChart() {        
        var data = new google.visualization.DataTable();
        data.addColumn('string','Task ID'); //id
        data.addColumn('string','Task Name'); //name
       //data.addColumn('string','Resource'); //type
        data.addColumn('date','Start Date'); //open_date
        data.addColumn('date','End Date'); //rtm_date
        data.addColumn('number','Duration'); 
        data.addColumn('number','Percent Complete');
        data.addColumn('string','Dependencies');


        data.addRow([
          <?php
              $sql = "SELECT * from releases ORDER BY open_date ASC;";
              $result = $db->query($sql);
                           
              if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                  echo "['".$row['id']."','".$row['name']."',new Date(".$row['open_date']."),new Date(".$row['rtm_date']."),"."null".","."null".","."null"."],";
                  //echo "[".$row['id'].",".$row['name'].",".$row['open_date'].",".$row['rtm_date'].",".null.",".null.",".null."],";
                }
              }
            ?>
        ]);
        
       
          
          var options = {
            height: 400            
          };


          var chart = new google.visualization.Gantt(document.getElementById('gantt_div'));
          chart.draw(data,options);
      }
      //END OF drawChart()
      

      /*
      function drawChart2() {

        var data2 = new google.visualization.DataTable();
        data2.addColumn('string', 'Task ID');
        data2.addColumn('string', 'Task Name');
        data2.addColumn('date', 'Start Date');
        data2.addColumn('date', 'End Date');
        data2.addColumn('number', 'Duration');
        data2.addColumn('number', 'Percent Complete');
        data2.addColumn('string', 'Dependencies');

        data2.addRows([
          ['Research', 'Find sources',
          new Date(2015, 0, 1), new Date(2015, 0, 5), null,  100,  null],
          ['Write', 'Write paper',
          null, new Date(2015, 0, 9), daysToMilliseconds(3), 25, 'Research,Outline'],
          ['Cite', 'Create bibliography',
          null, new Date(2015, 0, 7), daysToMilliseconds(1), 20, 'Research'],
          ['Complete', 'Hand in paper',
          null, new Date(2015, 0, 10), daysToMilliseconds(1), 0, 'Cite,Write'],
          ['Outline', 'Outline paper',
          null, new Date(2015, 0, 6), daysToMilliseconds(1), 100, 'Research']
        ]);

        var options2 = {
          height: 275
        };

        var chart2 = new google.visualization.Gantt(document.getElementById('chart_div'));

        chart2.draw(data2, options2);
      }
      //END OF drawChart2()
      */

          
    </script>
  <!--END OF GOOGLE GANTT CHART-->
  </head>

  <body>
    
    <div class="right-content">
        <!--<div class="container" id="gantt_div"></div>-->
        <div class="container"></div>

          <h3 style = "color: #01B0F1;">Scanner -> System Releases Gantt</h3>
          <h3><img src="images/gantt.png" style="max-height: 35px;" />Releases Gantt Chart</h3>
          <!--<div id="chart_div"></div>-->
          <div id="gantt_div"></div>
        HELLO There2
        
          
          
          


        
    </div>
  </body>
</html>          

