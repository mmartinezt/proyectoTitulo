<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use kartik\select2\Select2;
?>

<div class="producto-form">

    <?php $form = ActiveForm::begin(); ?>
	<table width="100%">
		<tr>
			<td width="1%" BGCOLOR="#A4A4A4"></td>
			<td width="45%" align="center" BGCOLOR="#A4A4A4"><h2>Datos de Cotización</h2></td>
			<td width="1%" BGCOLOR="#A4A4A4"></td>
			<td width="6%"></td>
			<td width="1%" BGCOLOR="#A4A4A4"></td>
			<td width="45%" align="center" BGCOLOR="#A4A4A4"><h2>Datos de Contacto</h2></td>
			<td width="1%" BGCOLOR="#A4A4A4"></td>
		</tr>
		
	</table>
	
	<table width="100%">
		<tr>			
			<td width="1%" BGCOLOR="#A4A4A4"></td>
			<td width="45%" BGCOLOR="#A4A4A4"><?= $form->field($model, 'nombre')->textInput(['placeholder'=>'Ingrese su nombre o Razón Social de empresa', 'required'=>true]) ?></td>
			<td width="1%" BGCOLOR="#A4A4A4"></td>
			<td width="6%"></td>
			<td width="1%" BGCOLOR="#A4A4A4"></td>
			<td width="45%" BGCOLOR="#A4A4A4"><?= $form->field($model, 'fono')->textInput(['placeholder'=>'Ingere número de contacto', 'required'=>true]) ?></td>
			<td width="1%" BGCOLOR="#A4A4A4"></td>
		</tr>
		
		<tr>
			<td width="1%" BGCOLOR="#A4A4A4"></td>
			<td width="45%" BGCOLOR="#A4A4A4"><?= $form->field($model, 'rut')->textInput(['placeholder'=>'Ingrese Rut... ejemplo: 11.111.111-1', 'onblur' => 'val()', 'required'=>true]) ?></td>
			<td width="1%" BGCOLOR="#A4A4A4"></td>
			<td width="6%"></td>
			<td width="1%" BGCOLOR="#A4A4A4"></td>
			<td width="45%" BGCOLOR="#A4A4A4"> <?= $form->field($model, 'correo')->input('email', ['placeholder'=>'Ingrese su correo electrónico', 'required'=>true]) ?></td>
			<td width="1%" BGCOLOR="#A4A4A4"></td>
		</tr>
    </table>
	
	</br>
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

<script> 

function val(){
	Rut(document.getElementById("producto-rut").value);
}

function revisarDigito( dvr )
{	
	dv = dvr + ""	
	if ( dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k'  && dv != 'K')	
	{		
		alert("Debe ingresar un digito verificador valido");		
		document.getElementById("producto-rut").focus();		
		document.getElementById("producto-rut").select();		
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
		document.getElementById("producto-rut").focus();		
		document.getElementById("producto-rut").select();		
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
		document.getElementById("producto-rut").focus();		
		document.getElementById("producto-rut").select();		
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
		document.getElementById("producto-rut").focus();		
		document.getElementById("producto-rut").select();		
		return false;	
	}	

	for (i=0; i < largo ; i++ )	
	{			
		if ( texto.charAt(i) !="0" && texto.charAt(i) != "1" && texto.charAt(i) !="2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) !="5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) !="8" && texto.charAt(i) != "9" && texto.charAt(i) !="k" && texto.charAt(i) != "K" )
 		{			
			alert("El valor ingresado no corresponde a un R.U.T valido");			
			document.getElementById("producto-rut").focus();			
			document.getElementById("producto-rut").select();			
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
		document.getElementById("producto-rut").value = invertido.toUpperCase(); 
		return true;	
		}

	return false;
}


</script>

