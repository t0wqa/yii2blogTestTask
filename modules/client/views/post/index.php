<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>

<?php if (!Yii::$app->user->isGuest): ?>
    <?php $form = ActiveForm::begin(['id' => 'form-create-post', 'action' => \yii\helpers\Url::toRoute('post/create')]); ?>
        <div class="post-add">
            <div class="field">
                <label class="label">Текст</label>
                <div class="control">
                    <?= $form->field($createPostForm, 'text')->textarea(['class' => 'textarea']) ?>
                </div>
            </div>

            <div class="field">
                <div class="control">
                    <?= Html::submitButton('Добавить', ['class' => 'button is-link', 'name' => 'button-create-post']) ?>
                </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
<?php endif; ?>
    <div class="level">
        <strong><?= $title ?></strong>
    </div>
<?php foreach ($items as $item): ?>
    <div class="level">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    <?= $item->author->name ?>
                </p>
            </header>
            <div class="card-content">
                <div class="content">
                    <?= $item->text ?>
                    <br><br>
                    <strong><?= (new DateTime())->setTimestamp($item->created_at)->format('d.m.Y,  H:m:s') ?></strong>
                </div>
            </div>
            <footer class="card-footer">
                <a href="<?= \yii\helpers\Url::toRoute(['post/toggle-favorite', 'postId' => $item->id]) ?>" class="card-footer-item">Save</a>
            </footer>
        </div>
    </div>
<?php endforeach; ?>