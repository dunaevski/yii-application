<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="comment-view">
    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'text',
            'parentId',
            'user_id',
            [
                'attribute' => 'user_id',
                'value' => function ($model) {
                    return $model->getUserName();
                },
            ],
            'film_id',
            [
                'attribute' => 'film_id',
                'value' => function ($model) {
                    return $model->getFilmName();
                },
            ],
            'status',
            'created_at:datetime',
            'updated_at:datetime',

        ],
    ]) ?>

</div>
