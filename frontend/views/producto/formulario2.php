<?php

use yii\helpers\Html;



/* @var $this yii\web\View */
/* @var $model backend\models\Cotizacion */

$this->title = 'Datos de cotización';
?>
<div class="cotizacion-create">
	
    <?= $this->render('_formulario2', [
        'model' => $model,
    ]) ?>

</div>
