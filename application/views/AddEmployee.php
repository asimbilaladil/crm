<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Add Employee</li>
</ul>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="POST" action="<?php echo site_url('AddEmployee/save') ?>">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Add</strong> Employee</h3>
                                  
                                </div>
                                <div class="panel-body">
                                    <p> Add your company employee </p>
                                </div>
                                <div class="panel-body"> 
                                    <?php if( isset( $_SESSION['error'] ) && $_SESSION['error'] == 1 ) {  ?>      
                                     <div class="col-md-3">
                                     </div>                                                               
                                    <div style="width:50%" class=" alert alert-danger" role="alert">
                           
                                    <strong>Sorry!</strong> Email address already exists.
                                    </div>
                                    <br> <br> <br> <br>
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
                                        <label class="col-md-3 col-xs-12 control-label">Password</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                <input required="" type="password" class="form-control" name="password">
                                            </div>            
                                        </div>
                                    </div>
                                <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Update Password</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="checkbox">
                                                <label><input type="checkbox" value="1">Ask User to change password</label>
                                            </div>
                                        </div>
                                </div>
                                <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Permissions</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="checkbox">
                                                <label> <input type="checkbox" value="1" name="add">Add </label> &nbsp;    
                                                <label> <input type="checkbox" value="1" name="update"> Update </label> &nbsp;   
                                                <label> <input type="checkbox" value="1" name="delete"> Delete </label>&nbsp;  
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