<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


?>


<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

   
    <?php
		echo Html::a('<i class="fa glyphicon glyphicon-open-file"></i> Exportar a PDF', ['/cotizacion/pdf'], [
										'class'=>'btn btn-warning',  
										'data-toggle'=>'tooltip', 
										'title'=>'Cotizacion formal exportada a PDF'
									]);
		?>

    <?php ActiveForm::end(); ?>

</div>
