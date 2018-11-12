<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 12.11.2018
 * Time: 10:11
 */

namespace app\modules\client\models;


class PostUser extends User
{

    public function fields()
    {
        return [
            'user_id' => 'id',
            'name' => 'name'
        ];
    }

}