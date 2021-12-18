
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Education Distribution'],
          ['University', {{ isset($response) ? $response->bachelor_s_degree+$response->master_s_degree+$response->earned_doctorate+$response->high_school_diploma_or_equivalent+$response->medical_degree+$response->university_certificate_below_bachelor_s_level+$response->university_certificate_or_diploma_above_bachelor_level : 0 }} ],
          ['College Certificate / Diploma', {{ isset($response) ? $response->college_certificate_or_diploma : 0 }} ],
          ['Trades', {{ isset($response) ? $response->trades_certificate : 0 }} ],
          ['other', {{ isset($response) ? $response->no_certificate_diploma_or_degree +  $response->registered_apprenticeship_certificate : 0 }} ]
        ]);
        var options = {
            //height:document.getElementById('edulist').offsetWidth,
            /*height:180,*/
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
