<script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Age Distribution'],
          ['0-9',  {{ $response['zero_to_nine'] }}],
          ['10-19', {{ $response['ten_to_nineteen'] }}],
          ['20-34', {{ $response['twenty_to_thirtyfour'] }}] ,
          ['35-49', {{ $response['thirtyfive_to_fortynine'] }}] ,
          ['50-54', {{ $response['fifty_to_fiftyfour'] }}] ,
          ['55-64', {{ $response['fiftyfive_to_sixtyfour'] }}],
          ['65-69', {{ $response['sixtyfive_to_sixtynine'] }}],
          ['70+',   {{ $response['seventy_plus'] }}]
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

