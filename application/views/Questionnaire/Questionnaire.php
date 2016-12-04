<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Questionnaire</li>
</ul>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
    <div class="row">
        <div class="col-md-12">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="dataTables_length" id="DataTables_Table_0_length">

                                <button id="publishButton" onclick="showHideTable()" type="button" class="btn btn-default">Publish Survey</button>
                                <button id="unpublishButton" onclick="showHideTable()" type="button" class="btn btn-default">Unpublish Survey</button> 

                               <a href="<?php echo site_url("AddQuestionnaire") ?>">
                                <button type="button" class="btn btn-default">Add Survey</button> 
                            </a>
                        </div>

                        <div id="DataTables_Table_0_filter" class="dataTables_filter">
                            <label>Search:
                                <input type="search" id="searchTerm" onkeyup="doSearch()" placeholder="" >
                            </label>

                        </div>

                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody id="unpublishTbody">
                            <?php  foreach ($data['Questionnaire'] as $key => $item) { ?>
                                <tr>
                                    <td>
                                          <?php echo $key+1;  ?>  
                                    </td>
                                    <td>
                                        <?php echo $item->name;  ?>  
                                    </td>
                                    <td style="width: 10%;">

                                        <button onclick="setId(<?php echo $item->id;  ?>,'<?php echo $item->name;  ?>' )" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-default">Publish
                                        </button> 

                                    </td>
                                </tr>
                            <?php } ?>   
                            </tbody>


                            <tbody id="publishTbody">
                            <?php  foreach ($data['PublishSurvey'] as $key => $item) { ?>
                                <tr>
                                    <td>
                                          <?php echo $key+1;  ?>  
                                    </td>
                                    <td>
                                        <?php echo $item->name;  ?>  
                                    </td>
                                    <td style="width: 10%;">

                                      <a href="<?php echo site_url("survey/unpublish/".$item->id); ?>">  <button   type="button" class="btn btn-default">Unpublish
                                        </button> </a> 

                                    </td>
                                </tr>
                            <?php } ?>   
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->
        </div>
    </div>
</div>
<!-- END PAGE CONTENT WRAPPER -->


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" id="modal-title"></h4>
      </div>
      <div class="row">
        <div class="col-md-12">
        <form action="<?php echo site_url("Questionnaire/publish") ?>" method="post">
        <input type="hidden" name="questionnaire_id" id="questionnaire_id">
            <br>
            <div class="form-group col-xs-12">
                <label class="col-md-3 col-xs-12 control-label">Disable Expire</label>
                <div class="col-md-6 col-xs-12">                                            
                    <div class="input-group" >
                      <input onchange="disableExpire()" type="checkbox" id="disable_expire" name="disable_expire" value="0"> Yes<br>
                    </div>                                            

                </div>
           
            </div>
            <br>
            <div class="form-group col-xs-12" id="expire_date_div">
                <label class="col-md-3 col-xs-12 control-label">Expire Date</label>
                <div class="col-md-6 col-xs-12">                                            
                    <div class="input-group" id="datetimepicker">
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                        <input required="" type="date" name="expire_date"  id="expire_date" class="form-control" >
                    </div>                                            

                </div>
           
            </div>
            <br>



            <div class="form-group col-xs-12">
                <label class="col-md-3 col-xs-12 control-label">Type</label>
                <div class="col-md-6 col-xs-12">                                            
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                        <select name="type"  class="form-control" >
                        <option value="public">Public</option>
                        <option value="private">Private</option>
                        </select> 
                    </div>                                            

                </div>
               
            </div>
       

    
      </div>

      </div>
       <br>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-default" >Save</button>
      </div>
      </form>
    </div>

  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">

    $("#publishTbody").hide();
    $("#unpublishButton").hide();
    var flag = false;
    var setId = function setId(id,name) {
       $('#questionnaire_id').val(id);
       var title = "Publish "+ name +" Questionnaire";
        $('#modal-title').html(title);
    }
 
    /*
    * Name: disableExpire
    * Description: Enable or disable expire date and show and hide expire date div 
    */
    var disableExpire = function disableExpire() {

        if($("#disable_expire").is(':checked')){
            $("#expire_date_div").hide();
            $('#expire_date').val("2099-12-30");

        } else {
            $("#expire_date_div").show();
            $('#expire_date').val("");
        }
    }

    /*
    * Name: showHideTable
    * Description: SHow and hide publish and unpublish table body
    */
    var showHideTable = function showHideTable() {

        if(flag){
            flag = false;
            $("#unpublishTbody").hide();
            $("#publishTbody").show();
            $("#unpublishButton").show();
            $("#publishButton").hide();

        } else {
            flag = true;
            $("#unpublishTbody").show();
            $("#publishTbody").hide();
            $("#unpublishButton").hide();
            $("#publishButton").show();
            
        }
    }

</script>
