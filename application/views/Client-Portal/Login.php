
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


                    <?php if($this->session->flashdata('loginFail')) { ?>
                        <div class="alert alert-danger">
                          <strong> <?php echo $this->session->flashdata('loginFail') ?> </strong> 
                        </div>
                    <?php } ?>


                    <?php if($this->session->flashdata('signupSuccess')) { ?>
                        <div class="alert alert-success">
                          <strong> <?php echo $this->session->flashdata('signupSuccess') ?> </strong> 
                        </div>
                    <?php } ?>                    

                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    <form action="<?php echo base_url('Client-Portal/Login/authenticate') ?>" class="form-horizontal" method="post">
                    <input type="hidden" name="id" value="<?php echo $this->uri->segment(3); ?>">
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="email" name="email" class="form-control" placeholder="Email"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" name="password" class="form-control" placeholder="Password"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6">
                            <a href="#" class="btn btn-link btn-block">Forgot your password?</a>
                        </div>
                        <div class="col-md-6">
                            <button class="btn btn-info btn-block">Log In</button>
                        </div>
                    </div>
                    <div class="login-subtitle">
                        Don't have an account yet? <a href="<?php echo site_url('Signup') ?>">Create an account</a>
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






