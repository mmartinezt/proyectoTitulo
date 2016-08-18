<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\PackProducto */

$this->title = 'Update Pack Producto: ' . $model->id_pack_producto;
$this->params['breadcrumbs'][] = ['label' => 'Pack Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pack_producto, 'url' => ['view', 'id' => $model->id_pack_producto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pack-producto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
