<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Attempt Questionnaire</li>
</ul>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
                
    <div class="row">
        <div class="col-md-12">
            
            <form class="form-horizontal" method="POST" action="<?php echo site_url('QuestionnaireAttempt/save') ?>" >
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


                    <input type="hidden" name="questionnaireId" value="<?php echo $data['questionnaireId'] ?>" />

                    <?php
                        $count = 0;
                        foreach ($data['questions'] as $question) {

                        $count = $count + 1;
                        echo '<br><div class="form-group">
                                <label class="col-md-3 col-xs-12 control-label"> Question '. $count .': </label>
                                <div class="col-md-6 col-xs-12">
                                    <div class="input-group">
                                         <h4 style="padding-top: 7px;"  class="col-md-12 col-xs-12" >  '. $question['question'] .' </h4>
                                         <input type="hidden" name="questionId_'. $count .'" value="'. $question['question_id'] .'" />
                                         <input type="hidden" name="totalQuestions" value="'. $count .'" />
                                         <input type="hidden" name="questionType_'. $count .'" value="'. $question['type'] .'" />
                                    </div>
                                </div>

                            </div>';

                            //multi selection 
                            if ($question['type'] == 'multi') {
                                foreach ($question['multiQuestions'] as $item) {

                                    echo ' <div class="col-md-3 col-xs-3"></div><div style="margin-left: 15px;" class="form-group col-md-9 col-xs-9"> <input class="iradio" type="radio" name="answer_'. $count .'" value="'. $item .'"> &nbsp;&nbsp;'. $item .' </input> </div>';

                                }
                            //text
                            } else {

                                echo '<div class="col-md-3 col-xs-3"></div><div style="margin-left: 15px;" class="form-group col-md-6 col-xs-12"> <input  style="width: 50%;" type="text" name="answer_'. $count .'" /></div>';

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
 
