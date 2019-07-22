<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%films_genre}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%films}}`
 * - `{{%genre}}`
 */
class m190719_005649_create_junction_table_for_films_and_genre_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%films_genre}}', [
            'films_id' => $this->integer(),
            'genre_id' => $this->integer(),
            'PRIMARY KEY(films_id, genre_id)',
        ]);

        // creates index for column `films_id`
        $this->createIndex(
            '{{%idx-films_genre-films_id}}',
            '{{%films_genre}}',
            'films_id'
        );

        // add foreign key for table `{{%films}}`
        $this->addForeignKey(
            '{{%fk-films_genre-films_id}}',
            '{{%films_genre}}',
            'films_id',
            '{{%films}}',
            'id',
            'CASCADE'
        );

        // creates index for column `genre_id`
        $this->createIndex(
            '{{%idx-films_genre-genre_id}}',
            '{{%films_genre}}',
            'genre_id'
        );

        // add foreign key for table `{{%genre}}`
        $this->addForeignKey(
            '{{%fk-films_genre-genre_id}}',
            '{{%films_genre}}',
            'genre_id',
            '{{%genre}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%films}}`
        $this->dropForeignKey(
            '{{%fk-films_genre-films_id}}',
            '{{%films_genre}}'
        );

        // drops index for column `films_id`
        $this->dropIndex(
            '{{%idx-films_genre-films_id}}',
            '{{%films_genre}}'
        );

        // drops foreign key for table `{{%genre}}`
        $this->dropForeignKey(
            '{{%fk-films_genre-genre_id}}',
            '{{%films_genre}}'
        );

        // drops index for column `genre_id`
        $this->dropIndex(
            '{{%idx-films_genre-genre_id}}',
            '{{%films_genre}}'
        );

        $this->dropTable('{{%films_genre}}');
    }
}
