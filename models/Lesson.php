<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "lesson".
 *
 * @property int $id
 * @property string $time
 * @property string $name
 * @property int $audienceNumber
 * @property int $student_id
 * @property int $teacher_id
 *
 * @property Grade[] $grades
 * @property Student $student
 * @property Teacher $teacher
 */
class Lesson extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lesson';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'student_id', 'teacher_id'], 'required'],
            [['id', 'audienceNumber', 'student_id', 'teacher_id'], 'integer'],
            [['time'], 'safe'],
            [['name'], 'string', 'max' => 45],
            [['id', 'student_id', 'teacher_id'], 'unique', 'targetAttribute' => ['id', 'student_id', 'teacher_id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Student::className(), 'targetAttribute' => ['student_id' => 'id']],
            [['teacher_id'], 'exist', 'skipOnError' => true, 'targetClass' => Teacher::className(), 'targetAttribute' => ['teacher_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'time' => 'Time',
            'name' => 'Name',
            'audienceNumber' => 'Audience Number',
            'student_id' => 'Student ID',
            'teacher_id' => 'Teacher ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrades()
    {
        return $this->hasMany(Grade::className(), ['lesson_id' => 'id', 'lesson_student_id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStudent()
    {
        return $this->hasOne(Student::className(), ['id' => 'student_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeacher()
    {
        return $this->hasOne(Teacher::className(), ['id' => 'teacher_id']);
    }
}
