<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Class m181112_062335_create_table_favorite_posts
 */
class m181112_062335_create_table_favorite_posts extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('favorite_posts', [
            'post_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'user_id' => Schema::TYPE_INTEGER . ' NOT NULL',
            'PRIMARY KEY(post_id, user_id)'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('favorite_posts');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181112_062335_create_table_favorite_posts cannot be reverted.\n";

        return false;
    }
    */
}
