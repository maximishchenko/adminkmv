<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%callback}}`.
 */
class m230402_175406_create_callback_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%callback}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'phone' => $this->string(),
            'email' => $this->string(),
            'body' => $this->text(),
            'agreement' => $this->boolean(),
            'created_at' => $this->integer(),
        ], $tableOptions);
        
        $this->createIndex('idx-callback-id', '{{%callback}}', 'id');
        $this->createIndex('idx-callback-name', '{{%callback}}', 'name');
        $this->createIndex('idx-callback-phone', '{{%callback}}', 'phone');
        $this->createIndex('idx-callback-email', '{{%callback}}', 'email');
        $this->createIndex('idx-callback-agreement', '{{%callback}}', 'agreement');
        $this->createIndex('idx-callback-created_at', '{{%callback}}', 'created_at');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%callback}}');
    }
}
