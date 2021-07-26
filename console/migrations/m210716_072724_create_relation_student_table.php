<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%relation_student}}`.
 */
class m210716_072724_create_relation_student_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex('students_index_1','{{%students}}','gender_id');
        $this->createIndex('students_index_2','{{%students}}','state_id');
        $this->createIndex('students_index_3','{{%students}}','region_id');
        $this->createIndex('students_index_4','{{%students}}','specialization_id');
        $this->createIndex('students_index_5','{{%students}}','course_id');
        $this->createIndex('students_index_6','{{%students}}','form_of_education_id');

        $this->addForeignKey('students_fk_1', '{{%students}}', 'gender_id', '{{%gender}}', 'id', 'cascade','cascade');
        $this->addForeignKey('students_fk_2', '{{%students}}', 'state_id', '{{%state}}', 'id', 'cascade','cascade');
        $this->addForeignKey('students_fk_3', '{{%students}}', 'region_id', '{{%regions}}', 'id', 'cascade','cascade');
        $this->addForeignKey('students_fk_4', '{{%students}}', 'specialization_id', '{{%specializations}}', 'id', 'cascade','cascade');
        $this->addForeignKey('students_fk_5', '{{%students}}', 'course_id', '{{%course}}', 'id', 'cascade','cascade');
        $this->addForeignKey('students_fk_6', '{{%students}}', 'form_of_education_id', '{{%form_education}}', 'id', 'cascade','cascade');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('students_index_1', '{{%students}}');
        $this->dropIndex('students_index_2', '{{%students}}');
        $this->dropIndex('students_index_3', '{{%students}}');
        $this->dropIndex('students_index_4', '{{%students}}');
        $this->dropIndex('students_index_5', '{{%students}}');
        $this->dropIndex('students_index_6', '{{%students}}');
        $this->dropForeignKey('students_fk_1', '{{%students}}');
        $this->dropForeignKey('students_fk_2', '{{%students}}');
        $this->dropForeignKey('students_fk_3', '{{%students}}');
        $this->dropForeignKey('students_fk_4', '{{%students}}');
        $this->dropForeignKey('students_fk_5', '{{%students}}');
        $this->dropForeignKey('students_fk_6', '{{%students}}');
        $this->dropTable('{{%relation_student}}');
    }
}
