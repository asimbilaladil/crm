<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Clients</li>
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
                            <a href="<?php echo site_url("AddClient") ?>">
                                <button type="button" class="btn btn-default">Add Client</button> 
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
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php  foreach ($data['clients'] as $key => $item) { ?>
                                 <tr>
                                    <td>
                                        <a href= ' <?php echo site_url("Clients/view?token=".$item->token) ?>'>  <?php echo $item->firstname;  ?>  </a>
                                    </td>
                                    <td>
                                        <a href= ' <?php echo site_url("Clients/view?token=".$item->token) ?>'>  <?php echo $item->lastname;  ?>  </a>
                                    </td>
                                    <td>
                                        <a href= ' <?php echo site_url("Clients/view?token=".$item->token) ?>'>  <?php echo $item->email;  ?>  </a>
                                    </td>
                                    <td> 
                                        <a href= '<?php echo site_url("Clients/edit?token=".$item->token) ?>' >  Edit  </a>
                                        <a onclick="return confirm('Delete', 'Are you sure you want to delete?')" href= '<?php echo site_url("Clients/delete?token=".$item->token) ?>'>  Delete  </a>
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
