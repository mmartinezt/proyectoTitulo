<?php

use yii\helpers\Html;
use yii\grid\GridView;
use backend\models\CategoriaProducto;
use backend\models\SubcategoriaProducto;
use backend\models\MarcaProducto;
use yii\Helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrar Productos';
$this->params['breadcrumbs'][] = $this->title;
$categorias=ArrayHelper::map(CategoriaProducto::find(array('order'=>'nombre'))->all(),'nombre','nombre');
$subcategorias=ArrayHelper::map(SubcategoriaProducto::find(array('order'=>'nombre'))->all(),'nombre','nombre');
$marcas=ArrayHelper::map(MarcaProducto::find(array('order'=>'nombre'))->all(),'nombre','nombre');
?>
<div class="producto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Producto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
			[
				 'attribute' => 'img',
				 'label'=>'Imagen',
				 'format'=>'html',
				 'value' => function($data){ 
							 $imagen = ($data->path_imagen=='')? 'producto.jpg' : $data->path_imagen;
							 return Html::img(Yii::$app->request->baseUrl.'/upload/productos/'.$imagen ,['width'=>'80']);  }
			],
        
			[
				'attribute'=>'id_prodcto',
				'options'=>['width'=>'3%'],
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
				 'filter'=>$subcategorias
			 ],
            'nombre_producto',
            [
				 'attribute' => 'marca',
				 'label'=>'Marca',
				 'value' => 'marca.nombre',
				 'filter'=>$marcas
			 ],
			 
			 
			//'stock',
			// 'descripcion',
            // 'path_imagen',
            // 'precio_compra',
            // 'precio_venta',

            [
			 'class' => 'yii\grid\ActionColumn',
			 'contentOptions' => ['style' => 'width:50px; font-size:23px;'],
			],
        ],
    ]); ?>
</div>

