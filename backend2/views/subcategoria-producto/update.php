<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SubcategoriaProducto */

$this->title = 'Actualizar Sub-categoría de Productos: ' . $model->id_subcategoria_producto;
$this->params['breadcrumbs'][] = ['label' => 'Sub-categoría de Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_subcategoria_producto, 'url' => ['view', 'id' => $model->id_subcategoria_producto]];
$this->params['breadcrumbs'][] = 'Actulizar';
?>
<div class="subcategoria-producto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
