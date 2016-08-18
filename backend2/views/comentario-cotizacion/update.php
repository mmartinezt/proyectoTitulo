<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ComentarioCotizacion */

$this->title = 'Update Comentario Cotizacion: ' . $model->id_comentario_cotizacion;
$this->params['breadcrumbs'][] = ['label' => 'Comentario Cotizacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_comentario_cotizacion, 'url' => ['view', 'id' => $model->id_comentario_cotizacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comentario-cotizacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
