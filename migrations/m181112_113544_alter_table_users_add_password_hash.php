<?php

use yii\db\Migration;

/**
 * Class m181112_113544_alter_table_users_add_password_hash
 */
class m181112_113544_alter_table_users_add_password_hash extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(
            'users',
            'password_hash',
            \yii\db\Schema::TYPE_STRING
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(
            'users',
            'password_hash'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181112_113544_alter_table_users_add_password_hash cannot be reverted.\n";

        return false;
    }
    */
}
