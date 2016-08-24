<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Iniciar Sesión';
$this->params['breadcrumbs'][] = $this->title;
?>
</br>
</br>
</br>
</br>

<center>
<div class="site-login">
    <div class="row">
		<div class="col-lg-4">
		</div>
			
			<div class="col-lg-4">
			<h1><?= Html::encode($this->title) ?></h1>

			<p>Por favor, ingrese los siguientes campos para iniciar sesión:</p>
</br>
				<?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

					<?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

					<?= $form->field($model, 'password')->passwordInput() ?>

					<?= $form->field($model, 'rememberMe')->checkbox() ?>

					<div style="color:#999;margin:1em 0">
						Si no recuerda su contraseña, precione <?= Html::a('resetear contraseña', ['site/request-password-reset']) ?>.
					</div>
</br>
					<div class="form-group">
						<?= Html::submitButton('Iniciar Sesión', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
					</div>
				
				<?php ActiveForm::end(); ?>
			</div>
		<div class="col-lg-4">
		</div>				
    </div>
</div>
</center>