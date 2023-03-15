<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "student".
 *
 * @property int $id
 * @property string $phone
 * @property string $birthday_date
 * @property string $address
 * @property string $fullname
 *
 * @property Lesson[] $lessons
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'birthday_date'], 'required'],
            [['id'], 'integer'],
            [['birthday_date'], 'safe'],
            [['phone'], 'string', 'max' => 11],
            [['address'], 'string', 'max' => 45],
            [['fullname'], 'string', 'max' => 255],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'phone' => 'Phone',
            'birthday_date' => 'Birthday Date',
            'address' => 'Address',
            'fullname' => 'Fullname',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLessons()
    {
        return $this->hasMany(Lesson::className(), ['student_id' => 'id']);
    }
}
