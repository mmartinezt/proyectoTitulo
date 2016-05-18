<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\SubcategoriaProducto */

$this->title = 'Update Subcategoria Producto: ' . $model->id_categoria_prodcto;
$this->params['breadcrumbs'][] = ['label' => 'Subcategoria Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_categoria_prodcto, 'url' => ['view', 'id' => $model->id_categoria_prodcto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subcategoria-producto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
