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
                    <div class="table-responsive">
                     
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
                            <tbody>
                            <?php  foreach ($data['Questionnaire'] as $key => $item) { ?>
                                <tr>
                                    <td>
                                          <?php echo $key+1;  ?>  
                                    </td>
                                    <td>
                                        <?php echo $item->name;  ?>  
                                    </td>
                                    <td style="width: 10%;">

                                       <a href="<?php echo site_url('client/questionnaire/'.$item->token) ?>"> <button  type="button" class="btn btn-default">View
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

