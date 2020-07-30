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
								<li><a href="<?php echo base_url('autores/autoresTabla');?>">Autores</a></li>
								<li class="divider"></li>
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
								<!--<li class="divider"></li>-->
								<!--<li><a href="#">Crear Usuario</a></li>
								<li><a href="#">Modificar Usuario</a></li>
								<li><a href="#">Eliminar Usuario</a></li>-->
								<!--<li><a href="#">Usuarios</a></li>-->
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
								<!--<li><a href="#">Modificar Contraseña</a></li>
								<li><a href="#">Modificar Info</a></li>
								<li class="divider"></li>-->
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
		 			<a href="<?php echo base_url('usuarios');?>" class="btn btn-primary btn-block btn-success button ">Adicionar Usuario</a>
			</div>

			<!--para mostrar las tablas-->
			<!--<p>Usuarios:</p>-->
			<?php
				//$this->table->set_caption('USUARIOS');
				//$this->table->set_heading('ID', 'NOMBRE'); //crea la primera fila de la tabla con el encabezado
				//$tmp = array ( 'table_open'  => '<table border="0" cellpadding="50" cellspacing="1000" class="mytable">' ); //modifica el espaciado
				//$this->table->set_template($tmp); //aplico los cambios de modificacion anterior
				/*ok aca vamos a hacer que el correo tenga un enlace a enviar un mail
				con el foreach recorro los resultados de la consulta */
				//foreach($results->result() as $dato):
					//$array['id'] = $dato->id;
					//$array['nombre'] = $dato->nombre;
					//$this->table->add_row($array); //agregamos la celda a la tabla por cada iteracion
				//endforeach;
				//echo $this->table->generate(); //cuando termina generamos la tabla a partir del vector
				//echo $this->pagination->create_links();
			?>


			<div class='col-md-12 right_col'>
					<div id='informationUsuarios'></div>
					<p>Usuarios:</p>
					<table class='table table-bordered table-responsive table-striped table-condensed table-hover' id='tableUsuarios'>
							<thead>
									<tr>
											<th scope='col'></th>
											<th scope='col'>Id</th>
											<th scope='col'>Nombre</th>
											<th scope='col'>Login</th>
											<th scope='col'>Pass</th>
											<th scope='col'>Correo</th>
											<th scope='col'>Telefono</th>
											<th scope='col'>Perfil</th>
											<th scope='col'>Acciones</th>
									</tr>
							</thead>
							<tbody>
									<?php foreach ($results->result() as $dato):?>
											<tr>
													<td></td>
													<td><?php echo $dato->id;?></td>
													<td><?php echo $dato->nombre?></td>
													<td><?php echo $dato->login;?></td>
													<td><?php echo $dato->pass?></td>
													<td><?php echo $dato->correo;?></td>
													<td><?php echo $dato->telefono?></td>
													<td><?php echo $dato->perfil;?></td>
													<td>
															<!--<a href="<?php echo base_url();?>usuarios/edit?id=<?php echo $dato->id;?>" class="button"  data-target=#modaledit  >Editar<a/> -->

															<?php $cadenaeditar="$dato->nombre|$dato->login|$dato->pass|$dato->correo|$dato->telefono|$dato->perfil";
																echo "<input type='hidden' type=text name='cadeeditar$dato->id' id='cadeeditar$dato->id' value='$cadenaeditar' type=hidden>";
															?>

															<a href="#"  class="button" data-toggle=modal data-target=#modaledit <?php echo "onclick=editarusu($dato->id)"; ?> >Editar<a/>
															<a href="<?php echo base_url();?>usuarios/delete?id=<?php echo $dato->id;?>" class="button">Eliminar<a/>
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

						<form method="post" action="<?php echo base_url();?>usuarios/update_inf">
								<input type="hidden" type=text name=nomedit0 id=nomedit0 >
  							<div class="form-group">
    								<label>Nombre</label>
    								<input type="text" name=nomedit class="form-control" id="nomedit" value="<?php echo set_value('nomedit');?>" >
  							</div>
  							<div class="form-group">
    								<label>Login</label>
    								<input type="text" name=nomedit1 class="form-control" id="nomedit1">
  							</div>
								<div class="form-group">
    								<label>Pass</label>
    								<input type="text" name=nomedit2 class="form-control" id="nomedit2">
  							</div>
  							<div class="form-group">
    								<label>Correo</label>
    								<input type="email" name=nomedit3 class="form-control" id="nomedit3" value="<?php echo set_value('nomedit3');?>">
  							</div>
								<div class="form-group">
    								<label>Telefono</label>
    								<input type="text" name=nomedit4 class="form-control" id="nomedit4">
  							</div>
  							<div class="form-group">
										<label>Perfil</label>
										<select id="nomedit5" name=nomedit5 class="form-control">
												<option>Administrador</option>
												<option>Usuario</option>
										</select>
  							</div>
								<div class="modal-footer">
					 			 <button type="submit" class="btn btn-success" >Actualizar informacion</button>
					 		 	</div>
							</form>


		 </div>
	 	</div></div>
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
