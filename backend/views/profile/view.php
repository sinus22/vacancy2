<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Profile */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Profiles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="container-fluid">

    <div class="card">
        <div class="card-body">

            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    'user_id',
                    'first_name',
                    'last_name',
                    'patronymic',
                    'province_id',
                    'region_id',
                    'address:ntext',
                    'phone_1',
                    'phone_2',
                    'date_birth',
                    'email:email',
                    'nation_id',
                    'gender_id',
                    'family_status_id',
                    'soha_yunalish_id',
                    'specialization:ntext',
                    'image:ntext',
                    'maqul_keladigan_id',
                    'computer_skills:ntext',
                    'party_id',
                    'military_rank_id',
                    'driving_license_id',
                    'status',
                    'resume:ntext',
                    'created_at',
                    'updated_at',
                ],
            ]) ?>
        </div>
    </div>
</div>
