<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Add Employee</li>
</ul>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                        <?php if($this->session->flashdata('ServiceSuccess')) { ?>                            
                            <div class="alert alert-success">
                              <strong><?php echo $this->session->flashdata('ServiceSuccess') ?></strong>
                            </div>
                        <?php } ?>

                        <?php if($this->session->flashdata('ServiceFail')) { ?>                            
                            <div class="alert alert-danger">
                              <strong><?php echo $this->session->flashdata('ServiceFail') ?></strong>
                            </div>
                        <?php } ?>

                            <form class="form-horizontal" method="POST" action="<?php echo site_url('AddService/save') ?>">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Add</strong> Service</h3>
                                  
                                </div>
                                <div class="panel-body">
                                    <p> Add Services </p>
                                </div>
                                <div class="panel-body"> 

                                    <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Service Name</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input required="" type="text" class="form-control" name="serviceName">
                                            </div>                                            

                                        </div>
                                    </div>
                                   <div class="form-group">
                                        <label class="col-md-3 col-xs-12 control-label">Rate</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-user"></span></span>
                                                <input required="" type="number" class="form-control" name="rate">
                                            </div>                                            

                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Type</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-envelope-o"></span></span>
                                                <select onchange="typeChange(this)" class="form-control select" name="type">
                                                    <option value="ONE_TIME">One Time</option>
                                                    <option value="MULTIPLE_TIME">Multiple Time</option>
                                                </select>
                                            </div>            

                                        </div>
                                    </div>                                    
                                    <div style="display:none" id="intervalDiv" class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Occurrence</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                <input type="number" class="form-control" name="occurrence">
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

<script>

function typeChange(sel) {

    var intervalId = document.getElementById("intervalDiv");

    if (sel.value == 'MULTIPLE_TIME') {
        intervalId.style.display = '';
    } else {
        intervalId.style.display = 'none';
    }
    
}

</script>
