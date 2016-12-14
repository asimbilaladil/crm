<ul class="breadcrumb">
    <li><a href="#">Home</a></li>
    <li class="active">Add Survey</li>
</ul>
<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">
                
    <div class="row">
        <div class="col-md-12">
            
            <form class="form-horizontal" method="POST" action="<?php echo site_url('AddQuestionnaire/save') ?>">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Survey</strong></h3>
                  
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
                    <label class="col-md-3 col-xs-3 control-label">Survey Name:</label>
                    <div class="col-md-3 col-xs-3">                                            
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-info-circle"></span></span>
                            <input required=""  type="text" class="form-control" name="questionnaireName">
                        </div>
                    </div>
                   
                </div>

                <!-- Dynamic append questions in this div -->
                <div id="questionnaireDiv">

                </div>

                <input type="button" class="btn btn-primary pull-right" value="Add Question" onclick="addQuestion()"/>
                <input style="display: none;" type="button" class="btn btn-primary pull-right" value="Delete Qustion" onclick="deleteQuestion()"/>

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

    var i = 0;

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
        html += '<br><div class="col-md-8 col-xs-8"><h5>Select Type: <label> <input class="iradio" onchange="multiQuestionSubmit('+ i +')" type="radio" name="questionOption_'+ i +'" value="numeric" name="" > Numeric </label> <label> <input class="iradio" onchange="multiQuestionSubmit('+ i +')" type="radio" name="questionOption_'+ i +'" value="text" name="" > Text </label><label> <input class="iradio" onchange="multiQuestionSubmit('+ i +')" type="radio" name="questionOption_'+ i +'" value="multi" name="" > Multiple </label> </h5></div>';

        
        html += '</div>';

        //multi questions number div
        html += '</br> <div class="col-md-12 col-xs-12" id="addMultiQuestion_' + i + '" style="display: none">';
        html += '<input type="button" class="btn btn-primary pull-right" value="Add option" onclick="createMultiOption(' + i + ')"/>';
        html += '</div>'; 

        //multi questions div. Create number of multiquestions in this div
        html += '<div class="col-md-12 col-xs-12 input-group" id="multiQuestionsDiv_'+ i +'">';
        html += '<input type="hidden" id="numberOfMultiQuestions_' + i + '" name="numberOfMultiQuestions_' + i + '" />';
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
        
        if (type == 'multi') {
            $('#textTypeDiv_' + id).hide();
            $('#addMultiQuestion_' + id).show();
            $('#multiQuestionsDiv_' + id).show();

        } else {
            $('#addMultiQuestion_' + id).hide();
            $('#multiQuestionsDiv_' + id).html('');
        }

    }


    function createTextType(id) {
        var html = '';

        html += '<br>'
        html += '<div class="col-md-8 col-xs-8">';
        html += '<h5>Select Type: <label>';
        html += '<input class="iradio" onchange="" type="radio" name="textType_'+ i +'" value="numeric" name="" checked> Numeric </label><label>';
        html += '<input class="iradio" onchange="" type="radio" name="textType_'+ i +'" value="text" name="" > Text </label></h5';
        html += '</div>';
        
        $('#textTypeDiv_' + id).html(html);
               
    }

    function createMultiOption(id) {
        //var html = '<h5>Multiple Choice:</h5><br>';

        var j = parseInt( ( $('#numberOfMultiQuestions_' + id).val() ? $('#numberOfMultiQuestions_' + id).val() : 0 ) );
        j++;
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

        return html;
    }

</script>