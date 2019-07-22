<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Films */

$this->title = 'Изменить фильм : ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Films', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Имзенить';
?>
<div class="films-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
