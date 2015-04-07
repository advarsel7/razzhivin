<?php
class Answers extends CActiveRecord
{
	public function tableName()
	{
		return 'answers';
	}

	public function rules()
	{
		return array(
			array('courses_id, form_answers, time_answers', 'required'),
			array('courses_id', 'numerical', 'integerOnly'=>true),
			array('id, courses_id, form_answers, time_answers', 'safe', 'on'=>'search'),
		);
	}

	public function relations()
	{
		return array(
		);
	}

	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'courses_id' => 'Courses',
			'form_answers' => 'Form Answers',
			'time_answers' => 'Time Answers',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('courses_id',$this->courses_id);
		$criteria->compare('form_answers',$this->form_answers,true);
		$criteria->compare('time_answers',$this->time_answers,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
