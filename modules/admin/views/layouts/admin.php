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

        .navbar {
            margin-bottom: 24px;
        }

        .navbar-menu {
            margin-left: 64px;
            margin-right: 64px;
        }

        .card {
            width: 100% !important;
        }
    </style>
</head>
<body>
<nav class="navbar is-warning" role="navigation" aria-label="main navigation">
    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a href="<?= \yii\helpers\Url::to('/') ?>" class="navbar-item">
                Клиентская часть
            </a>
        </div>

        <div class="navbar-end">
            <div class="navbar-item">
            </div>
        </div>
    </div>
</nav>
<div class="container is-fluid">
    <div class="columns">
        <div class="column is-3">
            <aside class="menu">
                <ul class="menu-list">
                    <li><a href="<?= \yii\helpers\Url::toRoute('user/index') ?>">Авторы</a></li>
                    <li><a href="<?= \yii\helpers\Url::toRoute('post/index') ?>">Посты</a></li>
                    <li><a href="<?= \yii\helpers\Url::toRoute('news/index') ?>">Новости компании</a></li>
                </ul>
            </aside>
        </div>
        <div class="column is-6">
            <?= $content ?>
        </div>
    </div>
</div>
</body>
</html>