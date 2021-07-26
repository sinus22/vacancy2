<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Profiles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="container-fluid">

    <div class="card">
        <div class="card-body">

            <h1><?= Html::encode($this->title) ?></h1>

            <p>
                <?= Html::a(Yii::t('app', 'Create Profile'), ['create'], ['class' => 'btn btn-success']) ?>
            </p>

            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                   // 'id',
                    'user_id',
                    'first_name',
                    'last_name',
                    'patronymic',
                    //'province_id',
                    //'region_id',
                    //'address:ntext',
                    //'phone_1',
                    //'phone_2',
                    //'date_birth',
                    //'email:email',
                    //'nation_id',
                    //'gender_id',
                    //'family_status_id',
                    //'soha_yunalish_id',
                    //'specialization:ntext',
                    //'image:ntext',
                    //'maqul_keladigan_id',
                    //'computer_skills:ntext',
                    //'party_id',
                    //'military_rank_id',
                    //'driving_license_id',
                    //'status',
                    //'resume:ntext',
                    //'created_at',
                    //'updated_at',

                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>

        </div>
    </div>
</div>
