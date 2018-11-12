<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 12.11.2018
 * Time: 6:56
 */

namespace app\modules\main\models;


use yii\db\ActiveRecord;

class Post extends ActiveRecord
{

    public static function tableName()
    {
        return '{{posts}}';
    }

    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

}