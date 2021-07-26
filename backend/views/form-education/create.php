<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\FormEducation */

$this->title = Yii::t('app', 'Create Form Education');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Form Educations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="form-education-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
