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
<?php
    
echo('<a href='.Yii::$app->request->baseUrl.'/index.php?r=producto%2Fagregar&id=0><img src='.Yii::$app->request->baseUrl.'/upload/productos/carrito-10.png style="position: fixed; top: 51px; right: 0px;" width=70></img></a>');	
?>	


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			
			[
				 'attribute' => 'img',
				 'label'=>'Imagen',
				 'format'=>'html',
				 'value' => function($data){ return Html::img(Yii::$app->request->baseUrl.'../../../backend/web/upload/productos/'.$data->path_imagen,['width'=>'80']);  }
			],
            [
				 'attribute' => 'categoria',
				 'label'=>'Categoría',
				 'value' => 'categoria.nombre'
			],
			
            [
				 'attribute' => 'id_subcategoria_producto',
				 'label'=>'Sub-categoría',
				 'value' => 'id_subcategoria_producto'
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
										'title' => Yii::t('app', 'Agregar al carrito'),
									]);
                    }
                ],],
			
				
				
				
        ],
    ]); ?>
</div>
