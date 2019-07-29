<?php

use yii\widgets\ListView;
use yii\widgets\Pjax;

?>

<?php Pjax::begin(['timeout' => 20000, 'enablePushState' => false,]); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="page-header">
                    <h1> Коментарии </h1>
                </div>
                <?php if (!Yii::$app->user->isGuest): ?>

                    <?= $this->render('_form', [
                        'commentForm' => $commentForm,
                        'film' => $film,
                        'commentId' => NULL
                    ]) ?>

                <?php endif; ?>

                <br/>

                <div class="comments-list">

                    <?= ListView::widget([
                            'dataProvider' => $commentDataProvider,
                            'layout' => "{items}\n{pager}",
                            'viewParams' =>  [
                                'commentForm' => $commentForm,
                                'film' => $film
                                ],
                            'itemView' => '_list',
                        ]
                    ); ?>


                </div>
            </div>
        </div>
    </div>
<?php Pjax::end(); ?>