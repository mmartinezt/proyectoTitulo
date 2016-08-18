<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\TipoEmpleado;
use yii\Helpers\ArrayHelper;
use yii\helpers\Url;
use himiklab\colorbox\Colorbox;

$tiposEmpleados=ArrayHelper::map(TipoEmpleado::find()->all(),'id_tipo_empleado', 'descripcion', 'nombre_tipo_empleado');

?>
<?= Colorbox::widget([
    'targets' => [
        '.colorbox' => [
            'maxWidth' => '90%',
            'maxHeight' => '100%',
        ],
    ],
    'coreStyle' => 1
]) ?>

<div class="empleado-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'rut_empleado')->textInput(['maxlength' => true, 'placeholder'=>'Ingrese Rut... ejemplo: 11.111.111-1', 'onblur'=>'val()']) ?>
	
	<i class="fa">
		   <?= $form->field($model, 'id_tipo_empleado')->dropDownList($tiposEmpleados, ['prompt'=>'Seleccione Tipo de Empleado...']) ?>
	</i>
	<a class="colorbox" href="<?php echo(Url::toRoute('tipo-empleado/create2')); ?>"> <input class="btn btn-warning" type="button" value="Agregar nuevo tipo de empleado"></input></a>	
	
	<br>



    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido_paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido_materno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'correo_electronico')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<script> 

function val(){
	Rut(document.getElementById("empleado-rut_empleado").value);
}

function revisarDigito( dvr )
{	
	dv = dvr + ""	
	if ( dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k'  && dv != 'K')	
	{		
		alert("Debe ingresar un digito verificador valido");		
		document.getElementById("empleado-rut_empleado").focus();		
		document.getElementById("empleado-rut_empleado").select();		
		return false;	
	}	
	return true;
}

function revisarDigito2( crut )
{	

	largo = crut.length;	
	if ( largo < 2 )	
	{		
		alert("Debe ingresar el rut completo")		
		document.getElementById("empleado-rut_empleado").focus();		
		document.getElementById("empleado-rut_empleado").select();		
		return false;	
	}	
	if ( largo > 2 )		
		rut = crut.substring(0, largo - 1);	
	else		
		rut = crut.charAt(0);	
	dv = crut.charAt(largo-1);	
	revisarDigito( dv );	

	if ( rut == null || dv == null )
		return 0	

	var dvr = '0'	
	suma = 0	
	mul  = 2	

	for (i= rut.length -1 ; i >= 0; i--)	
	{	
		suma = suma + rut.charAt(i) * mul		
		if (mul == 7)			
			mul = 2		
		else    			
			mul++	
	}	
	res = suma % 11	
	if (res==1)		
		dvr = 'k'	
	else if (res==0)		
		dvr = '0'	
	else	
	{		
		dvi = 11-res		
		dvr = dvi + ""	
	}
	if ( dvr != dv.toLowerCase() )	
	{		
		alert("EL rut es incorrecto")		
		document.getElementById("empleado-rut_empleado").focus();		
		document.getElementById("empleado-rut_empleado").select();		
		return false	
	}

	return true
}

function Rut(texto)
{	

	var tmpstr = "";	
	for ( i=0; i < texto.length ; i++ )		
		if ( texto.charAt(i) != ' ' && texto.charAt(i) != '.' && texto.charAt(i) != '-' )
			tmpstr = tmpstr + texto.charAt(i);	
	texto = tmpstr;	
	largo = texto.length;	

	if ( largo < 2 )	
	{		
		alert("Debe ingresar el rut completo")		
		document.getElementById("empleado-rut_empleado").focus();		
		document.getElementById("empleado-rut_empleado").select();		
		return false;	
	}	

	for (i=0; i < largo ; i++ )	
	{			
		if ( texto.charAt(i) !="0" && texto.charAt(i) != "1" && texto.charAt(i) !="2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) !="5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) !="8" && texto.charAt(i) != "9" && texto.charAt(i) !="k" && texto.charAt(i) != "K" )
 		{			
			alert("El valor ingresado no corresponde a un R.U.T valido");			
			document.getElementById("empleado-rut_empleado").focus();			
			document.getElementById("empleado-rut_empleado").select();			
			return false;		
		}	
	}	

	var invertido = "";	
	for ( i=(largo-1),j=0; i>=0; i--,j++ )		
		invertido = invertido + texto.charAt(i);	
	var dtexto = "";	
	dtexto = dtexto + invertido.charAt(0);	
	dtexto = dtexto + '-';	
	cnt = 0;	

	for ( i=1,j=2; i<largo; i++,j++ )	
	{		
		//alert("i=[" + i + "] j=[" + j +"]" );		
		if ( cnt == 3 )		
		{			
			dtexto = dtexto + '.';			
			j++;			
			dtexto = dtexto + invertido.charAt(i);			
			cnt = 1;		
		}		
		else		
		{				
			dtexto = dtexto + invertido.charAt(i);			
			cnt++;		
		}	
	}	

	invertido = "";	
	for ( i=(dtexto.length-1),j=0; i>=0; i--,j++ )		
		invertido = invertido + dtexto.charAt(i);	 		

	if ( revisarDigito2(texto) ){		
		document.getElementById("empleado-rut_empleado").value = invertido.toUpperCase(); 
		return true;	
		}

	return false;
}


</script>
