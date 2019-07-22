<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Director */

$this->title = 'Изменить Режиссера: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Режиссеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="director-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
