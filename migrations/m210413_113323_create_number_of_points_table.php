<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%number_of_points}}`.
 */
class m210413_113323_create_number_of_points_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%number_of_points}}', [
            'id' => $this->primaryKey(),
            'min' => $this->integer()->notNull(),
            'max' => $this->integer()->notNull(),
            'type' => $this->string()->notNull(),
            'coeff' => $this->float(),
            'status' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%number_of_points}}');
    }
}
