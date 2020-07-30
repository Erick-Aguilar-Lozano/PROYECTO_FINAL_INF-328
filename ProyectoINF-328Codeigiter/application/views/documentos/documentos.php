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
								<!--<li><a href="#">Documentos</a></li>
								<li class="divider"></li>-->
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
								<li><a href="<?php echo base_url('menuC');?>">Inicio</a></li>
								<?php  if ($perfil == 'Administrador'){ ?>
								<li class="divider"></li>
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
			<button class="btn btn-primary btn-block btn-success button " data-toggle=modal data-target=#modalAgregaD>Adicionar Documento</button>
			</div>
			<div class='col-md-12 right_col'>
					<div id='informationDocumentos'></div>
					<p>Documentos:</p>
					<table class='table table-bordered table-responsive table-striped table-condensed table-hover table-sm' id='tableDocumentos'>
							<thead>
									<tr>
											<th scope='col'></th>
											<th scope='col'>Id</th>
											<th scope='col'>Titulo_p</th>
											<th scope='col'>Titulo_s</th>
											<th scope='col'>Idioma</th>
											<th scope='col'>Tipo</th>
											<th scope='col' class="col-sm-1">Ruta</th>
											<th scope='col'>Descripcion</th>
											<th scope='col'>Palabras_clave</th>
											<th scope='col'>Acciones</th>
									</tr>
							</thead>
							<tbody>
									<?php foreach ($results->result() as $dato):?>
											<tr>
													<td></td>
													<td><?php echo $dato->id;?></td>
													<td><?php echo $dato->titulo_p;?></td>
													<td><?php echo $dato->titulo_s;?></td>
													<td><?php echo $dato->idioma;?></td>
													<td><?php echo $dato->tipo;?></td>
													<td><?php echo $dato->ruta;?></td>
													<td><?php echo $dato->descripcion;?></td>
													<td><?php echo $dato->palabras_clave;?></td>
													<td>
															<!--<a href="<?php echo base_url();?>usuarios/edit?id=<?php echo $dato->id;?>" class="button"  data-target=#modaledit  >Editar<a/> -->

															<?php $cadenaeditarD="$dato->titulo_p|$dato->titulo_s|$dato->idioma|$dato->tipo|$dato->ruta|$dato->descripcion|$dato->palabras_clave";
																echo "<input type='hidden' type=text name='cadeeditarD$dato->id' id='cadeeditarD$dato->id' value='$cadenaeditarD' type=hidden>";
															?>

															<a href="#"  class="button" data-toggle=modal data-target=#modaledit <?php echo "onclick=editarD($dato->id)"; ?> >Editar<a/>
															<a href="<?php echo base_url();?>documentos/deleteD?id=<?php echo $dato->id;?>" class="button">Eliminar<a/>
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

						<form method="post" action="<?php echo base_url();?>documentos/update_infD" enctype="multipart/form-data">
								<input type="hidden" type=text name=nomeditD0 id=nomeditD0 >
  							<div class="form-group">
    								<label>Titulo principal</label>
    								<input type="text" name=nomeditD class="form-control" id="nomeditD" value="<?php echo set_value('nomediD');?>" >
  							</div>
								<div class="form-group">
    								<label>Titulo secundario</label>
    								<input type="text" name=nomeditD1 class="form-control" id="nomeditD1" value="<?php echo set_value('nomediD1');?>" >
  							</div>
  							<div class="form-group">
    								<label>Idioma</label>
    								<input type="text" name=nomeditD2 class="form-control" id="nomeditD2">
  							</div>
								<div class="form-group">
    								<label>Tipo</label>
    								<input type="text" name=nomeditD3 class="form-control" id="nomeditD3">
  							</div>
  							<div class="form-group">
    								<label>Ruta</label> <input type=hidden name=ant_nombre  id=ant_nombre value='' >
    								<input type="file" name=nomeditD4 class="form-control" id="nomeditD4"  >  Archivo Actual ( <span id=nombrefile ></span> )
										<input type="hidden" name=oldruta id=oldruta value="" >
  							</div>
								<div class="form-group">
    								<label>Descripcion</label>
    								<input type="text" name=nomeditD5 class="form-control" id="nomeditD5">
  							</div>
  							<div class="form-group">
										<label>Palabras_clave</label>
										<input type="text" name=nomeditD6 class="form-control" id="nomeditD6">
  							</div>
								<div class="modal-footer">
					 			 <button type="submit" class="btn btn-success" >Actualizar informacion</button>
					 		 	</div>
							</form>

		 </div>
	 	</div></div>
	 </div>



	 					<div id="modalAgregaD" class="modal fade"  role="dialog">
	 						<div class="modal-dialog modal-lg " ><!-- Contenido del modal -->
	 							<div class="modal-content">
									<div class="modal-header">
	 									<button type="button" class="close" data-dismiss="modal">&times;</button>
	 								</div>
	 								<div class="modal-body">
	 									<!--<input type=text name=nomedit id=nomedit value="">-->
	 									<form method="post" action="<?php echo base_url();?>documentos/verificaD" enctype="multipart/form-data">
	 										<!--<input type="hidden" type=text name=nomeditA0 id=nomeditA0 >-->
											<div class="form-group">
			    								<label>Titulo principal</label>
			    								<input type="text" name=titulo_pA class="form-control" id="titulo_pA" value="<?php echo set_value('titulo_pA');?>" >
			  							</div>
											<div class="form-group">
			    								<label>Titulo secundario</label>
			    								<input type="text" name=titulo_sA class="form-control" id="titulo_sA" value="<?php echo set_value('titulo_sA');?>" >
			  							</div>
			  							<div class="form-group">
			    								<label>Idioma</label>
			    								<input type="text" name=idiomaA class="form-control" id="idiomaA">
			  							</div>
											<div class="form-group">
			    								<label>Tipo</label>
			    								<input type="text" name=tipoA class="form-control" id="tipoA">
			  							</div>
			  							<div class="form-group">
			    								<label>Archivo</label>
			    								<input type="file" name=rutaA class="form-control" id="rutaA" >
			  							</div>
											<div class="form-group">
			    								<label>Descripcion</label>
			    								<input type="text" name=descripcionA class="form-control" id="descripcionA">
			  							</div>
			  							<div class="form-group">
													<label>Palabras_clave</label>
													<input type="text" name=palabras_claveA class="form-control" id="palabras_claveA">
			  							</div>
											<div class="form-group">
													<label>Autor</label>
													<input type="text" name=autorA class="form-control" id="autorA">
			  							</div>
											<div class="form-group">
													<label>Editorial</label>
													<input type="text" name=editorialA class="form-control" id="editorialA">
			  							</div>
													<!--<input type="hidden" value="<?php echo $idU;?>" name=idUD class="form-control" id="idUD">-->
	 										<div class="modal-footer">
	 								 				<button type="submit" class="btn btn-success" >Adicionar</button>
	 										</div>
	 									</form>
	 		 						</div>
								</div>
							</div>
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
