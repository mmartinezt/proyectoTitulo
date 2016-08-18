<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Empresa */

$this->title = 'Actualizar Empresa: ' . $model->rut_empresa;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->rut_empresa, 'url' => ['view', 'id' => $model->rut_empresa]];
$this->params['breadcrumbs'][] = 'Actualizar';
?>
<div class="empresa-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
