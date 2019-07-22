<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Films */

$this->title = 'Добавить Фильм';
$this->params['breadcrumbs'][] = ['label' => 'Фильмы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="films-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
