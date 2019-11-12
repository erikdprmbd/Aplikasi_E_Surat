<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title>Aplikasi E-SURAT</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' =>'E-SURAT',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
              ['label' => 'Home', 'url' => ['/site/index']],
              [
                  'label' => 'Data Master',
                  'items' => [
                       '<li class="dropdown-header">Induk</li>',
                       ['label' => 'User', 'url' => ['/users/index']],
                       ['label' => 'Jabatan', 'url' => ['/jabatan/index']],
                       ['label' => 'Golongan', 'url' => ['/golongan/index']],
                       ['label' => 'Instansi', 'url' => ['/instansi/index']],
                       ['label' => 'Sifat', 'url' => ['/sifat/index']],
                       ['label' => 'Jabatan User', 'url' => ['/jabatan_users/index']],
                       ['label' => 'Kategori Surat', 'url' => ['/kategori_surat/index']],
                       ['label' => 'Kategori Surat Keluar', 'url' => ['/kategori_sk/index']],
                  ],
              ],
              [
                  'label' => 'Data Surat',
                  'items' => [
                       '<li class="dropdown-header">SM</li>',
                       ['label' => 'Surat Masuk', 'url' => ['/surat_masuk/index']],
                       '<li class="dropdown-header">SK</li>',
                       ['label' => 'Surat Keluar', 'url' => ['/surat_keluar/index']],
                  ],
              ],
              [
                  'label' => 'Data A-D',
                  'items' => [
                       '<li class="dropdown-header">Approval</li>',
                       ['label' => 'Approval Rules Nodes', 'url' => ['/appoval_rn/index']],
                       ['label' => 'Approval Rules Edge', 'url' => ['/approval_re/index']],
                       ['label' => 'Approval Surat Keluar', 'url' => ['/approval_sk/index']],
                       '<li class="dropdown-header">Disposisi</li>',
                       ['label' => 'Disposisi Rules Nodes', 'url' => ['/disposisi_rn/index']],
                       ['label' => 'Disposisi Rules Edge', 'url' => ['/disposisi_re/index']],
                       ['label' => 'Disposisi Surat Masuk', 'url' => ['/disposisi_sm/index']],
                  ],
              ],
              ['label' => 'About', 'url' => ['/site/about']],
              ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);

    NavBar::end();

    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; ErikPriambodo@PENS-SURABAYA <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
