<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ComentarioCotizacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comentario Cotizacions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comentario-cotizacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Comentario Cotizacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_comentario_cotizacion',
            'id_cotizacion',
            'id_usuario',
            'pregunta',
            'respuesta',
            // 'fecha',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
