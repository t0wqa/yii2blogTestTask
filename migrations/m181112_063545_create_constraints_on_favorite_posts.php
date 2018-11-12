<?php

use yii\db\Migration;

/**
 * Class m181112_063545_create_constraints_on_favorite_posts
 */
class m181112_063545_create_constraints_on_favorite_posts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'favorite_posts-post_id',
            'favorite_posts',
            'post_id'
        );

        $this->createIndex(
            'favorite_posts-user_id',
            'favorite_posts',
            'user_id'
        );

        $this->addForeignKey(
            'fk-favorite_posts-post_id-posts-id',
            'favorite_posts',
            'post_id',
            'posts',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-favorite_posts-user_id-users-id',
            'favorite_posts',
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
        $this->dropIndex('favorite_posts-post_id', 'favorite_posts');
        $this->dropIndex('favorite_posts-user_id', 'favorite_posts');
        $this->dropForeignKey('fk-favorite_posts-post_id-posts-id', 'favorite_posts');
        $this->dropForeignKey('fk-favorite_posts-user_id-users-id', 'favorite_posts');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181112_063545_create_constraints_on_favorite_posts cannot be reverted.\n";

        return false;
    }
    */
}
