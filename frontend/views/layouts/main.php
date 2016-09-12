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
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="archivosIndex/images/ico/apple-touch-icon-144.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="archivosIndex/images/apple-touch-icon-72.png">
	<link rel="apple-touch-icon-precomposed" sizes="57x57"href="archivosIndex/images/ico/apple-touch-icon-57.png">
	<link rel="shortcut icon" href="archivosIndex/images/ico/favicon.ico">    
	<meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<style>
.navbar-inverse .nav li.dropdown.open > .dropdown-toggle,
.navbar-inverse .nav li.dropdown.active > .dropdown-toggle,
.navbar-inverse .nav li.dropdown.open.active > .dropdown-toggle {
  color: #ffffff;
  background-color: #111111;
}

.navbar {
    background: #181A1C;
    margin-bottom:0;
    min-height:70px;
}

.navbar-fixed-top {
    min-height:65px;
    height:65px;
    padding-top:0;
}
.navbar-inner {
    background: #181A1C;
    border-radius:0;
    filter: none;
    border: none;
    box-shadow: none;
}
.navbar .brand img {
    width:170px;
    height:45px;
}
.navbar .nav > li > a {
    text-transform:uppercase;
    line-height: ;
    vertical-align: middle;
    margin:10px 3px;
    -webkit-box-shadow: none;
    -moz-box-shadow: none;
    border: 1px solid #181A1C;
    box-shadow: none;
    font-size:15px;
    text-shadow: none;
    color: #fff;
    transition: border-color 1s ease;
}
.navbar .nav > li:hover> a, .navbar .nav > .active > a, .navbar .nav > .active > a:hover, .navbar .nav > .active > a:focus {
    border: 1px solid #FECE1A;
    color: #fff;
    background-color: #181A1C;
    transition: border-color 1s ease;
}
.nav-pills {
    margin-bottom: 30px;
}
.nav-pills > li > a {
    background: transparent;
    -webkit-border-radius: 0;
    -moz-border-radius: 0;
    border-radius: 0;
    margin-right:5px;
    padding-left:25px;
    padding-right:25px;
    border: 1px solid #181A1C;
}
.nav-pills > li > a:hover, .nav-pills > .active > a, .nav-pills > .active > a:hover, .nav-pills > .active > a:focus {
    background: #181A1C;
    color: #fff;
}
.navbar .btn-navbar:hover, .navbar .btn-navbar {
    border-radius:0;
    background:#FECE1A;
    color: #000;
}

.navbar .nav > li > .dropdown-menu:after {
  position: absolute;
  top: -6px;
  right: 10px;
  display: inline-block;
  border-right: 6px solid transparent;
  border-bottom: 6px solid #ffffff;
  border-left: 6px solid transparent;
  content: '';
}

body {
  background-color: #ECF0F5;
}



</style>

<body>

<?php $this->beginBody() ?>

<div class="wrap">


    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/logoweb.png', ['alt'=>Yii::$app->name]),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
		
    ]);
    $menuItems = [
        ['label' => 'INICIO', 'url' => ['/site/index']],
        //['label' => 'About', 'url' => ['/site/about']],
        //['label' => 'Contact', 'url' => ['/site/contact']],
		['label' => 'VITRINA DE PRODUCTOS', 'url' => ['/producto/vitrina', 'id'=>0]],		
		['label' => 'SERVICIOS', 'url' => Yii::$app->request->baseUrl.'#service'],
		['label' => 'Promociones', 'url' => Yii::$app->request->baseUrl.'#price'],
		['label' => 'Contacto', 'url' => Yii::$app->request->baseUrl.'#contact'],
		   Yii::$app->user->isGuest ? (
					['label' => 'INICIAR SESIÓN', 'url' => ['/site/login']]
				) : 
					    [
                                'label' => 'ÁREA USUARIO',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
										(
											'<center><div class="avatar" style="background-image: url('.Yii::$app->request->baseUrl.'/images/usuario-registrado.jpg)"></div>'
											.'<li>'
											. Html::beginForm(['/user/profile', 'id'=>Yii::$app->user->identity->id], 'post', ['class' => 'navbar-form'])
											. Html::submitButton(
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
											. '</center>'
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

    <div class="">
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
