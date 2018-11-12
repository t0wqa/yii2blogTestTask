<?php

use yii\db\Migration;

/**
 * Class m181112_062718_create_constraints_on_posts
 */
class m181112_062718_create_constraints_on_posts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey(
            'fk-posts-id-users-user_id',
            'posts',
            'user_id',
            'users',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-posts-id-users-user_id',
            'posts'
        );
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181112_062718_create_constraints_on_posts cannot be reverted.\n";

        return false;
    }
    */
}
