<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 12.11.2018
 * Time: 8:55
 */

namespace app\modules\main\controllers;


use yii\web\Controller;

class DefaultController extends Controller
{

    public function actionTest()
    {
        echo 123;die();
    }

}