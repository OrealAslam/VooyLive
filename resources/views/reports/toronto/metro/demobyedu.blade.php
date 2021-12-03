
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
            ['Task', 'Education Distribution'],
            ['University', {{ (isset($response) && isset($response->edu_university)) ? $response->edu_university : 0 }} ],
            ['College Certificate / Diploma', {{ (isset($response) && isset($response->edu_college_certificate_diploma)) ? $response->edu_college_certificate_diploma : 0 }} ] ,
            ['Trades',  {{ (isset($response) && isset($response->edu_trades)) ? $response->edu_trades : 0 }} ],
            ['Other', {{ (isset($response) && isset($response->edu_other)) ? $response->edu_other : 0 }} ],
            ['High School', {{ (isset($response) && isset($response->edu_high_school)) ? $response->edu_high_school : 0 }} ],
        ]);
        var options = {
            //height:document.getElementById('edulist').offsetWidth,
            //height:180,
            pieSliceText:'percentage',
            //width:document.getElementById('edulist').offsetWidth,
            //width:250,
            legend:{position:'top',maxLines:5}
          
        }

        var chart = new google.visualization.PieChart(document.getElementById('edulist'));

        chart.draw(data, options);
      }
    </script>

  <div id="edulist"></div>
