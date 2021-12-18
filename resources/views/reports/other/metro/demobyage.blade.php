<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Age Distribution'],
          ['0-9',  {{ isset($response) ? $response->_0_4 +$response->_5_9 : 0 }}],
          ['10-19', {{ isset($response) ? $response->_10_14+ $response->_15_19 : 0 }}] ,
          ['20-34', {{ isset($response) ? $response->_20_24 + $response->_25_29 + $response->_30_34 : 0 }}] ,
          ['35-50', {{ isset($response) ? $response->_35_39  + $response->_40_44 + $response->_45_49 : 0 }}] ,
          ['50-54', {{ isset($response) ? $response->_50_54 : 0 }}] ,
          ['55-64', {{ isset($response) ? $response->_55_59+$response->_60_64 : 0 }}],
          ['65-69', {{ isset($response) ? $response->_65_69 : 0 }}],
          ['70+',   {{ isset($response) ? $response->_70_74 + $response->_75_79 + $response->_80_84 + $response->_85 : 0 }}]
        ]);

        var options = {
          //height:document.getElementById('agedist').offsetWidth,
          /*height:180,*/
          //width:document.getElementById('agedist').offsetWidth,
          //width:300,
         legend:{position:'top',maxLines:7}
          
        };

        var chart = new google.visualization.PieChart(document.getElementById('agedist'));

        chart.draw(data, options);
      }

</script>
<div id="agedist" ></div>

