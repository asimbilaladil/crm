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
                                             <p> <?php echo $data['clients'][0]->firstname; ?> </p>                                     
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Initial</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                               <p> <?php echo $data['clients'][0]->initial; ?> </p>                                   

                                        </div>
                                    </div>


                                   <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Last Name</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <p> <?php echo $data['clients'][0]->lastname; ?> </p>
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Gender</label>
                                        <div class="col-md-6 col-xs-12">
                                            <p> <?php echo $data['clients'][0]->gender; ?> </p>
                                        </div>
                                    </div>

                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Email</label>
                                        <div class="col-md-6 col-xs-12">     
                                            <p> <?php echo $data['clients'][0]->email; ?> </p>
                                        </div>
                                    </div>                                    
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Phone</label>
                                        <div class="col-md-6 col-xs-12">
                                            <p> <?php echo $data['clients'][0]->phone; ?> </p>   
                                        </div>
                                    </div>


                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Address</label>
                                        <div class="col-md-6 col-xs-12">
                                            <p> <?php echo $data['clients'][0]->address; ?> </p>    
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Service</label>
                                        <div class="col-md-6 col-xs-12">
                                            <p> <?php echo $data['clients'][0]->service; ?> </p> 
                                        </div>
                                    </div>
                           
                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Status</label>
                                        <div class="col-md-6 col-xs-12">
                                            <p> <?php echo $data['clients'][0]->Status; ?> </p>          
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
