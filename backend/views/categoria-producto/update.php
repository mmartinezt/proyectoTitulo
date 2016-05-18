<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoriaProducto */

$this->title = 'Actualizar Categoría de Productos: ' . $model->id_tipo_producto;
$this->params['breadcrumbs'][] = ['label' => 'Categoría Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_producto, 'url' => ['view', 'id' => $model->id_tipo_producto]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="categoria-producto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
