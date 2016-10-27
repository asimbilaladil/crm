<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Attempt Questionnaire</li>
</ul>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
                
    <div class="row">
        <div class="col-md-12">
            
            <form class="form-horizontal" method="POST" action="">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Attempt Questionnaire</strong></h3>
                  
                </div>

                <div class="panel-body"> 

                    <?php if($this->session->flashdata('UserSuccess')) { ?>                            
                        <div class="alert alert-success">
                          <strong><?php echo $this->session->flashdata('UserSuccess') ?></strong>
                        </div>
                    <?php } ?>

                    <?php if($this->session->flashdata('UserFail')) { ?>                            
                        <div class="alert alert-danger">
                          <strong><?php echo $this->session->flashdata('UserFail') ?></strong>
                        </div>
                    <?php } ?>

                    <?php
                        $count = 1;
                        foreach ($data['questions'] as $question) {
                            
                        echo '<div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label"> Question '. $count++ .' </label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                        <span> '. $question['question'] .' </span>
                                    </div>
                                </div>
                            </div>';

                            //multi selection 
                            if ($question['type'] == 'multi') {
                                foreach ($question['multiQuestions'] as $item) {
                                    echo '<div> <input class="icheckbox" type="checkbox" name="question_'. $question['question_id'] .'" value="'. $item .'"> '. $item .' </input> </div>';
                                }

                            //text
                            } else {
                                echo '<div> <input type="text" name="question_'. $question['question_id'] .'" /> </div>';
                            }
                        }

                    ?>

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
