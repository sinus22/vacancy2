<?php

namespace common\models;

use common\models\query\DrivingLicenseQuery;
use common\models\query\ProfileQuery;
use Yii;
use yii\db\ActiveQuery;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "profile".
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $patronymic
 * @property int $province_id
 * @property int $region_id
 * @property string|null $address
 * @property string|null $phone_1
 * @property string|null $phone_2
 * @property string|null $date_birth
 * @property string|null $email
 * @property int|null $nation_id
 * @property int $gender_id
 * @property int $family_status_id
 * @property int $soha_yunalish_id
 * @property string|null $specialization
 * @property string|null $image
 * @property int $maqul_keladigan_id
 * @property string|null $computer_skills
 * @property int $party_id
 * @property int $military_rank_id
 * @property int $driving_license_id
 * @property int|null $status
 * @property string|null $resume
 * @property string $created_at
 * @property string $updated_at
 *
 * @property DrivingLicense $drivingLicense
 * @property Family $familyStatus
 * @property Gender $gender
 * @property Specializations $maqulKeladigan
 * @property MilitaryRank $militaryRank
 * @property Nations $nation
 * @property Partys $party
 * @property Province $province
 * @property Regions $region
 * @property Fields $sohaYunalish
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['user_id', 'province_id', 'region_id', 'gender_id', 'family_status_id', 'soha_yunalish_id', 'maqul_keladigan_id', 'party_id', 'military_rank_id', 'driving_license_id'], 'required'],
            [['user_id', 'province_id', 'region_id', 'nation_id', 'gender_id', 'family_status_id', 'soha_yunalish_id', 'maqul_keladigan_id', 'party_id', 'military_rank_id', 'driving_license_id', 'status'], 'integer'],
            [['address', 'specialization', 'image', 'computer_skills', 'resume'], 'string'],
            [['date_birth', 'created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name', 'patronymic', 'phone_1', 'phone_2', 'email'], 'string', 'max' => 50],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['military_rank_id'], 'exist', 'skipOnError' => true, 'targetClass' => MilitaryRank::class, 'targetAttribute' => ['military_rank_id' => 'id']],
            [['driving_license_id'], 'exist', 'skipOnError' => true, 'targetClass' => DrivingLicense::class, 'targetAttribute' => ['driving_license_id' => 'id']],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => Province::class, 'targetAttribute' => ['province_id' => 'id']],
            [['region_id'], 'exist', 'skipOnError' => true, 'targetClass' => Regions::class, 'targetAttribute' => ['region_id' => 'id']],
            [['nation_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nations::class, 'targetAttribute' => ['nation_id' => 'id']],
            [['gender_id'], 'exist', 'skipOnError' => true, 'targetClass' => Gender::class, 'targetAttribute' => ['gender_id' => 'id']],
            [['family_status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Family::class, 'targetAttribute' => ['family_status_id' => 'id']],
            [['soha_yunalish_id'], 'exist', 'skipOnError' => true, 'targetClass' => Fields::class, 'targetAttribute' => ['soha_yunalish_id' => 'id']],
            [['maqul_keladigan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Specializations::class, 'targetAttribute' => ['maqul_keladigan_id' => 'id']],
            [['party_id'], 'exist', 'skipOnError' => true, 'targetClass' => Partys::class, 'targetAttribute' => ['party_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'patronymic' => Yii::t('app', 'Patronymic'),
            'province_id' => Yii::t('app', 'Province ID'),
            'region_id' => Yii::t('app', 'Region ID'),
            'address' => Yii::t('app', 'Address'),
            'phone_1' => Yii::t('app', 'Phone 1'),
            'phone_2' => Yii::t('app', 'Phone 2'),
            'date_birth' => Yii::t('app', 'Date Birth'),
            'email' => Yii::t('app', 'Email'),
            'nation_id' => Yii::t('app', 'Nation ID'),
            'gender_id' => Yii::t('app', 'Gender ID'),
            'family_status_id' => Yii::t('app', 'Family Status ID'),
            'soha_yunalish_id' => Yii::t('app', 'Soha Yunalish ID'),
            'specialization' => Yii::t('app', 'Specialization'),
            'image' => Yii::t('app', 'Image'),
            'maqul_keladigan_id' => Yii::t('app', 'Maqul Keladigan ID'),
            'computer_skills' => Yii::t('app', 'Computer Skills'),
            'party_id' => Yii::t('app', 'Party ID'),
            'military_rank_id' => Yii::t('app', 'Military Rank ID'),
            'driving_license_id' => Yii::t('app', 'Driving License ID'),
            'status' => Yii::t('app', 'Status'),
            'resume' => Yii::t('app', 'Resume'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[DrivingLicense]].
     *
     * @return ActiveQuery|DrivingLicenseQuery
     */
    public function getDrivingLicense()
    {
        return $this->hasOne(DrivingLicense::class, ['id' => 'driving_license_id']);
    }

    /**
     * Gets query for [[FamilyStatus]].
     *
     * @return ActiveQuery|\common\models\query\FamilyQuery
     */
    public function getFamilyStatus()
    {
        return $this->hasOne(Family::class, ['id' => 'family_status_id']);
    }

    /**
     * Gets query for [[Gender]].
     *
     * @return ActiveQuery|\common\models\query\GenderQuery
     */
    public function getGender()
    {
        return $this->hasOne(Gender::class, ['id' => 'gender_id']);
    }

    /**
     * Gets query for [[MaqulKeladigan]].
     *
     * @return ActiveQuery|\common\models\query\SpecializationsQuery
     */
    public function getMaqulKeladigan()
    {
        return $this->hasOne(Specializations::class, ['id' => 'maqul_keladigan_id']);
    }

    /**
     * Gets query for [[MilitaryRank]].
     *
     * @return ActiveQuery|\common\models\query\MilitaryRankQuery
     */
    public function getMilitaryRank()
    {
        return $this->hasOne(MilitaryRank::class, ['id' => 'military_rank_id']);
    }

    /**
     * Gets query for [[Nation]].
     *
     * @return ActiveQuery|\common\models\query\NationsQuery
     */
    public function getNation()
    {
        return $this->hasOne(Nations::class, ['id' => 'nation_id']);
    }

    /**
     * Gets query for [[Party]].
     *
     * @return ActiveQuery|\common\models\query\PartysQuery
     */
    public function getParty()
    {
        return $this->hasOne(Partys::class, ['id' => 'party_id']);
    }

    /**
     * Gets query for [[Province]].
     *
     * @return ActiveQuery|\common\models\query\ProvinceQuery
     */
    public function getProvince()
    {
        return $this->hasOne(Province::class, ['id' => 'province_id']);
    }

    /**
     * Gets query for [[Region]].
     *
     * @return ActiveQuery|\common\models\query\RegionsQuery
     */
    public function getRegion()
    {
        return $this->hasOne(Regions::class, ['id' => 'region_id']);
    }

    /**
     * Gets query for [[SohaYunalish]].
     *
     * @return ActiveQuery|\common\models\query\FieldsQuery
     */
    public function getSohaYunalish()
    {
        return $this->hasOne(Fields::class, ['id' => 'soha_yunalish_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQuery|\common\models\query\UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return ProfileQuery the active query used by this AR class.
     */
    public static function find(): ProfileQuery
    {
        return new ProfileQuery(static::class);
    }

    public function uploadImages(): bool
    {
        $image = UploadedFile::getInstance($this, 'image');
        $resume = UploadedFile::getInstance($this, 'resume');
        $url1 = uniqid().'.'.$image->extension;
        $url2 = uniqid().'.'.$resume->extension;
        $path_up = Yii::getAlias('@uploads/').date('Y-M');
        $path_res = Yii::getAlias('@resumes/').date('Y-M');
        if (FileHelper::createDirectory($path_up)>strtotime(date('Y-M'))){
            return false;
        }
        if (FileHelper::createDirectory($path_res)>strtotime(date('Y-M'))){
            return false;
        }
        if ($image === null || !$image->saveAs($path_up.'/'.  $url1)) {
            return false;
        }
        $this->image = $url1;
        if ($resume === null || !$resume->saveAs($path_res .'/'. $url1)) {
            return false;
        }
        $this->resume = $url2;
        return true;
    }
}
