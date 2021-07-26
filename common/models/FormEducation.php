<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "form_education".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Student[] $students
 */
class FormEducation extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'form_education';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'status' => Yii::t('app', 'Status'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Students]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\StudentQuery
     */
    public function getStudents()
    {
        return $this->hasMany(Student::className(), ['form_of_education_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\FormEducationQuery the active query used by this AR class.
     */
//    public static function find()
//    {
//        return new \common\models\query\FormEducationQuery(get_called_class());
//    }
}
