<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vitrina de Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producto-index">

    <h1><?= Html::encode($this->title) ?></h1>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			
			[
				 'attribute' => 'img',
				 'label'=>'Imagen',
				 'format'=>'html',
				 'value' => function($data){ return Html::img(Yii::$app->request->baseUrl.'/upload/productos/'.$data->path_imagen,['width'=>'80']);  }
			],
            [
				 'attribute' => 'categoria',
				 'label'=>'Categoría',
				 'value' => 'categoria.nombre'
			],
			
            [
				 'attribute' => 'subcategoria',
				 'label'=>'Sub-categoría',
				 'value' => 'subcategoria.nombre'
			 ],
            'nombre_producto',
		
            [
				 'attribute' => 'marca',
				 'label'=>'Marca',
				 'value' => 'marca.nombre'
			 ],
		  
		  
            
            //'descripcion',
            // 'stock',
            // 'path_imagen',
            // 'precio_compra',
            // 'precio_venta',


			['class' => 'yii\grid\ActionColumn','template'=>'{agregar}',  'buttons' => [
                        'agregar' => function ($url, $model) {
									return Html::a('<span class="glyphicon glyphicon-shopping-cart"></span>', $url, 
									[
										'title' => Yii::t('app', 'Change today\'s lists'),
									]);
                    }
                ],],
			
				
				
				
        ],
    ]); ?>
</div>
