<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MarcaProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Marca de Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marca-producto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Marca de Producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_marca_producto',
            'nombre',
            'descripcion',
            'procedencia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
