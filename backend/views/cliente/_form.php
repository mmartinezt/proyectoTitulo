<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use himiklab\colorbox\Colorbox;
use backend\models\Empresa;
use yii\Helpers\ArrayHelper;
use yii\helpers\Url;

	
	$marcas=ArrayHelper::map(Empresa::find()->all(),'rut_empresa','nombre_empresa');
?>

<?= Colorbox::widget([
    'targets' => [
        '.colorbox' => [
            'maxWidth' => '90%',
            'maxHeight' => '90%',
        ],
    ],
    'coreStyle' => 1
]) ?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

	</br>
    <i class="fa">
		<?= $form->field($model, 'rut_empresa')->dropDownList($marcas, ['prompt'=>'Seleccione Empresa...']) ?>
	</i>
	<a class="colorbox" href="<?php echo(Url::toRoute('empresa/create2')); ?>"> <input class="btn btn-primary" type="button" value="Agregar nueva Empresa"></input></a>	
	
	<br>
	
    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rut_cliente')->textInput(['maxlength' => true,'placeholder'=>'Ingrese Rut... ejemplo: 11.111.111-1', 'onblur' => 'val()']) ?>

    <?= $form->field($model, 'comuna')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ciudad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'calle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero')->textInput() ?>

    <?= $form->field($model, 'codigo_postal')->textInput() ?>
	
	Si no conoce su código postal puede obtenerlo desde <a href="http://www.correos.cl/SitePages/codigo_postal/codigo_postal.aspx" target="_blank">aquí</a>
	</br>
	</br>

    <?= $form->field($model, 'telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'celular')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualiza', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>



<script> 

function val(){

	Rut(document.getElementById("cliente-rut_cliente").value);
}

function revisarDigito( dvr )
{	
	dv = dvr + ""	
	if ( dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k'  && dv != 'K')	
	{		
		alert("Debe ingresar un digito verificador valido");		
		document.getElementById("cliente-rut_cliente").focus();		
		document.getElementById("cliente-rut_cliente").select();		
		return false;	
	}	
	return true;
}

function revisarDigito2( crut )
{	

	largo = crut.length;	
	if ( largo < 2 )	
	{		
		alert("Debe ingresar el rut completooooooo")		
		document.getElementById("cliente-rut_cliente").focus();		
		document.getElementById("cliente-rut_cliente").select();		
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
		document.getElementById("cliente-rut_cliente").focus();		
		document.getElementById("cliente-rut_cliente").select();		
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
		document.getElementById("cliente-rut_cliente").focus();		
		document.getElementById("cliente-rut_cliente").select();		
		return false;	
	}	

	for (i=0; i < largo ; i++ )	
	{			
		if ( texto.charAt(i) !="0" && texto.charAt(i) != "1" && texto.charAt(i) !="2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) !="5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) !="8" && texto.charAt(i) != "9" && texto.charAt(i) !="k" && texto.charAt(i) != "K" )
 		{			
			alert("El valor ingresado no corresponde a un R.U.T valido");			
			document.getElementById("cliente-rut_cliente").focus();			
			document.getElementById("cliente-rut_cliente").select();			
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
		document.getElementById("cliente-rut_cliente").value = invertido.toUpperCase(); 
		return true;	
		}

	return false;
}


</script>

