<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\SubcategoriaProducto */

$this->title = 'Create Subcategoria Producto';
$this->params['breadcrumbs'][] = ['label' => 'Subcategoria Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subcategoria-producto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
