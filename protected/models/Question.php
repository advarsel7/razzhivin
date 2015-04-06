<?php

class Question extends CActiveRecord
{
	public function tableName()
	{
		return 'question';
	}

	public function rules()
	{
		return array(
			array('title, description, answers, type, course_id', 'required'),
			array('course_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>120),
			array('type', 'length', 'max'=>10),
			array('id, title, description, answers, type, course_id', 'safe', 'on'=>'search'),
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
			'title' => 'Title',
			'description' => 'Description',
			'answers' => 'Answers',
			'type' => 'Type',
			'course_id' => 'Course',
		);
	}

	public function search()
	{
		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('answers',$this->answers,true);
		$criteria->compare('type',$this->type,true);
		$criteria->compare('course_id',$this->course_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
