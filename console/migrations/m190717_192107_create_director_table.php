<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%director}}`.
 */
class m190717_192107_create_director_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%director}}', [
            'id' => $this->primaryKey(),
            'name'=> $this->string(32)->notNull(),
            'surname'=> $this->string(32)->notNull(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%director}}');
    }
}
