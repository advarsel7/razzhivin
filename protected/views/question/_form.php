<?php
/* @var $this QuestionController */
/* @var $model Question */
/* @var $form CActiveForm */
?>

<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css" />
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/jquery-ui.min.js"></script>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'question-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row answers">
		<?php echo $form->labelEx($model,'answers'); ?>
		<?php echo $form->textArea($model,'answers',array('rows'=>6, 'cols'=>50, 'style' => 'display: none;')); ?>

		<script>
			$(document).ready(function(){
				var questionType = '';
				var q = 2;
				$('.add-button').click(function(){
					console.log("hello");
					$('.answers').append('<div><input type="text" class="add-answer" name="answer" /></div>');
					q++;
				});
					
					$('#Question_type').change(function(){
						questionType = $(this).val();
					});
				/******* Submit Button Click******/
				$('.submitButton').click(function(){

					if(questionType == "Open") {
						$('#Question_answers').text('none');
					} else {
						var answers = $('.add-answer');
						console.log($(answers).serialize());
						$('#Question_answers').text($(answers).serialize());

					}
				});
			});
		</script>
		<div>
			<input type="text" class="add-answer" name="answer" />
			<span class="add-button">+</span>
		</div>

		
		<?php echo $form->error($model,'answers'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->dropDownList($model,'type',array('Open'=>'Open','Close'=>'Close')); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->hiddenField($model,'course_id', array('value' => $question_id)); ?>
		<?php echo $form->error($model,'course_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save', array('class' => 'submitButton')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->