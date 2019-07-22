<?php

namespace app\models;

use Yii;
use yii\behaviors\SluggableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "films".
 *
 * @property int $id
 * @property string $name
 * @property string $year
 * @property string $description
 * @property string $url
 * @property int $created_at
 * @property int $updated_at
 * @property int $director_id
 *
 * @property Director $director
 * @property FilmsGenre[] $filmsGenres
 * @property Genre[] $genres
 */
class Films extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'films';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'year', 'description', 'director_id'], 'required'],
            [['description'], 'string'],
            [['director_id'], 'integer'],
            [['name', 'url'], 'string', 'max' => 32],
            [['year'], 'string', 'max' => 10],
            [['director_id'], 'exist', 'skipOnError' => true, 'targetClass' => Director::className(), 'targetAttribute' => ['director_id' => 'id']],
        ];
    }

    public function behaviors()
    {

        return [
            TimestampBehavior::className(),
            [
                'class' => SluggableBehavior::className(),
                'attribute' => 'name',
                'slugAttribute' => 'url',//default name slug
                'immutable' => true,
            ]

        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'year' => 'Год',
            'description' => 'Описание',
            'url' => 'Url',
            'created_at' => 'Дата Создания',
            'updated_at' => 'Дата Изменения',
            'director_id' => 'Режисер',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDirector()
    {
        return $this->hasOne(Director::className(), ['id' => 'director_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFilmsGenres()
    {
        return $this->hasMany(FilmsGenre::className(), ['films_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenres()
    {
        return $this->hasMany(Genre::className(), ['id' => 'genre_id'])->viaTable('films_genre', ['films_id' => 'id']);
    }
}
