<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Director */

$this->title = 'Добавить Режиссера';
$this->params['breadcrumbs'][] = ['label' => 'Режиссеры', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="director-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
