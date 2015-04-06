<?php
	$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<h3><?php echo CHtml::link('Courses',array('Courses/index')); ?></h3>