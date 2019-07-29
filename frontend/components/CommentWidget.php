<?php
namespace app\components;

use common\models\Comment;
use yii\base\Widget;
use yii\data\ArrayDataProvider;

class CommentWidget extends Widget
{
    public $comments;
    public $commentForm;
    public $film;

    public $commentDataProvider;



    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $this->commentDataProvider = $this->getCommentDataProvider();

        return $this->render('comment', [
            'commentDataProvider' => $this->commentDataProvider,
            'commentForm' => $this->commentForm,
            'film' => $this->film,
        ]);

    }

    /**
     * Get comment ArrayDataProvider
     *
     *
     * @return ArrayDataProvider
     */
    protected function getCommentDataProvider()
    {
        $dataProvider = new ArrayDataProvider();
        $dataProvider->allModels = Comment::getTree($this->comments);
        return $dataProvider;
    }

}




