<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\CotizacionProducto */

$this->title = 'Create Cotizacion Producto';
$this->params['breadcrumbs'][] = ['label' => 'Cotizacion Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cotizacion-producto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
