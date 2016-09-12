<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\select2\Select2;
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>

	
	<table width="100%" >
		<tr>
			<td width="35%" ></td>
				<td width="1%" BGCOLOR="green"></td>
				<td width="30%" BGCOLOR="green" align="center"><h3> <?= $form->field($model, 'instalacion')->dropDownList(['si' => 'Si', 'no' => 'No'], ['prompt'=>'Seleccione...', 'required'=>true]); ?></h3></td>
				<td width="1%" BGCOLOR="green"></td>
			<td width="35%"></td>
		</tr>
	</table>
		</br>
			</br>
	<center>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '<i class="fa glyphicon glyphicon-open-file"></i> Exportar a PDF' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-warning' : 'btn btn-primary']) ?>
    </div>
	</center>
    <?php ActiveForm::end(); ?>
	
	

</div>

