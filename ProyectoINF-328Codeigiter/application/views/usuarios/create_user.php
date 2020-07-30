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
						<!--<li class="navbar-brand">BIBLIOTECA</li>-->
						<a class="navbar-brand" href="<?php echo base_url('home');?>">REPOSITORIO</a>
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
								<!--<a href="usuarios/login.php">Iniciar Sesion</a>-->
								<li><a href="<?php echo base_url('Login');?>">Iniciar Sesion</a></li>
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
				     	</div>
				    </div>-->
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
			<!--<ul class="breadcrumb">
				<li><?php //echo 'Inicio'; ?></li>
				<?php //if($is_admin): ?>
				<li><?php //echo anchor('usuarios', 'Usuarios'); ?></li>
				<li class="active"><?php //echo $section_actual ?></li>
				<?php //else: ?>
				<li class="active"><?php //echo $section_actual ?></li>
				<?php //endif; ?>
			</ul>-->

			<?php //if($is_admin): ?>
			<div class="row">
				<!--<div class="col-sm-3">
					<h3>Usuarios</h3>
					<div class="list-group">
						<?php //echo anchor('usuarios/create/true', 'Crear Usuario', array('class' => 'list-group-item '.$user_create_class)); ?>
						<?php //echo anchor('usuarios/query/update', 'Modificar Usuario', array('class' => 'list-group-item '.$user_edit_class)); ?>
						<?php //echo anchor('usuarios/query/delete', 'Eliminar Usuario', array('class' => 'list-group-item '.$user_delete_class)); ?>
					</div>
				</div>-->
				<!--<div class="col-md-9">-->
			<?php //else: ?>
			<div class="container">
			<?php //endif; ?>
					<div class="paddin-topottom-sm">
						<h1 class="text-center">
							<?php //echo $title_section; ?><br>
							<small><?php echo 'Crear Usuario'; ?></small>
						</h1>

						<?php //if($is_admin): ?>
						<?php //echo form_open('usuarios/create/true', array('class' => 'form-signin')); ?>
						<?php //else: ?>
						<?php //echo form_open('usuarios/create', array('class' => 'form-signin')); ?>
						<?php //endif; ?>
						<form method="post" action="<?php echo base_url();?>usuarios/verificaU" >
							<div class="form-group col-sm-4 col-sm-offset-4">
								<input class="form-control" id="nombre" type="text" name="nombre" value="<?php echo set_value('nombre');?>" placeholder="Nombre" autofocus>
							</div>
							<?php echo form_error('nombre', '<div class="alert alert-danger">', '</div>'); ?>

							<div class="form-group col-sm-4 col-sm-offset-4">
								<input class="form-control" id="telefono" type="text" name="telefono" value="<?php echo set_value('telefono');?>" placeholder="Telefono">
							</div>
							<?php echo form_error('telefono', '<div class="alert alert-danger">', '</div>'); ?>

							<div class="form-group col-sm-4 col-sm-offset-4">
								<input class="form-control" id="correo" type="email" name="correo" value="<?php echo set_value('correo');?>" placeholder="Correo">
							</div>
							<?php echo form_error('correo', '<div class="alert alert-danger">', '</div>'); ?>

							<div class="form-group col-sm-4 col-sm-offset-4">
								<input class="form-control" id="login" type="text" name="login" value="<?php echo set_value('login');?>" placeholder="Login">
							</div>
							<?php echo form_error('login', '<div class="alert alert-danger">', '</div>'); ?>

							<div class="form-group col-sm-4 col-sm-offset-4">
								<input class="form-control" id="pass" type="password" name="pass" placeholder="Contraseña">
							</div>
							<?php echo form_error('pass', '<div class="alert alert-danger">', '</div>'); ?>

							<?php //if($is_admin): ?>
							<div class="form-group col-sm-4 col-sm-offset-4">
									<input type="hidden" class="form-control" id="perfil" type="text" name="perfil" placeholder="Escriba por defecto Usuario" value="Usuario">
	        		</div>
	        				<?php //echo form_error('perfil', '<div class="alert alert-danger">', '</div>'); ?>
	        				<?php //endif; ?>
								<div class="form-group col-sm-4 col-sm-offset-4">
	        				<button class="btn btn-primary btn-block btn-success" type="submit" title="Presiona para enviar">Crear</button>
								</div>
						</form>
					</div>
				<?php //if($is_admin): ?>
				</div>
			<!--</div>-->
			<?php //else: ?>
			</div>
			<?php //endif; ?>
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
