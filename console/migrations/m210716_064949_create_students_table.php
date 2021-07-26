<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%students}}`.
 */
class m210716_064949_create_students_table extends Migration
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

        $this->createTable('{{%students}}', [
            'id' => $this->primaryKey(),
            'first_name' => $this->string(150),
            'last_name' => $this->string(150),
            'patronymic' => $this->string(150),
            'gender_id' => $this->integer()->notNull(),
            'state_id' => $this->integer(),
            'region_id' => $this->integer(),
            'address' => $this->text(),
            'birthday' => $this->date(),
            'specialization_id' => $this->integer(),
            'course_id' => $this->integer(),
            'form_of_education_id' => $this->integer(),
            'budget' => "ENUM('Byudjet','Shartnoma')",
            'phone_number' => $this->string(50),
            'created_at' =>$this->timestamp()->null(),
            'updated_at' =>$this->timestamp()->null(),
        ],$tableOptions);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%students}}');
    }
}
