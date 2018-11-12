<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 12.11.2018
 * Time: 7:19
 */

namespace app\modules\client\models;


use yii\base\Model;
use yii\web\IdentityInterface;

class User extends \app\modules\main\models\User implements IdentityInterface
{

    const STATUS_ACTIVE = 1;
    const STATUS_BLOCKED = 2;

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPosts()
    {
        return $this->hasMany(Post::class, ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavorites()
    {
        return $this->hasMany(Post::class, ['id' => 'post_id'])
            ->viaTable('favorite_posts', ['user_id' => 'id']);
    }

    public function isPostFavorited(Model $post)
    {
        return self::find()
            ->from('favorite_posts')
            ->andWhere(['post_id' => $post->id])
            ->andWhere(['user_id' => \Yii::$app->user->getIdentity()->getId()])
            ->exists();
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'activity_status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {

    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * @param $password
     * @throws \yii\base\Exception
     */
    public function setPassword($password)
    {
        $this->password_hash = \Yii::$app->security->generatePasswordHash($password);
    }

}