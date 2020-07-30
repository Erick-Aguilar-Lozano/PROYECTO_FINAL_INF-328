<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>biblioteca virtual</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="http://localhost:8080/proyecto/css/bootstrap4.css">
		<link rel="stylesheet" href="http://localhost:8080/proyecto/css/style.css">
		<script src="http://localhost:8080/proyecto/js/jquery-1.10.2.js"></script>
		<script src="http://localhost:8080/proyecto/js/funciones.js"></script>
		<script src="http://localhost:8080/proyecto/js/bootstrap.js"></script>
	</head>

	<body uri="<?php echo 'http://localhost:8080/proyecto'; ?>">
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
					<div class="navbar-header">
		    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
	    			</button>
						<li class="navbar-brand">BIBLIOTECA</li>
	    			<?php //echo 'BIBLIOTECA', array('class' => 'navbar-brand')); ?>
		  		</div>

		  		<div class="navbar-collapse collapse navbar-responsive-collapse">
			  		<ul class="nav navbar-nav navbar-float">
			  			<?php //if($this->session->accesoView('Catalogador')): ?>
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
								<a href="usuarios/login.php">Iniciar Sesion</a>
								<li><?php //echo anchor('usuarios/login', 'Iniciar Sesion'); ?></li>
								<li><?php //echo anchor('usuarios/create', 'Crear Cuenta');?></li>
							</ul>
						</li>
				    </ul>
					<?php //else: ?>

					<ul class="nav navbar-nav navbar-right">
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
					</ul>
					<?php //endif; ?>

				    <div class="navbar-form navbar-right">
				    	<div class="input-group">
				    		<span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
				     		<input class="form-control col-lg-4" id="query_docs_header" placeholder="Titulo/Autor/Editorial" type="text">
				     	</div>
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

<!--hasta aca el heaterrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr-->
		<section class="container-fluid paddin-topottom-lg">
			<ul class="breadcrumb">
				<li><?php echo anchor('', 'Inicio'); ?></li>
			  	<li class="active"><?php echo $section_actual ?></li>
			 	<!-- <li><a href="#">Library</a></li> -->
			</ul>
			<div class="row">
				<div class="col-sm-3">
					<h3>Usuarios</h3>
					<div class="list-group">
						<?php echo anchor('usuarios/create/true', 'Crear Usuario', array('class' => 'list-group-item')); ?>
						<?php echo anchor('usuarios/query/update', 'Modificar Usuario', array('class' => 'list-group-item')); ?>
						<?php echo anchor('usuarios/query/delete', 'Eliminar Usuario', array('class' => 'list-group-item')); ?>
					</div>
				</div>
				<div class="col-md-9">
					<div class="paddin-topottom-sm">
						<h1 class="text-center">
							<?php echo $title_section; ?><br>
							<small><?php echo $subtitle_section; ?></small>
						</h1>
						<?php echo $mensaje_ok; ?>
						<?php echo $mensaje_err; ?>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
							tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
							consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
							cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
							proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
						</p>
					</div>
				</div>
			</div>
		</section>

<!--desde aca el footerrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr-->

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
