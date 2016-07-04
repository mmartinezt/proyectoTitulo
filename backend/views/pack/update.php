<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Pack */

$this->title = 'Actualizar Pack: ' . $model->nombre;
$this->params['breadcrumbs'][] = ['label' => 'Packs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pack, 'url' => ['view', 'id' => $model->id_pack]];
$this->params['breadcrumbs'][] = 'actualizar';
?>
<div class="pack-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
