<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Cotizacion */

$this->title = 'Datos de cotización';
?>
<div class="cotizacion-create">

    <h1><?= Html::encode($this->title) ?></h1>
	<strong>
		solicitar datos de cotización </br>
		nombre:</br>
		Teléfono:</br>
		eMail:</br>
		¿desea instalación de servicios?</br>
	</strong>
		en caso que desee instalación, generar cliente_servicio_peticion  

    <?= $this->render('_formulario', [
        'model' => $model,
    ]) ?>

</div>
