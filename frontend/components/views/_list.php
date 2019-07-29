<?php

use yii\helpers\Html;
?>

<div class="media" id=<?= $model->id ?>>

    <p class="pull-right">
        <small> <?= $model->getDate() ?></small>
    </p>

    <div class="media-body">

        <h4 class="media-heading user_name"> <?= $model->user->username ?></h4>
        <?= $model->text ?>

        <p>


                <?php if (!Yii::$app->user->isGuest) : ?>
                    <?php echo Html::a(
                        "<span class='glyphicon glyphicon-share-alt'></span> Ответить ",
                        '#replyCommentT-'. $model->id ,
                        [
                            'class' => 'reply-comment-btn',
                            'data-comment-id' => $model->id,
                            'data-toggle' => "collapse",
                            'aria-expanded' => "false",
                            'aria-controls' => "collapseExample",
                        ]); ?>
                <?php if (Yii::$app->user->identity->id === $model->user_id || Yii::$app->user->can('admin') ) : ?>
                    -
                    <?= Html::a('Удалить', ['/films/delete-comment', 'id' => $model->id]) ?>
                <?php endif; ?>

            <?php endif; ?>
        </p>

        <?php


        ?>

    </div>
</div>

<div class="collapse" id="replyCommentT-<?=isset($childrenId) ? $childrenId : $model->id ?>">
    <?= $this->render('_form', [
        'commentForm' => $commentForm,
        'model' => $model,
        'film' => $film,
        'commentId' => isset($childrenId) ? $childrenId : $model->id
    ]) ?>
</div>


<?php if ($model->hasChildren()) : ?>
    <ul class="children">
        <?php foreach ($model->getChildren() as $children) : ?>
            <?php echo $this->render('_list',
                ['model' => $children, 'commentForm' => $commentForm, 'film' => $film, 'childrenId' => $children->id]); ?>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

