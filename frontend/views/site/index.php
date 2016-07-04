<?php
use yii\helpers\Url;
use backend\models\CategoriaProducto;
use backend\models\SubcategoriaProducto;
use yii\Helpers\ArrayHelper;

$categorias=ArrayHelper::map(CategoriaProducto::find()->all(),'id_categoria_producto','nombre');

/* @var $this yii\web\View */
?>
    <div class="body-content">


<table width = "100%" weight="500px" border="1" style="border-collapse:collapse;">
	<tr>
		<td width ="100%" >	
			slider ofertas y promociones
		</td>
	</tr>
	<tr style="border:none;">
		<td width ="100%" >	
			slider 1... slider 2... slider 3...
		</td>
	</tr>
	<tr>
		<td width="10%" style="text-align:center; margin:100px; padding:100px;">cuerpo de slider</td>
	</tr>
	<tr style="border:none;">
		<td width ="100%" style="text-align: right">	
			control de slider
		</td>
	</tr>
</table>
<br/>
<br/>
<br/>
<table width="100%" border="1">
<tr>
	<td width="18%"> Categorías productos</td>
	<td width="82%"> Slider publicidad de la empresa, folletos, medios de pagos, descuentos del mes etc...</td>
</tr>	
</table>

    
<nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
		<div class="navbar-header">
		  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
			<span class="sr-only">Categorías de Productos</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </button>      
		</div>
	
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
		<?php
			foreach($categorias as $id => $nombre){
				$subcategorias=ArrayHelper::map(SubcategoriaProducto::find()->where(['id_categoria_producto' => $id])->all(),'id_subcategoria_producto','nombre');
		?>
		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo($nombre); ?> <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
				<?php
					foreach($subcategorias as $idSubcategoria => $nombre2){
				?>
					<li><a href="<?php echo(Url::toRoute(['producto/vitrina', 'id' => $idSubcategoria])); ?>"><?php echo($nombre2); ?></a></li>
				<?php
					}
				?>
          </ul>
        </li>          
		
		<?php
			}
		?>
		
		
      </ul>
    </div>
  </div>
</nav>
	 

<div style="padding: 10px; float: right; width: 75%; text-align: right;">
		<center>
		
			<img src="images/banner1.jpg" />
		
			<br/>
		</center>
		<span>(Imagen referencial)</span>
		
	<table width="100%" border="1" align="center">
		<tr>
			<td width="25%" align="center" style="margin:30px; padding:30px;"> banner1</td>
			<td width="25%" align="center"> banner2</td>
			<td width="25%" align="center"> banner3</td>
		</tr>	
		
	</table>
		
	
</div>
</br></br></br></br></br></br></br></br>
</br></br></br></br></br></br></br></br>
</br></br></br></br></br></br></br></br>
</br></br></br>

<center>
Logos de empresas asociados
</br>
ctrl izquierda
<img src="images/logos.png"/>
ctrl derecha
</br>
(imagen referencial)
</center>


    </div>
</div>

<style>
body,html{
    height: 100%;
  }

  nav.sidebar, .main{
    -webkit-transition: margin 200ms ease-out;
      -moz-transition: margin 200ms ease-out;
      -o-transition: margin 200ms ease-out;
      transition: margin 200ms ease-out;
  }

  .main{
    padding: 10px 10px 0 10px;
  }

 @media (min-width: 765px) {

    .main{
      position: absolute;
      width: calc(100% - 40px); 
      margin-left: 40px;
      float: right;
    }

    nav.sidebar:hover + .main{
      margin-left: 200px;
    }

    nav.sidebar.navbar.sidebar>.container .navbar-brand, .navbar>.container-fluid .navbar-brand {
      margin-left: 0px;
    }

    nav.sidebar .navbar-brand, nav.sidebar .navbar-header{
      text-align: center;
      width: 100%;
      margin-left: 0px;
    }
    
    nav.sidebar a{
      padding-right: 13px;
    }

    nav.sidebar .navbar-nav > li:first-child{
      border-top: 1px #e5e5e5 solid;
    }

    nav.sidebar .navbar-nav > li{
      border-bottom: 1px #e5e5e5 solid;
    }

    nav.sidebar .navbar-nav .open .dropdown-menu {
      position: static;
      float: none;
      width: auto;
      margin-top: 0;
      background-color: transparent;
      border: 0;
      -webkit-box-shadow: none;
      box-shadow: none;
    }

    nav.sidebar .navbar-collapse, nav.sidebar .container-fluid{
      padding: 0 0px 0 0px;
    }

    .navbar-inverse .navbar-nav .open .dropdown-menu>li>a {
      color: #777;
    }

    nav.sidebar{
      width: 200px;
      height: 100%;
      margin-left: -160px;
      float: left;
      margin-bottom: 0px;
    }

    nav.sidebar li {
      width: 100%;
    }

    nav.sidebar:hover{
      margin-left: 0px;
    }

    .forAnimate{
      opacity: 0;
    }
  }
   
  @media (min-width: 1330px) {

    .main{
      width: calc(100% - 200px);
      margin-left: 200px;
    }

    nav.sidebar{
      margin-left: 0px;
      float: left;
    }

    nav.sidebar .forAnimate{
      opacity: 1;
    }
  }

  nav.sidebar .navbar-nav .open .dropdown-menu>li>a:hover, nav.sidebar .navbar-nav .open .dropdown-menu>li>a:focus {
    color: #CCC;
    background-color: transparent;
  }

  nav:hover .forAnimate{
    opacity: 1;
  }
  section{
    padding-left: 15px;
  }
</style>

