<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>


<body>
<?php $this->beginBody() ?>

<div class="wrap">
<img src="images/logoweb.png"/>
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/logoweb.png', ['alt'=>Yii::$app->name]),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        //['label' => 'About', 'url' => ['/site/about']],
        //['label' => 'Contact', 'url' => ['/site/contact']],
		['label' => 'VITRINA DE PRODUCTOS', 'url' => ['/producto/vitrina', 'id'=>0]],
		
		   Yii::$app->user->isGuest ? (
					['label' => 'INICIAR SESIÓN', 'url' => ['/site/login']]
				) : 
					    [
                                'label' => 'ÁREA USUARIO',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
										(
											'<li><center><div class="avatar" style="background-image: url('.Yii::$app->request->baseUrl.'/images/usuario-registrado.jpg)"></div>'
											. Html::beginForm(['#'], 'post', ['class' => 'navbar-form'])
											. Html::Button(
												'Administrar cuenta',
												['class' => 'btn btn-success']
											)
											. Html::endForm()
											. '</li>'
										),
										(
											'<li>'
											. Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
											. Html::submitButton(
												'Cerrar Sesión (' . Yii::$app->user->identity->username . ')',
												['class' => 'btn btn-danger']
											)
											. Html::endForm()
											. '</li></center>'
										)
								
											],
                        ],
					
    ];

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
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
        <p class="pull-left">&copy; Smart Full Security <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<style>
div.avatar {
    
    height: 100px;
    width: 100px;
	border: PowderBlue 5px solid;
    
    background-repeat: no-repeat;
    background-position: 50%;
    border-radius: 50%;
    background-size: 100% auto;
}
</style>
