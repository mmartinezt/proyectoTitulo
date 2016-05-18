<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ComentarioCotizacion */

$this->title = 'Create Comentario Cotizacion';
$this->params['breadcrumbs'][] = ['label' => 'Comentario Cotizacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comentario-cotizacion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
