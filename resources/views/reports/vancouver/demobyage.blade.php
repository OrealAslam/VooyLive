<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Age Distribution'],
          ['0-9', {{ $response->age_0_9 }} ],
          ['10-19', {{ $response->age_10_19 }} ] ,
          ['20-34', {{ $response->age_20_34 }} ] ,
          ['35-49', {{ $response->age_35_49 }} ],
          ['50-54', {{ $response->age_50_54 }} ] ,
          ['55-64', {{ $response->age_55_64 }} ] ,
          ['65-over', {{ $response->age_65_over }} ] ,
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

