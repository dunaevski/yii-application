<?php

/* @var $this yii\web\View */
/* @var $film frontend\controllers\CommentController */
/** @var $comments frontend\controllers\CommentController */

/** @var $commentForm frontend\controllers\CommentController */

use app\components\CommentWidget;
use yii\helpers\Html;

$this->title = $film->name;

?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= Html::encode($film->name) ?></h1>
    </div>

    <div class="row">
        <div class="col-4">
            <h3>Год создания:   <span> <?= Html::encode($film->year) ?></span> </h3>
            <h3>Режисер: <span> <?= Html::encode($film->getFullName()) ?></span>
                <h3>
                    <h3>Жанр: <span> <?= Html::encode(rtrim($film->getAllGenres(), ", ")) ?></span>
                        <h3>

        </div>
    </div>

    <div class="body-content">

        <div class="row">
            <h3>Описание:</h3>
                <div class="col-lg-12">
                    <p><?= Html::encode($film->description) ?></p>

                </div>
        </div>

        <div class="row">
            <?= CommentWidget::widget([
                'comments' => $comments,
                'commentForm' => $commentForm,
                'film' => $film
            ]) ?>
        </div>
    </div>

</div>


