<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 12.11.2018
 * Time: 17:18
 */

namespace app\modules\admin\models;


class User extends \app\modules\main\models\User
{

    public function fields()
    {
        return ['id', 'name', 'email'];
    }

}