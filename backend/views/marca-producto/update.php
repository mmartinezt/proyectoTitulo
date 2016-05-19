<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MarcaProducto */

$this->title = 'Actualizar Marca de Producto: ' . $model->id_marca_producto;
$this->params['breadcrumbs'][] = ['label' => 'Marca de Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_marca_producto, 'url' => ['view', 'id' => $model->id_marca_producto]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="marca-producto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
