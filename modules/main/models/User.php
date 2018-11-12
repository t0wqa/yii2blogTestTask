<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 12.11.2018
 * Time: 6:56
 */

namespace app\modules\main\models;


use yii\db\ActiveRecord;

class User extends ActiveRecord
{

    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{users}}';
    }

}