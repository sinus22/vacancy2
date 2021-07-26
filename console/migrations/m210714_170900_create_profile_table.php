<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%profile}}`.
 */
class m210714_170900_create_profile_table extends Migration
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

        $this->createTable('{{%profile}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'first_name' => $this->string(50),
            'last_name' => $this->string(50),
            'patronymic' =>$this->string(50),
            'province_id' => $this->integer()->notNull(),
            'region_id' => $this->integer()->notNull(),
            'address' => $this->text(),
            'phone_1' => $this->string(50),
            'phone_2' => $this->string(50)->null(),
            'date_birth' => $this->date(),
            'email' => $this->string(50),
            'nation_id' => $this->integer(),
            'gender_id' => $this->integer()->notNull(),
            'family_status_id' => $this->integer()->notNull(),
            'soha_yunalish_id' => $this->integer()->notNull(),
            'specialization' => $this->text(),
            'image' => $this->text(),
            'maqul_keladigan_id' => $this->integer()->notNull(),
            'computer_skills' => $this->text(),
            'party_id' => $this->integer()->notNull(),
            'military_rank_id' => $this->integer()->notNull(),
            'driving_license_id' => $this->integer()->notNull(),
            'status' => $this->boolean(),
            'resume' => $this->text(),
            'created_at' =>$this->timestamp()->null(),
            'updated_at' =>$this->timestamp()->null(),
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%profile}}');
    }
}
