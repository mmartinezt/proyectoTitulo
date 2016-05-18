<?php

/* @var $this yii\web\View */


?>
<div class="site-index">


<!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>0</h3>

              <p>Cantidad Productos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">Ver Todos <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>0<sup style="font-size: 20px"></sup></h3>

              <p>Promociones Activas</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">Ver Promociones <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>0</h3>

              <p>Servicios Pendientes</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">Ver Solicitud de Servicios pendientes <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>0</h3>

              <p>Cotizaciones Pendientes</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">Ver Cotizaciones Pendientes <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>

      <!-- /.row -->
	  
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-8 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
              <li class="active"><a href="#revenue-chart" data-toggle="tab">Gráfico Área</a></li>
              <li><a href="#sales-chart" data-toggle="tab">Gráfico Circular</a></li>
              <li class="pull-left header"><i class="fa fa-inbox"></i> Instalación Servicios</li>
            </ul>
            <div class="tab-content no-padding">
              <!-- Morris chart - Sales -->
              <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 345px;"></div>
              <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
            </div>
          </div>
          <!-- /.nav-tabs-custom -->
		  
		 </section> 
		  
		
        <!-- Left col -->
        <section class="col-lg-4 connectedSortable">
		
		<!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Últimas Cotizaciones Recibidas </h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo Yii::$app->request->baseUrl; ?>/images/user.jpg" class="img-circle" alt="User Image" />
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">ID cotización:
                      <span class="label label-success pull-right">05/05/2016</span></a>
                        <span class="product-description">
                          Descripción...
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo Yii::$app->request->baseUrl; ?>/images/user.jpg" class="img-circle" alt="User Image" />
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">ID cotización:
                      <span class="label label-success pull-right">05/05/2016</span></a>
                        <span class="product-description">
                          Descripción...
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo Yii::$app->request->baseUrl; ?>/images/user.jpg" class="img-circle" alt="User Image" />
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">ID cotización: 
						<span class="label label-success pull-right">05/05/2016</span></a>
                        <span class="product-description">
                          Descripción...
                        </span>
                  </div>
                </li>
                <!-- /.item -->
                <li class="item">
                  <div class="product-img">
                    <img src="<?php echo Yii::$app->request->baseUrl; ?>/images/user.jpg" class="img-circle" alt="User Image" />
                  </div>
                  <div class="product-info">
                    <a href="javascript:void(0)" class="product-title">ID cotización:
                      <span class="label label-success pull-right">05/05/2016</span></a>
                        <span class="product-description">
                          Descripción...
                        </span>
                  </div>
                </li>
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a href="javascript:void(0)" class="uppercase">Ver Todas las Cotizaciones</a>
            </div>
            <!-- /.box-footer -->
          </div>
       
		</section>
		</div>
		
		
</div>
