<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "fields".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Profile[] $profiles
 */
class Fields extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fields';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 100],
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
     * Gets query for [[Profiles]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ProfileQuery
     */
    public function getProfiles()
    {
        return $this->hasMany(Profile::className(), ['soha_yunalish_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\FieldsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\FieldsQuery(get_called_class());
    }
}
