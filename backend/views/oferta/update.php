<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Oferta */

$this->title = 'Actualizar Oferta: ' . $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Ofertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_oferta, 'url' => ['view', 'id' => $model->id_oferta]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="oferta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
