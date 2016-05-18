<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ClienteServicioPeticion */

$this->title = $model->id_cliente_servicio_peticion;
$this->params['breadcrumbs'][] = ['label' => 'Cliente Servicio Peticions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-servicio-peticion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_cliente_servicio_peticion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_cliente_servicio_peticion], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_cliente_servicio_peticion',
            'id_cliente',
            'id_cotizacion',
            'fecha',
        ],
    ]) ?>

</div>
