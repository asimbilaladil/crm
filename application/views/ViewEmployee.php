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
                    <div class="col-md-12 col-sm-12 col-xs-12">
                            
                            <form action="#" class="form-horizontal">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    <h3><span class="fa fa-pencil"></span> Profile</h3>
                                    <p>This information lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer faucibus, est quis molestie tincidunt, elit arcu faucibus erat.</p>
                                </div>
                                <div class="panel-body form-group-separated">
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">First Name</label>
                                        <div class="col-md-6 col-xs-12">    
                                            <p> <?php echo $data['employee'][0]->firstname; ?> </p>
                                        </div>
                                    </div>
                                   <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Last Name</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <p> <?php echo $data['employee'][0]->lastname; ?> </p>                  
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Email</label>
                                        <div class="col-md-6 col-xs-12">         
                                            <p> <?php echo $data['employee'][0]->email; ?> </p>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Permissions</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <p> <?php echo $data['employee'][0]->firstname; ?> </p>

                                        </div>
                                    </div>  
                                      

                                </div>
                            </div>
                            </form>
              

                        </div>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->
        </div>
    </div>
</div>
<!-- END PAGE CONTENT WRAPPER -->
