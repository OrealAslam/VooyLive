<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Age Distribution'],
          ['0-14', {{ (isset($response) && isset($response->age_0_14)) ? $response->age_0_14 : 0 }} ],
          ['15-24', {{ (isset($response) && isset($response->age_15_24)) ? $response->age_15_24 : 0 }} ] ,
          ['25-54', {{ (isset($response) && isset($response->age_25_54)) ? $response->age_25_54 : 0 }} ] ,
          ['55-64', {{ (isset($response) && isset($response->age_55_64)) ? $response->age_55_64 : 0 }} ],
          ['65-84', {{ (isset($response) && isset($response->age_65_84)) ? $response->age_65_84 : 0 }} ] ,
          ['85-over', {{ (isset($response) && isset($response->age_85_over)) ? $response->age_85_over : 0 }}] ,
        ]);

        var options = {
          //height:document.getElementById('agedist').offsetWidth,
          height:300,
          //width:document.getElementById('agedist').offsetWidth,
          width:300,
         legend:{position:'top',maxLines:7}
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('agedist'));

        chart.draw(data, options);
      }

</script>
<div id="agedist" ></div>

