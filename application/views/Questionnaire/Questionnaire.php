<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Add Questionnaire</li>
</ul>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" method="POST" action="<?php echo site_url('Questionnaire/save') ?>">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><strong>Create Questionnaire</strong></h3>
                                  
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
                                        <label class="col-md-3 col-xs-12 control-label">Number of Questions</label>
                                        <div class="col-md-6 col-xs-12">                                            
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-info-circle"></span></span>
                                                <input required="" id="numberOfQuestion" type="number" class="form-control" name="numberOfQuestions">
                                            </div>
                                        </div>
                                        <div class="col-md-3 col-xs-12 ">
                                             <input type="button" class="btn btn-primary" id="createQuest" value="Create" />
                                        </div>
                                    </div>

                                   

                                    <div id="questionnaireDiv">

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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">

    
    $('#createQuest').click(function(){
        var numberOfQuestion = $('#numberOfQuestion').val();
        createQuest(numberOfQuestion);
        
    });

    function createQuest(numberOfQuestion) {

        var html = '';

        for(var i=1; i<=numberOfQuestion; i++) {

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

            html += '<input type="button" class="btn btn-primary" value="Select Type" onclick="optionChange('+ i +')"/>';
            html += '</div>';

            //multi questions number div
            html += '<br> <div class="col-md-12 col-xs-12" id="numberOfMultiDiv_'+ i +'" style="display: none">';
            html += '<div class="col-md-4 col-xs-4" > <h5> Number of options: </h5></div><div class="col-md-4 col-xs-4">  <input id="numberOfMultiQuestions_'+ i +'" name="numberOfMultiQuestions_'+ i +'" class="form-control" type="number" /> </div> ';
            html += '<input type="button" class="btn btn-primary" value="Create options" onclick="multiQuestionSubmit('+ i +')"/>';
            html += '</div> ';

            //multi questions div. Create number of multiquestions in this div
            html += '<div class="col-md-12 col-xs-12 input-group" id="multiQuestionsDiv_'+ i +'">';
            html += '</div>';

            html += '</div> </div>';
        }

        $('#questionnaireDiv').html(html);

    }
    
    function optionChange(id) {

        var type = $('input[name="questionOption_'+ id +'"]:checked').val();

        $('#optionDiv_' + id).hide();

        if (type == 'multi') {
            $('#numberOfMultiDiv_' + id).show();
            createMultiOption();
        }
        
    }

    function multiQuestionSubmit(id) {
        var multiQuestions = $('#numberOfMultiQuestions_' + id).val();

        if (multiQuestions) {
            $('#numberOfMultiDiv_' + id).hide();
            $('#multiQuestionsDiv_' + id).show();
            var html = createMultiOption(multiQuestions);
            $('#multiQuestionsDiv_' + id).html(html);
        }

    }

    function createMultiOption(questions) {
        var html = '<h5>Multiple Choice:</h5><br>';

        for(var i=1; i<=questions; i++) {

            html += '<div class="form-group col-md-12 col-xs-12">';
            html += '<label class="col-md-3 col-xs-12 control-label"> Option' + i + ': </label>';
            html += '<div class="col-md-6 col-xs-12">';
            html += '<div class="input-group">';
            html += '<span class="input-group-addon"><span class="fa fa-info-circle"></span></span>';
            html += '<input required="" id="multiQuestion_' + i + '" type="text" class="form-control" name="multiQuestion_' + i + '">';
            html += '</div> </div> </div>';
        }

        return html;
    }

</script>