<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\StringHelper;

$this->title = 'Фильмы';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Все фильмы!</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <?php foreach ($films as $film): ?>
                <div class="col-lg-4">
                    <h2> <?= Html::encode($film->name) ?></h2>

                    <p><?= Html::encode(StringHelper::truncate($film->description,100,'...')) ?></p>

                    <?= Html::a('Подробнее', ['films/one', 'url'=>$film->url],['class' => 'btn btn-default'])?>

                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>
