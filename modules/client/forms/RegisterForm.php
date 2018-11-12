<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 12.11.2018
 * Time: 14:14
 */

namespace app\modules\client\forms;


use app\modules\client\models\User;
use yii\base\Model;

class RegisterForm extends Model
{

    public $name;

    public $email;

    public $password;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\modules\client\models\User', 'message' => 'Данный email занят'],
            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function register()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();

        $user->name = $this->name;
        $user->email = $this->email;
        $user->activity_status = User::STATUS_ACTIVE;
        $user->setPassword($this->password);

        return $user->save() ? $user : null;
    }

}