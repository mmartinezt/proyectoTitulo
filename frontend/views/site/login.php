<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;


$this->title = 'Iniciar Sesión';
$this->params['breadcrumbs'][] = $this->title;

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-envelope form-control-feedback'></span>"
];
$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='glyphicon glyphicon-lock form-control-feedback'></span>"
];
?>
</br>

<center>

<div class="site-login">
    <div class="row">
		<div class="col-lg-4">
		</div>	
			<div class="col-lg-4">
			</br>
			<h1><?= Html::encode($this->title) ?></h1>

				</br>
					<p>Por favor, ingrese los siguientes campos para iniciar sesión:</p>
				<?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false]); ?>

					<?= $form
						->field($model, 'username', $fieldOptions1)
						->label(false)
						->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

					<?= $form
						->field($model, 'password', $fieldOptions2)
						->label(false)
						->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

					<?= $form->field($model, 'rememberMe')->checkbox() ?>

					<div style="color:#999;margin:1em 0">
						Si no recuerda su contraseña, precione <?= Html::a('resetear contraseña', ['site/request-password-reset']) ?>
					</div>
					<div class="form-group">
						<p><?= Html::submitButton('Iniciar Sesión', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?></p>
						
					</br>
					<div style="color:#999;margin:1em 0">
						Si no tiene cuenta, precione...
					</div>			
						<p><a href="<?php echo(\yii\helpers\Url::to(['site/signup']));?>" class="btn btn-success btn-block btn-flat">Crear cuenta</a></p>
						
<p><a href="<?php echo(\yii\helpers\Url::to(['site/auth', 'authclient'=>'facebook']));?>" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Iniciar sesión
                con Facebook</a></p>
					</div></p>
				
				<?php ActiveForm::end(); ?>
			</div>
	
		<div class="col-lg-4">
		</div>				
		
    </div>
	
	
</div>

</center>
<style>

.btn-group-vertical .btn.btn-flat:first-of-type,
.btn-group-vertical .btn.btn-flat:last-of-type {
  border-radius: 0;
}
.btn.btn-flat {
  border-radius: 0;
  -webkit-box-shadow: none;
  -moz-box-shadow: none;
  box-shadow: none;
  border-width: 1px;
}
.btn-facebook {
  color: #ffffff;
  background-color: #3b5998;
  border-color: rgba(0, 0, 0, 0.2);
}
.btn-facebook:focus,
.btn-facebook.focus {
  color: #ffffff;
  background-color: #2d4373;
  border-color: rgba(0, 0, 0, 0.2);
}
.btn-facebook:hover {
  color: #ffffff;
  background-color: #2d4373;
  border-color: rgba(0, 0, 0, 0.2);
}
.btn-facebook:active,
.btn-facebook.active,
.open > .dropdown-toggle.btn-facebook {
  color: #ffffff;
  background-color: #2d4373;
  border-color: rgba(0, 0, 0, 0.2);
}
.btn-facebook:active,
.btn-facebook.active,
.open > .dropdown-toggle.btn-facebook {
  background-image: none;
}
.btn-facebook .badge {
  color: #3b5998;
  background-color: #ffffff;
}
</style>