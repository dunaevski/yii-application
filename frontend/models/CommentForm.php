<?php


namespace app\models;


use common\models\Comment;
use Yii;
use yii\base\Model;

class CommentForm extends Model
{

    public $comment;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string', 'length' => [3, 250]],

        ];
    }


    public function saveComment($film_id, $idComment)
    {
        $comment = new Comment();

        $comment->text = $this->comment;

        $comment->user_id = Yii::$app->user->id;
        $comment->status = 0;

        $comment->film_id = $film_id;
        if ($idComment != NULL)
            $comment->parentId = $idComment;

        return $comment->save();
    }

    public function deleteComment($id)
    {
        // выбираем из таблицы Китай
        $model = Comment::find()->where(['id' => $id])->one();
        // удаляем строку
        $model->delete();

        return  $model->delete();
    }
}