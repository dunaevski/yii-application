<?php

/* @var $this yii\web\View */
/* @var $film frontend\controllers\FilmsController */

use app\models\Films;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

$this->title = $film->name;
$fullName = ArrayHelper::getValue($film->director, function ($user, $defaultValue) {
    return $user->name . ' ' . $user->surname;
});

$filmGenre ="";

foreach ( $film->genres as $genre) {
    $filmGenre = ArrayHelper::getValue($genre, 'name').", ".$filmGenre;
}

$model = Films::find()->where(['id' => $film->id])->one();

?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= Html::encode($film->name) ?></h1>
    </div>

    <div class="row">
        <div class="col-4">
            <h3>Год создания:   <span> <?= Html::encode($film->year) ?></span> </h3>
            <h3>Режисер:   <span> <?= Html::encode($fullName) ?></span><h3>
            <h3>Жанр:   <span> <?= Html::encode(rtrim($filmGenre,", ")) ?></span><h3>

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
            <?php echo \yii2mod\comments\widgets\Comment::widget([
                'model' => $model,
            ]); ?>
        </div>

    </div>

</div>


