<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('Login_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }
    public function index()
    {
        $this->form_validation->set_rules('nombre' ,'Nombre', 'required');
        $this->form_validation->set_rules('password' ,'Password', 'callback_verifica');
        if($this->form_validation->run() == false)
        {
            //$data['main_title'] = 'Biblioteca';
            //$data['section_actual'] = 'Inicio';
            //$data['title-section'] = '';
            //$data['title2'] = 'Registro';
            //$this->load->view('templates/header', $data);
            $this->load->view('usuarios/login');
            //$this->load->view('templates/footer');
        }
        else
        {
            redirect('welcome');
        }
    }
    public function verifica()
    {
        $nombre = $this->input->post('nombre1');
        $password = $this->input->post('password1');
        if($this->login_model->login($nombre, $password))
        {
            redirect('welcome');
        }
        else
        {
            $this->form_validation->set_message('verifica','Contraseña incorrecta');
            redirect('login');
        }
    }

    public function iniciar_sesion_post()
    {

      if ($this->input->post()) {
         $login = $this->input->post('nombre1');
         $pass = $this->input->post('password1');
         $usuario = $this->Login_model->usuario_por_nombre_contrasena($login, $pass);
         if ($usuario)
         {
            $usuario_data = array(
               'id' => $usuario->id,
               'nombre' => $usuario->nombre,
               'perfil' => $usuario->perfil,
               'logueado' => TRUE
            );
            $this->session->set_userdata($usuario_data);
            //redirect('usuarios/logueado');
            redirect('menuC');
         } else {
            redirect('Login');
         }
      } else {
         $this->index();
      }


   }



}
