<?php
use yii\helpers\Url;
use backend\models\CategoriaProducto;
use backend\models\SubcategoriaProducto;
use yii\Helpers\ArrayHelper;
use yii2mod\bxslider\BxSlider;

$categorias=ArrayHelper::map(CategoriaProducto::find()->all(),'id_categoria_producto','nombre');

/* @var $this yii\web\View */
?>


<div id="slideshow">
   <div align="center">
     <img src="http://www.automatec.cl/modules/mod_image_show_gk4/cache/banners.banner8CHgk-is-161.jpg">
   </div>
   <div align="center">
     <img src="http://www.automatec.cl/modules/mod_image_show_gk4/cache/banners.banner4CHgk-is-161.jpg">
   </div>

</div>

<style>
#slideshow { 
    margin: 0px 0px 30px auto; 
    position: relative; 
    width: 100%; 
    height: 200px; 
    padding: 10px; 
    box-shadow: 0 0 20px rgba(0,0,0,0.4); 
}

#slideshow > div { 
    position: absolute; 
    top: 10px; 
    left: 10px; 
    right: 10px; 
    bottom: 10px; 
}
</style>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script>
$("#slideshow > div:gt(0)").hide();

setInterval(function() { 
  $('#slideshow > div:first')
    .fadeOut(1000)
    .next()
    .fadeIn(1000)
    .end()
    .appendTo('#slideshow');
},  5000);
</script>



<div class="row">
  <div class="col-xs-2">
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
  </div>
  
  <div class="col-xs-7">
	<div style="padding: 10px; float: right; width: 75%; text-align: right;">
		<center>
		
			<img src="images/banner1.jpg" />
		
			<br/>
		</center>		
	</div>
  </div>
</div>
    
<br>
<br>
<center>
	<img src="images/logos.png"/>
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

