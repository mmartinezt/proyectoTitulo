<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$this->title = 'Usuario: '.$model->username;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$fecha_array = getdate($model->created_at);
$fecha_create = $fecha_array['mday'].'-'.$fecha_array['mon'].'-'.$fecha_array['year'].' '.$fecha_array['hours'].':'.$fecha_array['minutes'];

$fecha_array2 = getdate($model->updated_at);
$fecha_update = $fecha_array2['mday'].'-'.$fecha_array2['mon'].'-'.$fecha_array2['year'].' '.$fecha_array2['hours'].':'.$fecha_array2['minutes'];
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro que decea eliminar a este usuario?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'auth_key',
            'password_hash',
            //'password_reset_token',
            'email:email',
			[
			 'attribute' => 'status',
			 'value' => ($model->status == 10)? 'Activo':'Desactivo',
			],
            [
			 'attribute' => 'created_at',
			 'value' => $fecha_create,
			],
			[
			 'attribute' => 'updated_at',
			 'value' => $fecha_update,
			],
            [
			 'attribute' => 'role',
			 'value' => ($model->role==2)? 'Administrador':'Cliente',
			],
            
        ],
    ]) ?>

</div>
