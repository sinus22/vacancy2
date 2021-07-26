<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\MilitaryRank */

$this->title = Yii::t('app', 'Create Military Rank');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Military Ranks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="military-rank-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
