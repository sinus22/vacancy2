<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Family */

$this->title = Yii::t('app', 'Create Family');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Families'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="family-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
