
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Education Distribution'],
          ['University', {{ $response['university'] }} ],
          ['College Certificate / Diploma', {{ $response['college_certificate_diploma'] }} ],
          ['Apprenticeship or Trades', {{ $response['apprenticeship_or_trades'] }} ],
          ['Other', {{ $response['other'] }} ],
          ['High School', {{ $response['high_school'] }} ],
        ]);
        var options = {
            //height:document.getElementById('edulist').offsetWidth,
            height:300,
            pieSliceText:'percentage',
            //width:document.getElementById('edulist').offsetWidth,
            width:300,
            legend:{position:'top',maxLines:5}
          
        }

        var chart = new google.visualization.PieChart(document.getElementById('edulist'));

        chart.draw(data, options);
      }
    </script>

  <div id="edulist"></div>
