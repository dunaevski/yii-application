<?php

use app\models\Director;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\StringHelper;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\FilmsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Все Фильмы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="films-index">


    <p>
        <?= Html::a('Добавить Фильмы', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'year',
            'url:url',
            [
                'attribute' => 'description',
                'value' => function ($model) {
                    return StringHelper::truncate($model->description,100,'...');
                },
            ],
            [
                'attribute' => 'director_id',
                'value' => 'directorName',
                'filter' => Director::getDirectors()
            ],
            [
                'attribute' => 'genre_arr',
                'value' => 'genreAsString'
            ],
            [
                'attribute' => 'created_at',
                'format' => 'datetime',
                'filter' => false
            ],
            [
                'attribute' => 'updated_at',
                'format' => 'datetime',
                'filter' => false
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
