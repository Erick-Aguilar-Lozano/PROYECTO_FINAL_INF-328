<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Repositorio de Documentos</title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.css');?>">
		<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap-responsive.css');?>"> -->
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css');?>">
	</head>

	<body>

		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container-fluid">
				<div class="navbar-header">
		    		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
	    			</button>
		    		<a class="navbar-brand" href="#">REPOSITORIO</a>
		  		</div>

		  		<div class="navbar-collapse collapse navbar-responsive-collapse">
			  		<ul class="nav navbar-nav navbar-float">
				      	<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<span class="glyphicon glyphicon-book"></span>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo base_url('documentos/documentosTabla');?>">Documentos</a></li>
								<li class="divider"></li>
								<!--<li><a href="#">Autores</a></li>
								<li class="divider"></li>-->
								<li><a href="<?php echo base_url('editoriales/editorialesTabla');?>">Editoriales</a></li>
							</ul>
						</li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<span class="glyphicon glyphicon-eye-open"></span>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<!--<li><a href="#">Crear Perfil</a></li>-->
								<li><a href="<?php echo base_url('menuC');?>">Inicio</a></li>
								<?php  if ($perfil == 'Administrador'){ ?>
								<li class="divider"></li>
								<!--<li><a href="#">Crear Usuario</a></li>
								<li><a href="#">Modificar Usuario</a></li>
								<li><a href="#">Eliminar Usuario</a></li>-->
								<li><a href="<?php echo base_url('usuarios/usuarioTabla');?>">Usuarios</a></li>
								<?php  } ?>
							</ul>
						</li>
				    </ul>

					<ul class="nav navbar-nav navbar-right">
					    <li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<span class="glyphicon glyphicon-user"></span>
								<span class="caret"></span>
							</a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="<?php echo base_url('menuC/cerrar_sesion');?>">Salir</a></li>
							</ul>

						</li>
					</ul>

			  	</div>
			</div>
		</nav>

		<header>
			<div class="container-fluid">
				<h1 class="text-center">Bienvenido al Repositorio de Documentos</h1>
				<p class="small text-center">ADMINISTRACION</p>
			</div>
		</header>

		<section class="container-fluid paddin-topottom-md">
			<div class="btn-group pull-right" >
			<button class="btn btn-primary btn-block btn-success button " data-toggle=modal data-target=#modalAgrega>Adicionar Autor</button>
			</div>
			<div class='col-md-12 right_col'>
					<div id='informationAutores'></div>
					<p>Autores:</p>
					<table class='table table-bordered table-responsive table-striped table-condensed table-hover' id='tableAutores'>
							<thead>
									<tr>
											<th scope='col'></th>
											<th scope='col'>Id</th>
											<th scope='col'>Nombre</th>
											<th scope='col'>Acciones</th>
									</tr>
							</thead>
							<tbody>
									<?php foreach ($results->result() as $dato):?>
											<tr>
													<td></td>
													<td><?php echo $dato->id;?></td>
													<td><?php echo $dato->nombre;?></td>
													<td>

															<?php $cadenaeditarA="$dato->nombre";
																echo "<input type='hidden' type=text name='cadeeditarA$dato->id' id='cadeeditarA$dato->id' value='$cadenaeditarA' type=hidden>";
															?>

															<a href="#"  class="button" data-toggle=modal data-target=#modaledit <?php echo "onclick=editarA($dato->id)"; ?> >Editar<a/>
															<!--<a href="<?php echo base_url();?>autores/delete?id=<?php echo $dato->id;?>" class="button">Eliminar<a/>-->
													</td>
											</tr>
									<?php endforeach;?>
							</tbody>
					</table>
			</div>


<div id="modaledit" class="modal fade"  role="dialog">
	<div class="modal-dialog modal-lg " ><!-- Contenido del modal -->
		<div class="modal-content"><div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
		</div>
		<div class="modal-body">

 						<!--<input type=text name=nomedit id=nomedit value="">-->

						<form method="post" action="<?php echo base_url();?>autores/update_infA">
								<input type="hidden" type=text name=nomeditA0 id=nomeditA0 >
  							<div class="form-group">
    								<label>Nombre</label>
    								<input type="text" name=nomeditA class="form-control" id="nomeditA" value="<?php echo set_value('nomeditA');?>" >
  							</div>
  							<div class="modal-footer">
					 			 <button type="submit" class="btn btn-success" >Actualizar informacion</button>
					 		 	</div>
							</form>


		 </div>
	 	</div></div>
	 </div>

		<div id="modalAgrega" class="modal fade"  role="dialog">
			<div class="modal-dialog modal-lg " ><!-- Contenido del modal -->
				<div class="modal-content"><div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
		 						<!--<input type=text name=nomedit id=nomedit value="">-->
								<form method="post" action="<?php echo base_url();?>autores/verificaA">
										<!--<input type="hidden" type=text name=nomeditA0 id=nomeditA0 >-->
		  							<div class="form-group">
		    								<label>Nombre</label>
		    								<input type="text" name=nomAgrega class="form-control" id="nomAgrega">
		  							</div>
		  							<div class="modal-footer">
							 			 <button type="submit" class="btn btn-success" >Adicionar</button>
							 		 	</div>
								</form>
				 </div></div></div>
		</div>



		</section>

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

		<script type="text/javascript" src="<?php echo base_url('js/jquery-1.10.2.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('js/funciones.js');?>"></script>
		<script type="text/javascript" src="<?php echo base_url('js/bootstrap.js');?>"></script>
	</body>
</html>
