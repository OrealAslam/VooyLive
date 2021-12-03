
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Education Distribution'],
          ['University', {{ $response->edu_university }} ],
          ['College Certificate / Diploma', {{ $response->edu_college_certificate_diploma }} ] ,
          ['Trades', {{ $response->edu_trades }} ],
          ['Other', {{ $response->edu_other }} ],
          ['High School', {{ $response->edu_high_school  }} ],
          
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
