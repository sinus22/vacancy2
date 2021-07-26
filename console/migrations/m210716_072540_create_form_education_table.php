<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%form_education}}`.
 */
class m210716_072540_create_form_education_table extends Migration
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
        $this->createTable('{{%form_education}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(150),
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
        $this->dropTable('{{%form_education}}');
    }
}
