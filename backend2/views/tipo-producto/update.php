<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\TipoProducto */

$this->title = 'Update Tipo Producto: ' . $model->id_tipo_producto;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_producto, 'url' => ['view', 'id' => $model->id_tipo_producto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-producto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
