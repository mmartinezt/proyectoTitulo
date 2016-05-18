<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pack */

$this->title = $model->id_pack;
$this->params['breadcrumbs'][] = ['label' => 'Packs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pack-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_pack], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_pack], [
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
            'id_pack',
            'nombre',
            'descripcion',
            'path_imagen',
            'precio',
            'estado',
        ],
    ]) ?>

</div>
