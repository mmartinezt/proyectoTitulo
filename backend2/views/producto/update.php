<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Producto */

$this->title = 'Actualizar Producto: ' . $model->id_prodcto;
$this->params['breadcrumbs'][] = ['label' => 'Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_prodcto, 'url' => ['view', 'id' => $model->id_prodcto]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="producto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
