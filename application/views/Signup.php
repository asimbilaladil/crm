
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>Atlant - Responsive Bootstrap Admin Template</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="<?php echo base_url('assets/css/theme-default.css') ?>"/>
        <!-- EOF CSS INCLUDE -->                                      
    </head>
    <body>
         
                 <div class="login-container">
        
            <div class="login-box animated fadeInDown">
                <div class="login-logo"></div>
                <div class="login-body">
  <div class="login-title"><strong>Registration</strong>, use form below</div>
           
                    <?php if($this->session->flashdata('signupFail')) { ?>
                        <div class="alert alert-danger">
                          <strong> <?php echo $this->session->flashdata('signupFail') ?> </strong> 
                        </div>
                    <?php } ?>

                    <form action="<?php echo site_url('Signup/save') ?>" class="form-horizontal" method="post">
                        
                    <h4 class="login-subtitle">Personal info</h4>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="firstname" placeholder="First Name"/>
                        </div>
                    </div>
                        <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="lastname" placeholder="Last Name"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" name="companyname" placeholder="Company Name"/>
                        </div>
                    </div>
                    
                    <h4 class="login-subtitle">Authentication</h4>                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="email" class="form-control" name="email" placeholder="Email"/>
                        </div>
                    </div>                        
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="password" placeholder="Password"/>
                        </div>
                    </div>                    
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" name="confirmpassword" placeholder="Re-Password"/>
                        </div>
                    </div>             
                    
                    <div class="form-group push-up-30">
                        <div class="col-md-6">
                            <a href="<?php echo site_url('Login') ?>" class="btn btn-link btn-block">Already have account?</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-danger btn-block">Sign Up</button>
                        </div>
                    </div>
                    </form>


                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2016 AppName
                    </div>
                   
                </div>
            </div>
            
        </div>
            

       
  
    </body>
</html>






