<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\Helpers\ArrayHelper;
use backend\models\CategoriaProducto;
use backend\models\SubcategoriaProducto;
use backend\models\MarcaProducto;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'Vitrina de Productos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class = "row">
<div class="col-lg-1">
</div>
<div class="col-lg-10">
<div class="producto-index">
<h1><?= Html::encode($this->title) ?></h1>



<?php    
$categorias=ArrayHelper::map(CategoriaProducto::find(array('order'=>'nombre'))->all(),'nombre','nombre');
$subcategorias=ArrayHelper::map(SubcategoriaProducto::find(array('order'=>'nombre'))->all(),'nombre','nombre');
$marcas=ArrayHelper::map(MarcaProducto::find(array('order'=>'nombre'))->all(),'nombre','nombre');

echo('<a href='.Yii::$app->request->baseUrl.'/index.php?r=producto%2Fagregar&id=0><img src='.Yii::$app->request->baseUrl.'/upload/productos/carrito-10.png style="position: fixed; top: 85px; right: 0px;" width=70></img></a>');	
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
					 'value' => 'categoria.nombre',
					 'filter'=> $categorias
				],
				
				[
					 'attribute' => 'subcategoria',
					 'label'=>'Sub-categoría',
					 'value' => 'subcategoria.nombre',
					 'filter'=> $subcategorias
				 ],
				 
				'nombre_producto',
			
				[
					 'attribute' => 'marca',
					 'label'=>'Marca',
					 'value' => 'marca.nombre',
					 'filter'=> $marcas
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
	<div class = "row">
	<div class="col-lg-1">
</div>

</div>
<script>
$("html, body").animate({
    scrollTop: 1
}, 2);
</script>
