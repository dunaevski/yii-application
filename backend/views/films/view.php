<?php

use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Films */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Фильмы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="films-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'year',
            'description:ntext',
            'url:url',
            [
                'attribute' => 'director_id',
                'value' => function ($model) {
                    return $model->getDirectorName();
                },
            ],
            [
                'attribute' => 'genre_arr',
                'value' => function ($model) {
                    return $model->getGenreAsString();
                },
            ],
            'created_at:datetime',
            'updated_at:datetime',

        ],
    ]) ?>

</div>
