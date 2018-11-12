<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 12.11.2018
 * Time: 6:26
 */

namespace app\modules\client\controllers;


use app\modules\client\forms\CreatePostForm;
use app\modules\client\models\Post;
use yii\base\Module;
use yii\web\Controller;

class PostController extends Controller
{

    /**
     * PostController constructor.
     * @param string $id
     * @param Module $module
     * @param array $config
     */
    public function __construct(string $id, Module $module, array $config = [])
    {
        parent::__construct($id, $module, $config);

        $this->layout = \app\modules\main\Module::getInstance()->layoutPath;
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $model = new Post();
        $items = $model->findAllWithAuthor();

        $createPostForm = new CreatePostForm();

        return $this->render('index', [
            'items' => $items,
            'createPostForm' => $createPostForm,
            'title' => 'Все посты'
        ]);
    }

    /**
     * @return \yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CreatePostForm();

        if ($model->load(\Yii::$app->request->post())) {
            if ($post = $model->saveInDb()) {
                return $this->goHome();
            }
        }
    }

    /**
     * @return string
     * @throws \Throwable
     */
    public function actionFavorites()
    {
        $model = \Yii::$app->user->getIdentity();
        $items = $model->favorites;

        $createPostForm = new CreatePostForm();

        return $this->render('index', [
            'items' => $items,
            'createPostForm' => $createPostForm,
            'title' => 'Избранное'
        ]);
    }

    /**
     * @param $postId
     * @return \yii\web\Response
     */
    public function actionToggleFavorite($postId)
    {
        $postModel = Post::findOne($postId);

        if ($postModel && $postModel->toggleFavorite()) {
            return $this->refresh();
        }

        return $this->goHome();
    }

}