<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\PackProducto */

$this->title = 'Create Pack Producto';
$this->params['breadcrumbs'][] = ['label' => 'Pack Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pack-producto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
