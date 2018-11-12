<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello Bulma!</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <style>
        .centered-content {
            margin: 0 auto;
        }

        .post-add {
            margin-bottom: 50px;
        }

        .card {
            width: 100% !important;
        }
    </style>
</head>
<body>
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a href="<?= \yii\helpers\Url::toRoute('post/index') ?>" class="navbar-item">
                Лента
            </a>

            <?php if (!Yii::$app->user->isGuest): ?>
                <a class="navbar-item">
                    Мои посты
                </a>
                <a href="<?= \yii\helpers\Url::toRoute('post/favorites') ?>" class="navbar-item">
                    Мое избранное
                </a>
            <?php endif; ?>

            <a href="/?r=admin/post/index" class="navbar-item">
                Админка
            </a>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
                <div class="buttons">
                    <?php if (!Yii::$app->user->isGuest): ?>
                        <a href="<?= \yii\helpers\Url::toRoute('user/logout') ?>" class="button is-light">
                            Выход (<?= Yii::$app->user->getIdentity()->email ?>)
                        </a>
                    <?php else: ?>
                        <a href="<?= \yii\helpers\Url::toRoute('user/register') ?>" class="button is-primary">
                            <strong>Регистрация</strong>
                        </a>
                        <a href="<?= \yii\helpers\Url::toRoute('user/login') ?>" class="button is-light">
                            Вход
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</nav>
<div class="container">
    <div class="columns">
        <div class="column is-6 centered-content">
            <?= $content; ?>
        </div>
    </div>
</div>
</body>
</html>

