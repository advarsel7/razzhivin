<?php

class CoursesController extends Controller
{
	public function actionIndex()
	{
		$model = Courses::model()->findAll();
		$this->render('index', array('courses' => $model));
	}

	public function actionProgramming()
	{
		$this->render('programming');
	}

	public function actionDesign()
	{
		$this->render('design');
	}

	public function createCourse()
	{
		$model = new Course;
	}

	public function actionBeginCourse()
	{
		$course = Courses::model()->findByPk($_GET['courses_id']);
		$questions = Question::model()->findAllByAttributes(array('course_id' => $_GET['courses_id']));
		$this->render('beginCourse', array('course' => $course, 'questions' => $questions));
	}
}