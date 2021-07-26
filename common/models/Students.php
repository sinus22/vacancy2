<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $patronymic
 * @property int $gender_id
 * @property int|null $state_id
 * @property int|null $region_id
 * @property string|null $address
 * @property string|null $birthday
 * @property int|null $specialization_id
 * @property int|null $course_id
 * @property int|null $form_of_education_id
 * @property string|null $budget
 * @property string|null $phone_number
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Course $course
 * @property FormEducation $formOfEducation
 * @property Gender $gender
 * @property Regions $region
 * @property Specializations $specialization
 * @property State $state
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['gender_id'], 'required'],
            [['gender_id', 'state_id', 'region_id', 'specialization_id', 'course_id', 'form_of_education_id'], 'integer'],
            [['address', 'budget'], 'string'],
            [['birthday', 'created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name', 'patronymic'], 'string', 'max' => 150],
            [['phone_number'], 'string', 'max' => 50],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::className(), 'targetAttribute' => ['gender_id' => 'id']],
            [['state_id'], 'exist', 'skipOnError' => true, 'targetClass' => State::className(), 'targetAttribute' => ['state_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::className(), 'targetAttribute' => ['region_id' => 'id']],
            [['specialization_id'], 'exist', 'skipOnError' => true, 'targetClass' => Specializations::className(), 'targetAttribute' => ['specialization_id' => 'id']],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['form_of_education_id'], 'exist', 'skipOnError' => true, 'targetClass' => FormEducation::className(), 'targetAttribute' => ['form_of_education_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'patronymic' => Yii::t('app', 'Patronymic'),
            'gender_id' => Yii::t('app', 'Gender ID'),
            'state_id' => Yii::t('app', 'State ID'),
            'region_id' => Yii::t('app', 'Region ID'),
            'address' => Yii::t('app', 'Address'),
            'birthday' => Yii::t('app', 'Birthday'),
            'specialization_id' => Yii::t('app', 'Specialization ID'),
            'course_id' => Yii::t('app', 'Course ID'),
            'form_of_education_id' => Yii::t('app', 'Form Of Education ID'),
            'budget' => Yii::t('app', 'Budget'),
            'phone_number' => Yii::t('app', 'Phone Number'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CourseQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::className(), ['id' => 'course_id']);
    }

    /**
     * Gets query for [[FormOfEducation]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\FormEducationQuery
     */
    public function getFormOfEducation()
    {
        return $this->hasOne(FormEducation::className(), ['id' => 'form_of_education_id']);
    }

    /**
     * Gets query for [[Gender]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\GenderQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::className(), ['id' => 'gender_id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\RegionsQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regions::className(), ['id' => 'region_id']);
    }

    /**
     * Gets query for [[Specialization]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\SpecializationsQuery
     */
    public function getSpecialization()
    {
        return $this->hasOne(Specializations::className(), ['id' => 'specialization_id']);
    }

    /**
     * Gets query for [[State]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\StateQuery
     */
    public function getState()
    {
        return $this->hasOne(State::className(), ['id' => 'state_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\StudentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\StudentsQuery(get_called_class());
    }
}
