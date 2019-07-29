<?php

namespace common\models;

use app\models\Films;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $text
 * @property int $parentId
 * @property int $user_id
 * @property int $status
 * @property int $created_at
 * @property int $updated_at
 * @property int $film_id
 *
 * @property Films $film
 * @property User $user
 */
class Comment extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    protected $children;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parentId', 'user_id', 'status', 'created_at', 'updated_at', 'film_id'], 'integer'],
            [['text'], 'string', 'max' => 255],
            [
                ['film_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Films::className(),
                'targetAttribute' => ['film_id' => 'id']
            ],
            [
                ['user_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => User::className(),
                'targetAttribute' => ['user_id' => 'id']
            ],
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Комментарий',
            'parentId' => 'ID Родителя',
            'user_id' => 'Пользователь',
            'film_id' => 'Фильм',
            'status' => 'Статус',
            'created_at' => 'Дата Создания',
            'updated_at' => 'Дата Изменения',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getFilm()
    {
        return $this->hasOne(Films::className(), ['id' => 'film_id']);
    }

    public function getFilmName() {

        return isset($this->film)?$this->film->name:"Ошибка связи";
    }

    /**
     * @return ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getUserName() {

        return isset($this->user)?$this->user->username:"Ошибка связи";
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDateTime($this->updated_at);

    }

    /**
     * @return array|null|ActiveRecord[]
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param $value
     */
    public function setChildren($value)
    {
        $this->children = $value;
    }

    /**
     * @return bool
     */
    public function hasChildren()
    {
        return !empty($this->children);
    }

    protected static function buildTree(&$data, $rootID = null)
    {
        $tree = [];
        foreach ($data as $id => $node) {
            if ($node->parentId == $rootID) {
                unset($data[$id]);
                $node->children = self::buildTree($data, $node->id);
                $tree[] = $node;
            }
        }
        return $tree;
    }

    public static function getTree($filmID)
    {
        return self::buildTree($filmID);
    }


    public function beforeDelete()
    {
        if(parent::beforeDelete()) {
            self::deleteAll(['parentId'=> $this->id]);
            return true;
        }
        else
            return false;
    }

}
