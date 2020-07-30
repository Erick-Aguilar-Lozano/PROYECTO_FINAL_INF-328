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
						<!--<li class="navbar-brand"><a href="<?php echo base_url('home');?>">BIBLIOTECA</a></li>-->
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


<!--hasta aca el heaterrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr-->
<section class="container-fluid paddin-topottom-lg">
              <!--<ul class="breadcrumb">
                  <!--<li class="active"><?php //echo $section_actual ?></li>
              </ul>-->
              <div class="container">
                <?php //echo $mensaje_ok; ?>
                <?php //echo $mensaje_err; ?>
                <div class="well">
                    <h4>Nota!</h4>
                    <p>Para poder adicionar documentos es necesario iniciar sesion, si no tienes una cuenta creala!!
                    <?php //echo anchor('usuarios/create', 'Aqui', array('class' => 'alert-link')); ?></p>
                </div>
                <div class="alert alert-danger error" id="user_invalid">

                </div>
                <?php //echo form_open('usuarios/login_rqst', array('class' => 'form-signin', 'id' => 'form_login', 'role' => 'form')); ?>
										<h1 class="text-center">
											<?php //echo $title_section; ?><br>
											<small><?php echo 'Adicionar Usuario'; ?></small>
										</h1>
              <!--<form method="post" action="<?php echo base_url();?>Login/verifica" >-->
							<form method="post" action="<?php echo base_url();?>Login/iniciar_sesion_post" >
                    <div class="form-group col-sm-4 col-sm-offset-4">
                      <input class="form-control" id="nombre1" value="<?php //echo set_value('login'); ?>" placeholder="Login" name="nombre1" type="text" autofocus>
                    </div>
                    <div class="alert alert-danger error" id="error_login">
                    <?php //echo validation_errors(); ?>
                  	</div>

                  <div class="form-group col-sm-4 col-sm-offset-4">
                    <input class="form-control" id="password1" placeholder="Contraseña" name="password1" type="password">
                  </div>
                  <div class="alert alert-danger error" id="error_pass">
                    <?php //echo validation_errors(); ?>
                  </div>
									<div class="btn-group col-sm-4 col-sm-offset-4">
                      <button class="btn btn-primary btn-block btn-success" type="submit" name="submit" title="Presiona para enviar">Ingresar</button>
                      <?php //echo anchor('usuarios/recover_data/true', '¿Has olvidado tú contraseña?'); ?>
                      <?php //echo anchor('usuarios/recover_data', '¿Has olvidado tú Login?'); ?>
									</div>
              </form>
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
