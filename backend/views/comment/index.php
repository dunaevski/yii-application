<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CommentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Комментарии';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comment-index">

    <p>
<!--         Html::a('Добавть Комментарий ', ['create'], ['class' => 'btn btn-success']) -->
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'text',
            'parentId',
            [
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->getUserName();
                },
            ],
            [
                'attribute' => 'film_id',
                'value' => function ($model) {
                    return $model->getFilmName();
                },
            ],
            'status',
            'created_at:datetime',
            'updated_at:datetime',


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
