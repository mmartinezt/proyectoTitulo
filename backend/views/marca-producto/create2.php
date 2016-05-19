<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MarcaProducto */

$this->title = 'Crear Marca de Producto';
$this->params['breadcrumbs'][] = ['label' => 'Marca de Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marca-producto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
