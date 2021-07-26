<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%driving_license}}`.
 */
class m210714_111934_create_driving_license_table extends Migration
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

        $this->createTable('{{%driving_license}}', [
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
        $this->dropTable('{{%driving_license}}');
    }
}
