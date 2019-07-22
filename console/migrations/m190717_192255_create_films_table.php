<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%films}}`.
 */
class m190717_192255_create_films_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%films}}', [
            'id' => $this->primaryKey(),
            'name'=> $this->string(32)->notNull(),
            'year'=> $this->string(10)->notNull(),
            'description'=> $this->text()->notNull(),
            'url'=> $this->string(32)->notNull(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),

            'director_id'=> $this->integer()->notNull(),

        ]);
        $this->createIndex('%idx-films-id', 'films', 'id');
        $this->addForeignKey('%fk-films-director_id', 'films', 'director_id', 'director', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%films}}');
    }
}
