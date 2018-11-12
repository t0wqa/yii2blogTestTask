<?php

use yii\db\Migration;

/**
 * Class m181112_062858_create_constraints_on_users
 */
class m181112_062858_create_constraints_on_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'users-unique-email',
            'users',
            'email',
            true
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex(
            'users-unique-email',
            'users'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181112_062858_create_constraints_on_users cannot be reverted.\n";

        return false;
    }
    */
}
