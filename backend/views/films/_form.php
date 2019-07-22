<?php

use app\models\Director;
use app\models\Genre;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Films */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="films-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name', ['options'=>['class'=> 'col-xs-6']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'year', ['options'=>['class'=> 'col-xs-6']])->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description', ['options'=>['class'=> 'col-xs-12']])->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'director_id', ['options'=>['class'=> 'col-xs-6']])->dropDownList(Director::getDirectors()) ?>

    <?= $form->field($model, 'genre_arr', ['options'=>['class'=> 'col-xs-6']])->widget(Select2::classname(), [
        'data' => Genre::getGenres(),
        'language' => 'ru',
        'options' => ['placeholder' => 'Выбирете жанры ...', 'multiple'=>true],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]);
    ?>

    <?= $form->field($model, 'url', ['options'=>['class'=> 'col-xs-12']])->textInput(['maxlength' => true])->label("URL (Введите свой или оставте поле пустым)") ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success ']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
