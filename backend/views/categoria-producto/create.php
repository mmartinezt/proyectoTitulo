<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\CategoriaProducto */

$this->title = 'Create Categoria Producto';
$this->params['breadcrumbs'][] = ['label' => 'Categoria Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-producto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
