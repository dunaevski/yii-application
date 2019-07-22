<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Главная';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Добро пожаловать!</h1>

        <p class="lead">Нажми на кнопку, чтобы посомтреть все фильмы.</p>

        <?= Html::a('Посмотреть', ['films/index'],['class' => 'btn btn-lg btn-success'])?>
    </div>

</div>
