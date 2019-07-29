<?php

use app\models\CommentForm;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model common\models\Comment */
/** @var $commentForm CommentForm */
/* @var $form yii\widgets\ActiveForm */

$comment_id = NULL;
if(isset($commentId))
    $comment_id = $commentId;
?>

<div class="director-form">

    <?php $form = ActiveForm::begin([
        'id' => 'comment-form',
        'action' => ['/films/add-comment', 'id' => $film->id, 'parentId' => $commentId],
        'options' => ['class' => 'form-horizontal contact-form', 'role' => 'form', 'data' => ['pjax' => true]]
    ]); ?>

    <?=
    $form->field($commentForm, 'comment')->textarea([
            'class' => 'form-control',
            'placeholder' => 'Введите сообщение',
            'maxlength' => true,
            ['rows' => '6']
        ]
    )->label('Ваш коментарий') ?>


    <div class="form-group">
        <?= Html::submitButton('Отправть', ['class' => 'btn btn-default']) ?>
    </div>


    <?php ActiveForm::end(); ?>

</div>