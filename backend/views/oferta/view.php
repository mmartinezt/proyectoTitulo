<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Oferta */

$this->title = $model->id_oferta;
$this->params['breadcrumbs'][] = ['label' => 'Ofertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="oferta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_oferta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_oferta], [
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
            'id_oferta',
            'id_producto',
            'valor_oferta',
            'descuento_porcentage',
            'descripcion',
        ],
    ]) ?>

</div>
