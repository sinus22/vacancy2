<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%fields}}`.
 */
class m210714_111042_create_fields_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%fields}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100),
            'status' => $this->boolean(),
            'created_at' =>$this->timestamp()->null(),
            'updated_at' =>$this->timestamp()->null(),
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%fields}}');
    }
}
