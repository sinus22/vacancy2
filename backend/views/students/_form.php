<?php

use backend\controllers\FormEducationController;
use common\models\Course;
use common\models\FormEducation;
use common\models\Gender;
use common\models\Regions;
use common\models\Specializations;
use common\models\State;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Students */
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
                    <?= $form->field($model, 'region_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Regions::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => 'Select a region ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('Region'); ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'state_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(State::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => 'Select a state ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('State'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'gender_id')->radioList(ArrayHelper::map(Gender::find()->all(), 'id', 'name'))->label('Gender'); ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'birthday')->textInput(['type' => 'date']) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'course_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Course::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => 'Select a course ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('Course'); ?>
                </div>
            </div>


            <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'specialization_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(Specializations::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => 'Select a specialization ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('Specialization'); ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'form_of_education_id')->widget(Select2::classname(), [
                        'data' => ArrayHelper::map(FormEducation::find()->all(), 'id', 'name'),
                        'options' => ['placeholder' => 'Select a Form Education ...'],
                        'pluginOptions' => [
                            'allowClear' => true
                        ],
                    ])->label('Form Education'); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'budget')->dropDownList(['Byudjet' => 'Byudjet', 'Shartnoma' => 'Shartnoma',], ['prompt' => '']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
                </div>
            </div>

            <div class="form-group">
                <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
