<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DrivingLicense */

$this->title = Yii::t('app', 'Create Driving License');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Driving Licenses'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="driving-license-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
