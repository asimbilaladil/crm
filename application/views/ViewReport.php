<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Survey</li>
</ul>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive" id="graphs">

                
                    </div>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->
        </div>
    </div>
</div>
<!-- END PAGE CONTENT WRAPPER -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">
    google.charts.load("current", {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
    
    var reportData = <?php  echo json_encode($data); ?>;

    var questionsArray = [];
    var answersArray = [];

    for (item in reportData) {

      var question = reportData[item][0];
      var count = reportData[item][1];
      var answer = reportData[item][2];

      //if key does not exist in question array.
      if (questionsArray.indexOf(question) <= 0) {
        questionsArray.push(question);
        answersArray[question] = [];
      }

      answersArray[question].push([
        answer,
        count
      ]);
    }

    makeHtml(questionsArray);
    makeGraphs(questionsArray, answersArray);


  }

  function makeGraphs(questionsArray, answersArray) {

    var header = [
      'answer',
      'count'
    ];

    for (x in questionsArray) {
      var key = questionsArray[x];
      answersArray[key].unshift(header);

      var key = questionsArray[x];
      
      var divId = key.replace(' ', '_');

      var data = google.visualization.arrayToDataTable(answersArray[key]);
      var view = new google.visualization.DataView(data);

      view.setColumns([0, 1,
                      { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" 
                      }]);

      var options = {
        width: 600,
        height: 400,
        bar: {groupWidth: "95%"},
        legend: { position: "none" },
      };

      var chart = new google.visualization.ColumnChart(document.getElementById(divId));
      chart.draw(view, options);

    }

  }

  function makeHtml(questionsArray) {

    var div = document.getElementById('graphs');
    var html = '';

    for(key in questionsArray) {

      var key = questionsArray[key];
      var divId = key.replace(' ', '_');

      html = html + '<h2> '+ key +' </h2><div id="' + divId + '" style="width: 300px; height: 600px;"></div>  </div>';
    }

    div.innerHTML = html;

  }

  </script>

