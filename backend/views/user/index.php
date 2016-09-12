<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Administrar cuentas de Usuario';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            
			[
			 'attribute'=>'id',
			 'options'=>['width'=>'3%'],
			],
			[
			 'attribute'=>'username',
			 'options'=>['width'=>'20%'],
			],
            //'auth_key',
            //'password_hash',
            //'password_reset_token',
             'email:email',
			[
				'attribute' => 'status',
				'options'=>['width'=>'10%'],
				'filter' => ['10'=>'Activado', '0'=>'Desactivado'],
				'format' => 'html',
				'value' => function($data){
								  return Html::a(Html::encode($data->status==10? 'Activado':'Desactivado'), '#',['class'=>$data->status==10? 'label btn-success':'label btn-warning']);
									},			
			],
            //'created_at',
            // 'updated_at',
			[
				'attribute' => 'role',
				'options'=>['width'=>'20%'],
				'filter' => ['1'=>'Cliente', '2'=>'Administrador'],
				'format' => 'html',
				'value' => function($data){
								  return Html::encode($data->role==1? 'Cliente':'Administrador');
									},			
			],
            ['class' => 'yii\grid\ActionColumn',
			'contentOptions' => ['style' => 'width:50px; font-size:23px;'],],
        ],
    ]); ?>
</div>
