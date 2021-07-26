<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Nations */

$this->title = Yii::t('app', 'Create Nations');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Nations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nations-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
