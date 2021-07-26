<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Partys */

$this->title = Yii::t('app', 'Create Partys');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Partys'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partys-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
