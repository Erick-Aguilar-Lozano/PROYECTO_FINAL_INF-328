<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autores extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('autores_model');
		$this->load->model('documentos_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
	public function autoresTabla()
	{
			//$datos = $this->usuario_model->obtener_todos();
			//$this->load->library('pagination');
			//$this->load->library('table');
			if ($this->session->userdata('perfil') == 'Administrador') {
					$data['results'] = $this->autores_model->obtener_todos_A();
			} else {
					$id_U = $this->session->userdata('id');
					$data['results'] = $this->documentos_model->obtener_todos_A_deD($id_U);
			}
			//$data['results'] = $this->autores_model->obtener_todos_A();
			$data['perfil'] = $this->session->userdata('perfil');
			$this->load->view('autores/autores',$data);
	}
	public function delete()
	{
			//$this->session->acceso('Administrador');
			$id = $this->input->get('id');
			//echo $id;
			$this->autores_model->delete_A($id);
			$data['results'] = $this->autores_model->obtener_todos_A();
			$data['perfil'] = $this->session->userdata('perfil');
			$this->load->view('autores/autores',$data);
	}
	public function update_infA()
	{
			//$id = $this->session->userdata('id_user');
			//$this->session->acceso('Usuario');
			//$usuario = $this->usuario_model->get_user_id($id);

			$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[3]|max_length[50]|xss_clean');

			//$this->form_validation->set_value('nombre', $usuario['nombre']);
			//$this->form_validation->set_value('login', $usuario['login']);
			if($this->form_validation->run() == TRUE)
			{
					//echo "<script> alert('".$correo."');</script>";
					echo "<script> alert('error');</script>";
					redirect('autores');
			}else
			{
				$id = $this->input->post('nomeditA0');
				$nombre = $this->input->post('nomeditA');
				$this->autores_model->update_a($id, $nombre);

				if ($this->session->userdata('perfil') == 'Administrador') {
						$data['results'] = $this->autores_model->obtener_todos_A();
				} else {
						$id_U = $this->session->userdata('id');
						$data['results'] = $this->documentos_model->obtener_todos_A_deD($id_U);
				}

				//$data['results'] = $this->autores_model->obtener_todos_A();
				$data['perfil'] = $this->session->userdata('perfil');
				$this->load->view('autores/autores',$data);
			}
	}



	public function verificaA()
	{
			$nombre = $this->input->post('nomAgrega');
			if($this->autores_model->nuevoA($nombre))
			{
				$this->form_validation->set_message('verificaA','Autor existente');
				redirect('autores');
			}
			else
			{
					$this->autores_model->insertarA($nombre);

					if ($this->session->userdata('perfil') == 'Administrador') {
							$data['results'] = $this->autores_model->obtener_todos_A();
					} else {
						$id_U = $this->session->userdata('id');
						$data['results'] = $this->documentos_model->obtener_todos_A_deD($id_U);
					}

					//$data['results'] = $this->autores_model->obtener_todos_A();
					$this->load->view('autores/autores',$data);
			}
	}



}

/* End of file autores.php */
/* Location: ./application/controllers/autores.php */
