<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Repositorio de Documentos</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://localhost:8080/proyecto/css/bootstrap4.css">
		<link rel="stylesheet" href="http://localhost:8080/proyecto/css/style.css">
		<script src="http://localhost:8080/proyecto/js/jquery-1.10.2.js"></script>
		<script src="http://localhost:8080/proyecto/js/funciones.js"></script>
		<script src="http://localhost:8080/proyecto/js/bootstrap.js"></script>

		<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>-->
		<script src="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/jquery-ui.js"></script>
		<link href="http://ajax.aspnetcdn.com/ajax/jquery.ui/1.8.9/themes/blitzer/jquery-ui.css" rel="stylesheet"/>

		<style>
		.ui-dialog.ui-widget.ui-widget-content.ui-corner-all.ui-draggable.ui-resizable {
		width: 850px !important;
		height: 500px !important;
		left: 215px !important;
		top: 450px;

		}
		.ui-dialog-titlebar.ui-widget-header.ui-corner-all.ui-helper-clearfix {
		background: #3C3C3C;
		}
		</style>


	</head>

	<!--<body uri="<?php echo 'http://localhost:8080/proyecto'; ?>">-->
	<body uri="<?php echo base_url(); ?>">

		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
					<div class="navbar-header">
		    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
	    			</button>
						<a class="navbar-brand" href="<?php echo base_url('home');?>">REPOSITORIO</a>
	    			<?php //echo 'BIBLIOTECA', array('class' => 'navbar-brand')); ?>
		  		</div>

		  		<div class="navbar-collapse collapse navbar-responsive-collapse">
			  		<ul class="nav navbar-nav navbar-float">
			  			<?php //if($this->session->accesoView('')): ?>
			  			<li class="<?php //echo $libros_class;?>">
			  				<?php //echo anchor('libros', 'Libros');?>
			  			</li>
			  			<?php //endif; ?>

						<?php //if($this->session->accesoView('Administrador')): ?>
						<li class="<?php //echo $usuario_class;?>">
							<?php //echo anchor('usuarios', 'Usuarios');?>
						</li>
						<?php //endif; ?>
				    </ul>

					<?php //if( ! $this->session->userdata('is_logued_in')): ?>
				    <ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<span class="glyphicon glyphicon-user"></span>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<!--<a href="http://localhost:8080/proyecto/application/controllers/Welcome">Iniciar Sesion</a>-->
								<li><a href="<?php echo base_url('Login');?>">Iniciar Sesion</a></li>
								<li><a href="<?php echo base_url('usuarios');?>">Crear Cuenta</a></li>
								<li><?php //echo anchor('usuarios/login', 'Iniciar Sesion'); ?></li>
								<li><?php //echo anchor('usuarios/create', 'Crear Cuenta');?></li>
							</ul>
						</li>
				    </ul>
					<?php //else: ?>

					<!--<ul class="nav navbar-nav navbar-right">
					    <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<span class="glyphicon glyphicon-user"></span>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><?php //echo anchor('usuarios/update_pass', 'Modificar Contraseña'); ?></li>
								<li><?php //echo anchor('usuarios/update_info', 'Modificar Info'); ?></li>
								<li class="divider"></li>
								<li><?php //echo anchor('usuarios/salir', 'Salir',
									//array('data-toggle' => 'modal',
										  //'data-target' => '#modal_salir'));?></li>
							</ul>

						</li>
					</ul>-->
					<?php //endif; ?>

				    <!--<div class="navbar-form navbar-right">
				    	<div class="input-group">
				    		<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
				     		<input class="form-control col-lg-4" id="query_docs_header" placeholder="Titulo/Autor/Editorial" type="text">
				     	</div>-->
				    </div>
			  	</div>
			</div>
		</nav>

		<div id="contenido">

			<div class="modal fade" id="modal_salir" tabindex="-1" role="dialog" aria-labelledby="modal_salirLabel" aria-hidden="true">
				<div class="modal-dialog">
			    	<div class="modal-content">
			    	</div>
			  	</div>
			</div>

			<div class="modal fade" id="modal_mensajes" tabindex="-1" role="dialog" aria-labelledby="modal_mensajesLabel" aria-hidden="true">
				<div class="modal-dialog">
			    	<div class="modal-content">
			    		<div class="modal-header">
				        	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				        	<h4 class="modal-title" id="modal_mensajesLabel">titulo</h4>
				      	</div>
				      	<div class="modal-body">
				        	body
				      	</div>
				      	<div class="modal-footer">
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Aceptar</button>
				      	</div>
			    	</div>
			  	</div>
			</div>

<!--hasta aca el heaterrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr-->
		<header>
			<div class="container-fluid">
				<h1 class="text-center"><strong>Bienvenido al Repositorio de Documentos</strong></h1>
				<?php //echo $nombre?>
				<p class="small text-center">-</p>
				<p class="small text-center"></p>

			</div>
		</header>

		<section class="container-fluid paddin-topottom-md">

			<h1 class="text-center">Busqueda</h1>

			<div class="input-group">
	    		<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
	     		<input class="form-control input-lg" id="camp_query_docs" placeholder="Titulo del Documento" type="text">
	     		<span class="input-group-btn">
		      		<button class="btn btn-default input-lg" id="btn_query_docs" type="button">Buscar</button>
		    	</span>
	     	</div>
	     	<div id="resultados_docs" class="table-responsive paddin-topottom-sm">
	     		<h2 id="result-mensaje" class="text-center"></h2>

					<!--<div id="dialogmostrar" style="display: none;">
					<div>
					<iframe style="width:100%" height="500px" id="framem"></iframe>
					</div>
				</div> -->
<!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#miModal">Abrir Modal</button>-->


	     		<table class='table table-hover table-striped'>

	     		</table>
				</div>
		</section>

<!--desde aca el footerrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr-->

</div>
<footer>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <span class="copyright">
          Copyright © 2020
        </span>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <span class="copyright">
          Creado por Erick Aguilar Lozano
        </span>
      </div>
    </div>
  </div>
</footer>
</body>
</html>
