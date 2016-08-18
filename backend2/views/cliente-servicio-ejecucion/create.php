<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ClienteServicioEjecucion */

$this->title = 'Create Cliente Servicio Ejecucion';
$this->params['breadcrumbs'][] = ['label' => 'Cliente Servicio Ejecucions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-servicio-ejecucion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
