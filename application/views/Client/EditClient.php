<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Edit Employee</li>
</ul>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="POST" action="<?php echo site_url('Clients/update') ?>">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Edit Client </strong></h3>
                                  
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
                                                <input required="" type="text" value="<?php echo $data['client']->firstname ?>" class="form-control" name="firstName">
                                            </div>                                            

                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Initial</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input required="" type="text" value="<?php echo $data['client']->initial ?>" class="form-control" name="initial">
                                            </div>                                            

                                        </div>
                                    </div>


                                   <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Last Name</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input required="" type="text"  value="<?php echo $data['client']->lastname ?>" class="form-control" name="lastName">
                                            </div>                                            

                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Gender</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                              <input type="radio" name="gender" name="gender" <?php echo $data['client']->gender == 'male' ? 'checked' : '' ?> value="male" required> Male<br>
                                              <input type="radio" name="gender" name="gender" <?php echo $data['client']->gender == 'female' ? 'checked' : '' ?> value="female" required> Female<br>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Email</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-envelope-o"></span></span>
                                                <input required="" type="email" value="<?php echo $data['client']->email ?>" class="form-control" name="email">
                                            </div>            

                                        </div>
                                    </div>                                    
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Phone</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input required="" type="text" value="<?php echo $data['client']->phone ?>" class="form-control" name="phone">
                                            </div>            
                                        </div>
                                    </div>


                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Address</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input required="" type="text" class="form-control" value="<?php echo $data['client']->address ?>" name="address">
                                            </div>            
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Service</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <select class="form-control" name="service" required>
                                                    <option <?php echo ($data['client']->service == 'service1' ? 'selected' : '') ?> value="service1"> Service 1 </option>
                                                    <option <?php echo ($data['client']->service == 'service2' ? 'selected' : '') ?> value="service2"> Service 2 </option>
                                                    <option <?php echo ($data['client']->service == 'service3' ? 'selected' : '') ?> value="service3"> Service 3 </option>
                                                </select>
                                            </div>            
                                        </div>
                                    </div>
                           
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Status</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <select class="form-control" name="status" required>
                                                    <option <?php echo ($data['client']->status == 'active' ? 'selected' : '') ?> value="active"> Active </option>
                                                    <option <?php echo ($data['client']->status == 'disabled' ? 'selected' : '') ?> value="disabled"> Disabled </option>
                                                    <option <?php echo ($data['client']->status == 'lead' ? 'selected' : '') ?> value="lead"> Lead </option>
                                                </select>                                                
                                            </div>            
                                        </div>
                                    </div>

                                    <input type="hidden" value="<?php echo $data['client']->token ?>" name="token" />

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