<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 12.11.2018
 * Time: 12:39
 */

namespace app\modules\admin\controllers;


use app\modules\main\models\Post;

class PostController extends AdminController
{

    public function actionIndex()
    {
        $items = Post::find()
            ->with('author')
            ->all();

        return $this->render('index', [
            'items' => $items
        ]);
    }

}