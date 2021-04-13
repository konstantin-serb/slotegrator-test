<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%things}}`.
 */
class m210413_114743_create_things_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%things}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'price' => $this->integer()->notNull(),
            'available' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%things}}');
    }
}
