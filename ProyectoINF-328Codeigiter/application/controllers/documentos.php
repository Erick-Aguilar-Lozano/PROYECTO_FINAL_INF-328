<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Documentos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('documentos_model');
		$this->load->model('autores_model');
		$this->load->model('editoriales_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		//$this->load->model('autores_model');
		//$this->load->model('editoriales_model');
	}

		public function documentosTabla()
    {
				//$datos = $this->usuario_model->obtener_todos();
				//$this->load->library('pagination');
        //$this->load->library('table');
				if ($this->session->userdata('perfil') == 'Administrador') {
						$data['results'] = $this->documentos_model->obtener_todos_D();
				} else {
					  $id_U = $this->session->userdata('id');
						$data['results'] = $this->documentos_model->obtener_porID_D($id_U);
				}

				//$data['results'] = $this->documentos_model->obtener_todos_D();
				$data['perfil'] = $this->session->userdata('perfil');
				//$data['idU'] = $this->session->userdata('id');
				$this->load->view('documentos/documentos',$data);
    }
		public function deleteD()
    {
        //$this->session->acceso('Administrador');
				$id = $this->input->get('id');
				$iddeEDI = $this->documentos_model->dev_id_deEDI($id);
				$iddeAU = $this->documentos_model->dev_id_deAU($id);
				$this->documentos_model->delete_docu($id);

				$this->documentos_model->elimina_escrito($id,$iddeAU);
				$this->autores_model->delete_A($iddeAU);
				$this->editoriales_model->delete_E($iddeEDI);
				$data['results'] = $this->documentos_model->obtener_todos_D();
				$data['perfil'] = $this->session->userdata('perfil');
				$this->load->view('documentos/documentos',$data);
    }
		public function update_infD()
    {
				$this->form_validation->set_rules('titulo_p', 'Titulo Principal', 'trim|required|min_length[3]|max_length[100]|xss_clean');
				$this->form_validation->set_rules('titulo_s', 'Titulo Secundario', 'trim|required|min_length[3]|max_length[100]|xss_clean');
				//$this->form_validation->set_rules('autor[]', 'Autor(es)', 'trim|required|xss_clean');
				//$this->form_validation->set_rules('editorial', 'Autor(es)', 'trim|required|xss_clean');
				$this->form_validation->set_rules('idioma', 'Idioma', 'trim|required|xss_clean');
				$this->form_validation->set_rules('tipo', 'Tipo', 'trim|required|xss_clean');
				//$this->form_validation->set_rules('ruta', 'ruta', 'trim|required|xss_clean');
				$this->form_validation->set_rules('descripcion', 'Descripcion', 'trim|required|min_length[3]|max_length[65535]|xss_clean');
				$this->form_validation->set_rules('palabras_clave', 'Palabras Claves', 'trim|required|min_length[3]|max_length[300]|xss_clean');

        //$this->form_validation->set_value('nombre', $usuario['nombre']);
        //$this->form_validation->set_value('login', $usuario['login']);
        if($this->form_validation->run() == TRUE)
        {
						redirect('home');
        }else
        {
					$id = $this->input->post('nomeditD0');
					$titulo_p = $this->input->post('nomeditD');
					$titulo_s = $this->input->post('nomeditD1');
					$idioma = $this->input->post('nomeditD2');
					$tipo = $this->input->post('nomeditD3');
					$ant_nombre = $this->input->post('ant_nombre');
					$descripcion = $this->input->post('nomeditD5');
					$palabras_clave = $this->input->post('nomeditD6');
					$ruta= $this->input->post('oldruta');
					$ant_nombre="doc_subido/".$ant_nombre;

					$nombre_temp=$_FILES["nomeditD4"]['name'];
					$config['upload_path']="doc_subido/";
					$config['allowed_types']="gif|jpg|png|pdf|doc|xls";
					$config['max_size']=5000;
					$config['file_name']=$id."_".$nombre_temp;

										$this->load->library('upload',$config);
if($nombre_temp !="")
{
										if (!$this->upload->do_upload('nomeditD4')) {
					            $error=array('error'=> $this->upload->display_errors());
											$falla=print_r($error);
					             echo "<script>alert('$falla');</script>";
										}else{
					                $data= array('cargado' => $this->upload->data());
													$ruta=$this->upload->data('file_name');
													//echo "<script>alert('guardo');</script>";
											// code...
										}
}
          $this->documentos_model->update_d($id, $titulo_p, $titulo_s, $idioma, $tipo, $ruta, $descripcion, $palabras_clave);

					if ($this->session->userdata('perfil') == 'Administrador') {
							$data['results'] = $this->documentos_model->obtener_todos_D();
					} else {
						  $id_U = $this->session->userdata('id');
							$data['results'] = $this->documentos_model->obtener_porID_D($id_U);

						}

					//$data['results'] = $this->documentos_model->obtener_todos_D();
					$data['perfil'] = $this->session->userdata('perfil');

          if(is_file($ant_nombre) && $nombre_temp !="" )
					{unlink($ant_nombre);}

					$this->load->view('documentos/documentos',$data);
        }
    }

		public function verificaD()
    {
				$titulo_p = $this->input->post('titulo_pA');
				$titulo_s = $this->input->post('titulo_sA');
				$idioma = $this->input->post('idiomaA');
				$tipo = $this->input->post('tipoA');
				//$ruta = $this->input->post('rutaA');
				$descripcion = $this->input->post('descripcionA');
				$palabras_clave = $this->input->post('palabras_claveA');
				$autor = $this->input->post('autorA');
				$editorial = $this->input->post('editorialA');

				$idUD = $this->session->userdata('id');

				$this->autores_model->insertarA($autor);
				$this->editoriales_model->insertarE($editorial);

				$idautor = $this->autores_model->dev_idA($autor);
				$ideditorial = $this->editoriales_model->dev_idE($editorial);


				$ultid=$this->documentos_model->dev_ultid();
				$ultid=$ultid+1;
				$nombre_temp=$_FILES["rutaA"]['name'];
				$config['upload_path']="doc_subido/";
				$config['allowed_types']="gif|jpg|png|pdf|doc|xls";
				$config['max_size']=5000;
				$config['file_name']=$ultid."_".$nombre_temp;
					$this->load->library('upload',$config);
					if (!$this->upload->do_upload('rutaA')) {
            $error=array('error'=> $this->upload->display_errors());
						$falla=print_r($error);
             echo "<script>alert('$falla');</script>";
					}else{
                $data= array('cargado' => $this->upload->data());
								$ruta=$this->upload->data('file_name');
								//echo "<script>alert('guardo');</script>";
						// code...
					}

       //$directorio="../../doc_subido/"
        //$subir_archivo=$directorio.basename($_FILES);


        //if($this->documetos_model->nuevoD($titulo_p))
        //{
				//	$this->form_validation->set_message('verificaD','Documento existente');
				//	redirect('documentos');
        //}
        //else
        //{
						$this->documentos_model->insertarD($titulo_p, $titulo_s, $idioma, $tipo, $ruta, $descripcion, $palabras_clave, $ideditorial, $idUD);
						$iddoc = $this->documentos_model->dev_idD($titulo_p);
						$this->documentos_model->escrito($iddoc,$idautor);

						if ($this->session->userdata('perfil') == 'Administrador') {
								$data['results'] = $this->documentos_model->obtener_todos_D();
						} else {
							  $id_U = $this->session->userdata('id');
								$data['results'] = $this->documentos_model->obtener_porID_D($id_U);
						}

						//$data['results'] = $this->documentos_model->obtener_todos_D();
						$data['perfil'] = $this->session->userdata('perfil');
						$this->load->view('documentos/documentos',$data);
        //}
    }

	/*public function delete($id)
	{
		$this->libros_model->delete($id);
        redirect('libros/query/');
	}*/

	/*public function download_rqst($ruta)
	{

		$this->load->helper('download');
		$path =  file_get_contents(base_url().'uploads/'.$ruta);
		force_download($ruta, $path);

	}*/
}

/* End of file documentos.php */
/* Location: ./application/controllers/documentos.php */
