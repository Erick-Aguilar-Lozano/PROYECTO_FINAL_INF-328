<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Controlador de la vista principal, da inicio al flujo de un usuario administrador.
 * @author Erick Aguilar lozano <erickaguilarlozano@gmail.com>
 * @version 1.0
 */
class MenuC extends CI_Controller {

	public function __construct()
	{
			parent::__construct();
			$this->load->helper('url');
			$this->load->model('menu_model');
			$this->load->helper('form');
			$this->load->library('form_validation');
	}
	public function index()
	{
		//$this->session->sess_destroy();
		$data['perfil'] = $this->session->userdata('perfil');
		$data['id'] = $this->session->userdata('id');
		//$data['title-section'] = '';
		//$data['libros_class'] = '';
		//$data['usuario_class'] = '';
		//$data['section_actual'] = 'Inicio';
		//$this->load->view('templates/header', $data);
		$this->load->view('menu',$data);
		//$this->load->view('templates/footer');
	}
	public function cerrar_sesion() {
      $usuario_data = array(
         'logueado' => FALSE
      );
      $this->session->set_userdata($usuario_data);
			$this->session->sess_destroy();
      redirect('home');
   }
}

/* End of file menuC.php */
/* Location: ./application/controllers/menuC.php */
