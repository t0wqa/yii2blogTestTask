<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 12.11.2018
 * Time: 8:22
 */

namespace app\modules\admin\models;


use yii\db\ActiveRecord;

class News extends ActiveRecord
{

    /**
     * @return string
     */
    public static function tableName()
    {
        return '{{news}}';
    }

}