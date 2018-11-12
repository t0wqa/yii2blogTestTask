<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 12.11.2018
 * Time: 17:13
 */

namespace app\modules\admin\controllers;


use app\modules\admin\models\User;

class UserController extends AdminController
{
    public function actionIndex()
    {
        $items = User::find()
            ->all();

        return $this->render('index', [
            'items' => $items
        ]);
    }

}