<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editoriales extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('editoriales_model');
		$this->load->model('documentos_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}

	/*public function create()
	{
		$this->load->view('editoriales/create');
	}*/
	public function editorialesTabla()
	{
			//$datos = $this->usuario_model->obtener_todos();
			//$this->load->library('pagination');
			//$this->load->library('table');
			if ($this->session->userdata('perfil') == 'Administrador') {
					$data['results'] = $this->editoriales_model->obtener_todos_E();
			} else {
					$id_U = $this->session->userdata('id');
					$data['results'] = $this->documentos_model->obtener_todos_E_deD($id_U);
			}

			//$data['results'] = $this->editoriales_model->obtener_todos_E();
			$data['perfil'] = $this->session->userdata('perfil');
			$this->load->view('editoriales/editoriales',$data);
	}
	public function deleteE()
	{
			//$this->session->acceso('Administrador');
			$id = $this->input->get('id');
			//echo $id;
			$this->editoriales_model->delete_E($id);
			$data['results'] = $this->editoriales_model->obtener_todos_E();
			$data['perfil'] = $this->session->userdata('perfil');
			$this->load->view('editoriales/editoriales',$data);
	}
	public function update_infE()
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
					redirect('editoriales');
			}else
			{
				$id = $this->input->post('nomeditE0');
				$nombre = $this->input->post('nomeditE');
				$this->editoriales_model->update_e($id, $nombre);

				if ($this->session->userdata('perfil') == 'Administrador') {
						$data['results'] = $this->editoriales_model->obtener_todos_E();
				} else {
						$id_U = $this->session->userdata('id');
						$data['results'] = $this->documentos_model->obtener_todos_E_deD($id_U);
				}

				//$data['results'] = $this->editoriales_model->obtener_todos_E();
				$data['perfil'] = $this->session->userdata('perfil');
				$this->load->view('editoriales/editoriales',$data);
			}
	}
	public function verificaE()
	{
			$nombre = $this->input->post('nomAgregaE');
			if($this->editoriales_model->nuevoE($nombre))
			{
				$this->form_validation->set_message('verificaE','Editorial existente');
				redirect('editoriales');
			}
			else
			{
					$this->editoriales_model->insertarE($nombre);

					if ($this->session->userdata('perfil') == 'Administrador') {
							$data['results'] = $this->editoriales_model->obtener_todos_E();
					} else {
							$id_U = $this->session->userdata('id');
							$data['results'] = $this->documentos_model->obtener_todos_E_deD($id_U);
					}

					//$data['results'] = $this->editoriales_model->obtener_todos_E();
					$this->load->view('editoriales/editoriales',$data);
			}
	}



}

/* End of file editoriales.php */
/* Location: ./application/controllers/editoriales.php */
