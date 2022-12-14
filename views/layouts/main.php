<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    $items = [];
    if (Yii::$app->user->isGuest){

        $items[]=['label' => 'О нас', 'url' => ['/site/about']];
        $items[]=['label' => 'Где нас найти', 'url' => ['/site/geolacation']];
        $items[]=['label' => 'Товары', 'url' => ['/site/product']];
        $items[]=['label' => 'Регистрация', 'url' => ['/user/create']];
        $items[]=['label' => 'Войти', 'url' => ['/site/login']];
    } else {
        if (Yii::$app->user->identity->admin == 1) {

            $items[] = ['label' => 'О нас', 'url' => ['/site/about']];
            $items[] = ['label' => 'Где нас найти', 'url' => ['/site/geolacation']];
            $items[] = ['label' => 'Товары', 'url' => ['/site/product']];
            $items[] = ['label' => 'Админ панель', 'url' => ['/admin']];

        } else {

            $items[] = ['label' => 'О нас', 'url' => ['/site/about']];
            $items[] = ['label' => 'Где нас найти', 'url' => ['/site/geolacation']];
            $items[] = ['label' => 'Товары', 'url' => ['/site/product']];
        }
        $items[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->login . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $items,
//        'items' => [
//            ['label' => 'Home', 'url' => ['/site/index']],
//            ['label' => 'О нас', 'url' => ['/site/about']],
//            ['label' => 'Где нас найти', 'url' => ['/site/geolacation']],
//            ['label' => 'Товары', 'url' => ['/site/product']],
//            ['label' => 'Регистрация', 'url' => ['/user/create']],
//            Yii::$app->user->isGuest ? (
//                ['label' => 'Login', 'url' => ['/site/login']]
//            ) : (
//                '<li>'
//                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
//                . Html::submitButton(
//                    'Logout (' . Yii::$app->user->identity->login . ')',
//                    ['class' => 'btn btn-link logout']
//                )
//                . Html::endForm()
//                . '</li>'
//            )
//        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; My Company <?= date('Y') ?></p>
        <p class="float-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
