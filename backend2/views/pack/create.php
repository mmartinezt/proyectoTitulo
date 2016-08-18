<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pack */

$this->title = 'Crear Pack';
$this->params['breadcrumbs'][] = ['label' => 'Packs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pack-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
