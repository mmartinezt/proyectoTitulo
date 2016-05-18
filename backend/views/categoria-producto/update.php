<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\CategoriaProducto */

$this->title = 'Update Categoria Producto: ' . $model->id_tipo_producto;
$this->params['breadcrumbs'][] = ['label' => 'Categoria Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo_producto, 'url' => ['view', 'id' => $model->id_tipo_producto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categoria-producto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
