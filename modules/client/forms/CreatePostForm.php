<?php
/**
 * Created by PhpStorm.
 * User: t0wqa
 * Date: 12.11.2018
 * Time: 8:33
 */

namespace app\modules\client\forms;


use app\modules\client\models\Post;
use yii\base\Model;

class CreatePostForm extends Model
{

    public $text;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['text', 'required'],
            ['text', 'string', 'min' => 2, 'max' => 255]
        ];
    }

    public function saveInDb()
    {
        if (!$this->validate()) {
            return null;
        }

        $post = new Post();

        $post->link('author', \Yii::$app->user->getIdentity());
        $post->text = $this->text;
        $post->created_at = time();

        return $post->save() ? $post : null;
    }

}