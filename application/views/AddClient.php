<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Add Employee</li>
</ul>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="POST" action="<?php echo site_url('AddClient/save') ?>">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Add</strong> Client</h3>
                                  
                                </div>
                                <div class="panel-body">
                                    <p> Add your company employee </p>
                                </div>
                                <div class="panel-body"> 

                                    <?php if($this->session->flashdata('ClientSuccess')) { ?>                            
                                        <div class="alert alert-success">
                                          <strong><?php echo $this->session->flashdata('ClientSuccess') ?></strong>
                                        </div>
                                    <?php } ?>

                                    <?php if($this->session->flashdata('ClientFail')) { ?>                            
                                        <div class="alert alert-danger">
                                          <strong><?php echo $this->session->flashdata('ClientFail') ?></strong>
                                        </div>
                                    <?php } ?>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">First Name</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input required="" type="text" class="form-control" name="firstName">
                                            </div>                                            

                                        </div>
                                    </div>
                                   <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Last Name</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input required="" type="text" class="form-control" name="lastName">
                                            </div>                                            

                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Email</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-envelope-o"></span></span>
                                                <input required="" type="email" class="form-control" name="email">
                                            </div>            

                                        </div>
                                    </div>                                    
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Phone</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input required="" type="text" class="form-control" name="phone">
                                            </div>            
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Country</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input required="" type="text" class="form-control" name="country">
                                            </div>            
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">State</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input required="" type="text" class="form-control" name="state">
                                            </div>            
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">City</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input required="" type="text" class="form-control" name="city">
                                            </div>            
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Address</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input required="" type="text" class="form-control" name="address">
                                            </div>            
                                        </div>
                                    </div>
                           
                                </div>
                                <div class="panel-footer">
                                    
                                    <button class="btn btn-primary pull-right">Submit</button>
                                </div>
                            </div>
                            </form>
                            
                        </div>
                    </div>                    
                    
</div>
<!-- END PAGE CONTENT WRAPPER -->