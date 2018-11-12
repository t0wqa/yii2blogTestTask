<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 12.11.2018
 * Time: 10:44
 */

namespace app\modules\client\controllers;


use app\modules\client\forms\LoginForm;
use app\modules\client\forms\RegisterForm;
use yii\base\Module;
use yii\web\Controller;

class UserController extends Controller
{

    public function __construct(string $id, Module $module, array $config = [])
    {
        parent::__construct($id, $module, $config);

        $this->layout = \app\modules\main\Module::getInstance()->layoutPath;
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(\Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();

        if ($model->load(\Yii::$app->request->post())) {
            if ($user = $model->register()) {
                if (\Yii::$app->user->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('register', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();
        return $this->goHome();
    }

}