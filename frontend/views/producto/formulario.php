<?php

use yii\helpers\Html;



/* @var $this yii\web\View */
/* @var $model backend\models\Cotizacion */

$this->title = 'Datos de cotización';
?>
<div class="cotizacion-create">

    <h1><?= Html::encode($this->title) ?></h1>
	
    <?= $this->render('_formulario', [
        'model' => $model,
    ]) ?>

</div>
