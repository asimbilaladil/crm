<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Add Employee</li>
</ul>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
                
    <div class="row">
        <div class="col-md-12">
            
            <form class="form-horizontal" method="POST" action="<?php echo site_url('AddQuestionnaire/save') ?>">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Questionnaire</strong></h3>
                  
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

                <div class="form-group">
                    <label class="col-md-3 col-xs-3 control-label">Questionnaire Name:</label>
                    <div class="col-md-3 col-xs-3">                                            
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-info-circle"></span></span>
                            <input required=""  type="text" class="form-control" name="questionnaireName">
                        </div>
                    </div>
                   
                </div>

                <div id="questionnaireDiv">

                    <div id="questionnaire_1">
                        <br>
                        <div class="form-group">
                            <label class="col-md-3 col-xs-12 control-label"> Question 1 </label>
                            <div class="col-md-6 col-xs-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="fa fa-info-circle"></span></span>
                                    <input required="" id="question_1" type="text" class="form-control" name="question_1">
                                </div>
                                <div id="optionDiv_1" class="input-group checkbox">
                                    <br>
                                    <div class="col-md-8 col-xs-8">
                                        <h5>Select Type: <label> <input class="iradio" type="radio" name="questionOption_1" value="text" name="" checked> Text </label><label> <input class="iradio" type="radio" name="questionOption_1" value="multi" name="" > Multiple </label></h5>
                                    </div>
                                    <input type="button" class="btn btn-primary" value="Select Type" onclick="multiQuestionSubmit(1)"/>
                                </div>
                                <br>

                                <div class="col-md-12 col-xs-12" id="addMultiQuestion_1" style="display: none">
                                    <input type="button" class="btn btn-primary pull-right" value="Add option" onclick="multiQuestionSubmit(1)"/>
                                    <input type="hidden" id="numberOfMultiQuestions_1" name="numberOfMultiQuestions_1" />
                                </div> 

                                <div class="col-md-12 col-xs-12 input-group" id="multiQuestionsDiv_1">
                                </div>
                            </div>
                        </div>  
                    </div>

                </div>

                <input type="button" class="btn btn-primary pull-right" value="Add Qustion" onclick="addQuestion()"/>
                <input type="button" class="btn btn-primary pull-right" value="Delete Qustion" onclick="deleteQuestion()"/>

                </div>
                <div class="panel-footer">
                    
                    <button class="btn btn-primary pull-right">Submit</button>
                </div>
            </div>

            <input type="hidden" name="numberOfQuestions" id="numberOfQuestions" />

            </form>
            
        </div>
    </div>                    
                    
</div>
<!-- END PAGE CONTENT WRAPPER -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">

    
    $('#createQuest').click(function(){
        var numberOfQuestion = $('#numberOfQuestion').val();
        createQuest(numberOfQuestion);
        
    });

    var i = 1;

    function addQuestion() {
        var html = '';

        i = i + 1;

        html += '<div id="questionnaire_' + i + '">';
        html += '<br><div class="form-group">';
        html += '<label class="col-md-3 col-xs-12 control-label"> Question ' + i + '</label>';
        html += '<div class="col-md-6 col-xs-12">';
        html += '<div class="input-group">';
        html += '<span class="input-group-addon"><span class="fa fa-info-circle"></span></span>';
        html += '<input required="" id="question_' + i + '" type="text" class="form-control" name="question_' + i + '">';
        html += '</div>';

        //type selection div
        html += '<div id="optionDiv_'+ i +'" class="input-group checkbox">';
        html += '<br><div class="col-md-8 col-xs-8"><h5>Select Type: <label> <input class="iradio" type="radio" name="questionOption_'+ i +'" value="text" name="" checked> Text </label><label> <input class="iradio" type="radio" name="questionOption_'+ i +'" value="multi" name="" > Multiple </label></h5></div>';

        html += '<input type="button" class="btn btn-primary" value="Select Type" onclick="multiQuestionSubmit('+ i +')"/>';
        html += '</div>';

        //multi questions number div
        html += '</br> <div class="col-md-12 col-xs-12" id="addMultiQuestion_' + i + '" style="display: none">';
        html += '<input type="button" class="btn btn-primary pull-right" value="Add option" onclick="multiQuestionSubmit(' + i + ')"/>';
        html += '<input type="text" id="numberOfMultiQuestions_' + i + '" name="numberOfMultiQuestions_' + i + '" />';
        html += '</div>'; 

        //multi questions div. Create number of multiquestions in this div
        html += '<div class="col-md-12 col-xs-12 input-group" id="multiQuestionsDiv_'+ i +'">';
        html += '</div>';

        html += '</div> </div> </div>';

        $('#questionnaireDiv').append(html);

        $('#numberOfQuestions').val(i);

    }

    function deleteQuestion() {

        $('#questionnaire_' + i).remove();
        i = i - 1;
    }

    function multiQuestionSubmit(id) {

        var type = $('input[name="questionOption_'+ id +'"]:checked').val();
        $('#optionDiv_' + id).hide();

        if (type == 'multi') {
            $('#addMultiQuestion_' + id).show();
            $('#multiQuestionsDiv_' + id).show();
            createMultiOption(id);
        }

    }

    
    function createMultiOption(id) {
        //var html = '<h5>Multiple Choice:</h5><br>';

        var j = parseInt( ( $('#numberOfMultiQuestions_' + id).val() ? $('#numberOfMultiQuestions_' + id).val() : 1 ) );

        var html = '';
        html += '<div class="form-group col-md-12 col-xs-12">';
        html += '<label class="col-md-3 col-xs-12 control-label"> Option' + j + ': </label>';
        html += '<div class="col-md-6 col-xs-12">';
        html += '<div class="input-group">';
        html += '<span class="input-group-addon"><span class="fa fa-info-circle"></span></span>';
        html += '<input required="" id="multiQuestion_' + id + '' + j + '" type="text" class="form-control" name="multiQuestion_' + id + '' + j + '">';
        html += '</div> </div> </div>';
        $('#multiQuestionsDiv_' + id).append(html);

        $('#numberOfMultiQuestions_' + id).val( j );

        j = j + 1;
        return html;
    }

</script>