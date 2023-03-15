<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "grade".
 *
 * @property int $id
 * @property string $comment
 * @property int $value
 * @property int $lesson_id
 * @property int $lesson_student_id
 *
 * @property Lesson $lesson
 */
class Grade extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'grade';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'value', 'lesson_id', 'lesson_student_id'], 'required'],
            [['id', 'value', 'lesson_id', 'lesson_student_id'], 'integer'],
            [['comment'], 'string', 'max' => 255],
            [['id', 'lesson_id', 'lesson_student_id'], 'unique', 'targetAttribute' => ['id', 'lesson_id', 'lesson_student_id']],
            [['lesson_id', 'lesson_student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lesson::className(), 'targetAttribute' => ['lesson_id' => 'id', 'lesson_student_id' => 'student_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'comment' => 'Comment',
            'value' => 'Value',
            'lesson_id' => 'Lesson ID',
            'lesson_student_id' => 'Lesson Student ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lesson::className(), ['id' => 'lesson_id', 'student_id' => 'lesson_student_id']);
    }
}
