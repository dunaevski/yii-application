<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Главная Администрация';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Выбирете Таблицу!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

    </div>

    <div class="body-content">

        <div class="row">
          
            
            <div class="col-lg-3">
                <h2> Фильмы </h2>

                <?= Html::a('Посмотреть', ['films/index'],['class' => 'btn btn-lg btn-success'])?>
            </div>

            <div class="col-lg-3">
                <h2> Режисеры </h2>

                <?= Html::a('Посмотреть', ['director/index'],['class' => 'btn btn-lg btn-success'])?>
            </div>

            <div class="col-lg-3">
                <h2> Жанры </h2>

                <?= Html::a('Посмотреть', ['genre/index'],['class' => 'btn btn-lg btn-success'])?>
            </div>


            <div class="col-lg-3">
                <h2> Коментарии </h2>

                <?= Html::a('Посмотреть', ['comment/manage'],['class' => 'btn btn-lg btn-success'])?>
            </div>

        </div>

    </div>
</div>
