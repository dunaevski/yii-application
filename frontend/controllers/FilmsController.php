<?php

namespace frontend\controllers;
use app\models\CommentForm;
use app\models\Films;

use common\models\Comment;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class FilmsController extends Controller
{
    public function actionIndex()
    {
        $films = Films::find()->all();
        return $this->render('index', compact('films'));
    }

    public function actionOne($url)
    {
        if ($film = Films::find()->andWhere(['url'=>$url])->one()){

            $comments = $film->comments;
            $commentForm = new CommentForm();
            return $this->render('one', [
                 'film' => $film,
                 'comments' => $comments,
                 'commentForm' => $commentForm,
                ]
            );
        }
        throw new NotFoundHttpException('Такой страницы не существует');
    }

    public function actionAddComment($id, $parentId = NULL) {
        $model = new CommentForm();


        if(Yii::$app->request->isPost)
        {
            $model->load(Yii::$app->request->post());

            if($model->saveComment($id, $parentId))
            {
                return $this->redirect(Yii::$app->request->referrer);
            }
        }
    }

    public function actionDeleteComment($id)
    {
        $this->findCommentModel($id)->delete();

        return $this->redirect(Yii::$app->request->referrer);
    }


    protected function findCommentModel($id)
    {
        if (($model = Comment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}