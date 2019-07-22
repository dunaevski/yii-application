<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "films_genre".
 *
 * @property int $films_id
 * @property int $genre_id
 *
 * @property Films $films
 * @property Genre $genre
 */
class FilmsGenre extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'films_genre';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['films_id', 'genre_id'], 'required'],
            [['films_id', 'genre_id'], 'integer'],
            [['films_id', 'genre_id'], 'unique', 'targetAttribute' => ['films_id', 'genre_id']],
            [['films_id'], 'exist', 'skipOnError' => true, 'targetClass' => Films::className(), 'targetAttribute' => ['films_id' => 'id']],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::className(), 'targetAttribute' => ['genre_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'films_id' => 'Films ID',
            'genre_id' => 'Genre ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilms()
    {
        return $this->hasOne(Films::className(), ['id' => 'films_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genre::className(), ['id' => 'genre_id']);
    }
}
