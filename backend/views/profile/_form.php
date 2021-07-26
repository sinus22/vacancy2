<?php

use common\models\DrivingLicense;
use common\models\Family;
use common\models\Fields;
use common\models\Gender;
use common\models\MilitaryRank;
use common\models\Nations;
use common\models\Partys;
use common\models\Province;
use common\models\Specializations;
use kartik\depdrop\DepDrop;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="container-fluid">

    <div class="card">
        <div class="card-body">

            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'first_name')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'last_name')->textInput(['maxlength' => true]) ?>
                </div>

                <div class="col-md-4">
                    <?= $form->field($model, 'patronymic')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'province_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Province::find()->all(),'id','name'),
                        'options' => ['placeholder' => 'Select a province ...','id'=>'cat-id'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('Province');?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'region_id')->widget(DepDrop::classname(), [
//                    'data' => ArrayHelper::map(Regions::find()->all(),'id','name'),
                        'options' => ['id'=>'subcat-id'],
                        'pluginOptions' => [
                            'depends'=>['cat-id'],
                            'allowClear' => true,
                            'url'=> Url::to(['/profile/subcat'])
                        ],
                    ])->label('Region');?>
                </div>
            </div>

            <?= $form->field($model, 'address')->textInput() ?>

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'phone_1')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'phone_2')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'date_birth')->textInput(['type' => 'date']) ?>
                </div>
            </div>

            <?= $form->field($model, 'email')->textInput(['maxlength' => true,'type'=>'email']) ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'nation_id')->radioList(ArrayHelper::map(Nations::find()->all(),'id','name'))->label('Nations');?></div>
                <div class="col-md-6">
                    <?= $form->field($model, 'gender_id')->radioList(ArrayHelper::map(Gender::find()->all(), 'id', 'name'))->label('Gender') ?>
                </div>
            </div>


            <?= $form->field($model, 'family_status_id')->radioList(ArrayHelper::map(Family::find()->all(), 'id', 'name'))->label('Family Status') ?>

            <?= $form->field($model, 'soha_yunalish_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Fields::find()->all(),'id','name'),
                'options' => ['placeholder' => 'Select a Sohalar ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Soha Yo`nalishlar');?>

            <?= $form->field($model, 'maqul_keladigan_id')->widget(Select2::classname(), [
                'data' => ArrayHelper::map(Specializations::find()->all(),'id','name'),
                'options' => ['placeholder' => 'Select a Maqul keladigan kasblar ...'],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ])->label('Maqul Keladigan Kasb');?>

            <?= $form->field($model, 'specialization')->textarea(['rows' => 6]) ?>


            <?= $form->field($model, 'computer_skills')->textarea(['rows' => 6]) ?>
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'party_id')->dropDownList(ArrayHelper::map(Partys::find()->all(), 'id', 'name'))->label('Partys') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'military_rank_id')->dropDownList(ArrayHelper::map(MilitaryRank::find()->all(), 'id', 'name'))->label('Military Rank') ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'driving_license_id')->dropDownList(ArrayHelper::map(DrivingLicense::find()->all(), 'id', 'name'))->label('Driving License') ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'resume')->fileInput() ?>
                </div>
                <div class="col-md-4">
                    <?= $form->field($model, 'image')->fileInput() ?>
                </div>
            </div>
            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
