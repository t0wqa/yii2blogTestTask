<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 12.11.2018
 * Time: 12:42
 */

namespace app\modules\admin\controllers;


use app\modules\admin\models\News;

class NewsController extends AdminController
{

    public function actionIndex()
    {
        $items = News::find()
            ->all();

        return $this->render('index', [
            'items' => $items
        ]);
    }

}