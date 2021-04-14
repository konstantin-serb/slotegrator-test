<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m210211_182735_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'surname' => $this->string()->notNull(),
            'lastName' => $this->string(),
            'email' => $this->string()->notNull()->unique(),
            'passwordHash' => $this->string()->notNull(),
            'authKey' => $this->string()->notNull(),
            'accessToken' => $this->string(),
            'is_admin' => $this->integer(),
            'status' => $this->integer(),
            'time_create' => $this->integer()->notNull(),
            'time_update' => $this->integer(),
            'user_type' => $this->integer(),
            'count_chance' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
