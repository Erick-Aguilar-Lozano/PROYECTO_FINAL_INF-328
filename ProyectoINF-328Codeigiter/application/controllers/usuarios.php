<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	public function __construct()
  {
		parent::__construct();
		$this->load->model('usuario_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
        //$this->load->helper('security');
	}

    /*public function salir($confirmar=FALSE)
    {
        if($confirmar)
        {
            $this->session->sess_destroy();
            redirect('');
        }else
        {
            $data['link'] = base_url().'index.php/usuarios/salir/true';
            $this->load->view('usuarios/salir', $data);
        }
    }*/

    public function index()
    {
        $this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[3]|max_length[50]|xss_clean');
        //$this->form_validation->set_rules('login', 'Login', 'trim|required|min_length[3]|max_length[50]|is_unique[usuarios.login]');
				$this->form_validation->set_rules('login', 'Login', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('pass', 'Contraseña', 'trim|required|min_length[3]|max_length[50]');
        //$this->form_validation->set_rules('correo', 'Correo', 'trim|required|max_length[100]|valid_email|is_unique[usuarios.correo]');
				$this->form_validation->set_rules('correo', 'Correo', 'trim|required|max_length[100]|valid_email');
        $this->form_validation->set_rules('telefono', 'Telefono', 'trim|required|numeric|min_length[6]|max_length[10]');
				$this->form_validation->set_rules('perfil', 'perfil', 'trim|required|min_length[9]|max_length[12]');
        if($this->form_validation->run() == FALSE)
        {
                $this->load->view('usuarios/create_user');
                //$this->load->view('template/footer');
        }else
        {
            //$nombre = $this->input->post('nombre');
            //$login = $this->input->post('login');
            //$pass = $this->input->post('pass');
            //$correo = $this->input->post('correo');
            //$telefono = $this->input->post('telefono');
            //$perfil = $this->input->post('perfil');
            redirect('welcome');
        }
    }

		public function verificaU()
    {

				$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[1]|max_length[50]');
				$this->form_validation->set_rules('login', 'Login', 'trim|required|min_length[1]|max_length[50]');
				$this->form_validation->set_rules('pass', 'Contraseña', 'trim|required|min_length[1]|max_length[50]');
				$this->form_validation->set_rules('correo', 'Correo', 'trim|required|max_length[100]');
				$this->form_validation->set_rules('telefono', 'Telefono', 'trim|required|numeric|min_length[5]|max_length[10]');
				$this->form_validation->set_rules('perfil', 'perfil', 'trim|required|min_length[1]|max_length[12]');
				if($this->form_validation->run() === FALSE)
				{		redirect('home');		}
				else{


				$nombre = $this->input->post('nombre');
				$login = $this->input->post('login');
        $pass = $this->input->post('pass');
				$correo = $this->input->post('correo');
        $telefono = $this->input->post('telefono');
				$perfil = $this->input->post('perfil');
        if($this->usuario_model->nuevo($login, $pass))
        {
					$this->form_validation->set_message('verificaU','Usuario existente');
					redirect('usuarios');
        }
        else
        {
						$this->usuario_model->insertar($nombre, $login, $pass, $correo, $telefono, $perfil);
						redirect('Login');
        }
			}

    }

		public function usuarioTabla()
    {
				//$datos = $this->usuario_model->obtener_todos();
				//$this->load->library('pagination');
        //$this->load->library('table');
				$data['results'] = $this->usuario_model->obtener_todos_U();
				$this->load->view('usuarios/usuarios',$data);
    }
    public function update_inf()
    {
        //$id = $this->session->userdata('id_user');
        //$this->session->acceso('Usuario');
        //$usuario = $this->usuario_model->get_user_id($id);

				$this->form_validation->set_rules('nombre', 'Nombre', 'trim|required|min_length[3]|max_length[50]|xss_clean');
				$this->form_validation->set_rules('login', 'Login', 'trim|required|min_length[3]|max_length[50]');
        $this->form_validation->set_rules('pass', 'Contraseña', 'trim|required|min_length[3]|max_length[50]');
				$this->form_validation->set_rules('correo', 'Correo', 'trim|required|max_length[100]|valid_email');
        $this->form_validation->set_rules('telefono', 'Telefono', 'trim|required|numeric|min_length[6]|max_length[10]');
				$this->form_validation->set_rules('perfil', 'perfil', 'trim|required|min_length[9]|max_length[12]');

        //$this->form_validation->set_value('nombre', $usuario['nombre']);
        //$this->form_validation->set_value('login', $usuario['login']);
        if($this->form_validation->run() == TRUE)
        {
            //$data['usuario'] = $usuario;
            //$data['id_usuario'] = $id;
            //if($is_ok)
            //    $data['mensaje_ok'] = TRUE;
            //else
            //    $data['mensaje_ok'] = FALSE;
						redirect('usuarios');
        }else
        {
					$id = $this->input->post('nomedit0');
					$nombre = $this->input->post('nomedit');
					$login = $this->input->post('nomedit1');
					$pass = $this->input->post('nomedit2');
					$correo = $this->input->post('nomedit3');
					$telefono = $this->input->post('nomedit4');
					$perfil = $this->input->post('nomedit5');
          $this->usuario_model->update_us($id, $nombre, $login, $pass, $correo, $telefono, $perfil);
					$data['results'] = $this->usuario_model->obtener_todos_U();
					$this->load->view('usuarios/usuarios',$data);
        }
    }


    public function delete()
    {
        //$this->session->acceso('Administrador');
				$id = $this->input->get('id');
				//echo $id;
				$this->usuario_model->delete_user($id);
				$data['results'] = $this->usuario_model->obtener_todos_U();
				$this->load->view('usuarios/usuarios',$data);
        //if($confirmar)
        //{
            //$response = $this->usuario_model->delete_user($id);
            //if($response)
            //    redirect('usuarios/query/delete/ok');
            //else
            //    redirect('usuarios/query/delete/err');
        //}
        //$data['link'] = base_url().'index.php/usuarios/delete/'.$id.'/true';
        //$this->load->view('usuarios/delete_user', $data);
    }


}
/* End of file usuarios.php */
/* Location: ./application/controllers/usuarios.php */
