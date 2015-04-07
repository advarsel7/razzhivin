<?php

class CoursesController extends Controller
{
	public function actionIndex()
	{
		$model = Courses::model()->findAll();
		$this->render('index', array('courses' => $model));
	}

	public function createCourse()
	{
		$model = new Course;
	}

    public function _serializeAnswers(array $mass)
    {
        $tmp = array();
        foreach($mass as $key => $value)
            if($key != 'course_id') $tmp[$key] = $value;

        return serialize($tmp);
    }

	public function actionBeginCourse()
	{
        if(isset($_POST['course_id'])) {
            $model = new Answers;
            $model->courses_id = $_POST['course_id'];
            $model->form_answers = $this->_serializeAnswers($_POST);
            $model->time_answers = date('Y-m-d H:i:s');
            if($model->save()) $this->redirect(array('index'));
        }
        /********/
		$course = Courses::model()->findByPk($_GET['courses_id']);
		$questions = Question::model()->findAllByAttributes(array('course_id' => $_GET['courses_id']));
		$this->render('beginCourse', array('course' => $course, 'questions' => $questions));
	}
}