<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ClienteServicioPeticion */

$this->title = 'Create Cliente Servicio Peticion';
$this->params['breadcrumbs'][] = ['label' => 'Cliente Servicio Peticions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-servicio-peticion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
