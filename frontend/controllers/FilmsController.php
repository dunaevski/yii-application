<?php

namespace frontend\controllers;
use app\models\Films;

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
        if ($film = Films::find()->andWhere(['url'=>$url])->one())
            return $this->render('one', compact('film'));
        throw new NotFoundHttpException('Такой страницы не существует');
    }
}