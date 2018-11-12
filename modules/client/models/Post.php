<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 12.11.2018
 * Time: 10:00
 */

namespace app\modules\client\models;


class Post extends \app\modules\main\models\Post
{

    public function fields()
    {
        return [
            'id',
            'text',
            'created_at'
        ];
    }

    public function getAuthor()
    {
        return $this->hasOne(PostUser::class, ['id' => 'user_id']);
    }

    /**
     * @return array|\yii\db\ActiveRecord[]
     */
    public function findAllWithAuthor()
    {
        return self::find()
            ->with('author')
            ->orderBy('created_at DESC')
            ->all();
    }

    public function toggleFavorite()
    {
        /**
         * @var User $user
         */
        $user = \Yii::$app->user->getIdentity();

        if ($user->isPostFavorited($this)) {
            $user->unlink('favorites', $this, true);
        } else {
            $user->link('favorites', $this);
        }
    }

    /**
     * @param $id
     * @return Post
     */
    public static function createInstance($id)
    {
        if (!is_null($id) && null !== $instance = self::findOne($id)) {
            return $instance;
        }

        return new self();
    }

}