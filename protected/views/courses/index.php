<?php
	$this->breadcrumbs=array(
		'Courses'=>array('/courses'),
	);
?>
<h1>All courses:</h1>
<?php foreach ($courses as $course): ?>
	<h3 style="text-align: center;"><?=$course['title']?></h3>
	<p style="font-size: 14px"><?=$course['description']?></p>
	<p><?=CHtml::link('Begin >>>',array('Courses/beginCourse', 'courses_id'=> $course['id']))?></p>
	<p><?=CHtml::link('Add questions >>>',array('question/create', 'question_id'=> $course['id']))?></p>
<?php endforeach; ?>
