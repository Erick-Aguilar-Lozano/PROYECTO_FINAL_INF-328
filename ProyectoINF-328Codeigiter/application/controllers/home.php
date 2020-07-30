<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controlador de la vista principal, da inicio al flujod e información.
 * @author Erick Aguilar lozano <erickaguilarlozano@gmail.com>
 */
class Home extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('usuario_model');
			//$this->load->library('session');
			$this->load->model('Login_model');
			//$this->load->helper('form');
			//$this->load->library('form_validation');
	}
	public function index()
	{
		//$this->session->sess_destroy();
		//$data['title'] = 'Biblioteca';
		//$data['title-section'] = '';
		//$data['libros_class'] = '';
		//$data['usuario_class'] = '';
		//$data['section_actual'] = 'Inicio';
		//$this->load->view('templates/header', $data);
		//$actual = $this->session->userdata('sesionActual');
		$this->load->view('home');
		//$this->load->view('templates/footer');
	}
	public function mostrar_busqueda()
	{
		if ($this->input->is_ajax_request()) {
			$buscar =  $this->input->post("buscar");
			$datos = $this->usuario_model->mostrar_modelo($buscar);
			echo json_encode($datos);
		} else {
			show_404();
		}

	}

}

/* End of file home.php */
/* Location: ./application/controllers/home.php */
