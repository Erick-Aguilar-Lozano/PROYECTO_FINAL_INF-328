<?php defined('BASEPATH') OR exit('No direct script access allowed');
class menu_model extends CI_model
{
    public function __construct()
    {
        $this->load->database();
    }
    public function login($nombre, $password)
    {
        $query = $this->db->get_where('usuarios', array('login' => $nombre));
        if($query->num_rows() == 1)
        {
            $row=$query->row();
            if($password== $row->pass)
            {
            //  echo "entro99";
                $data=array('user_data'=>array(
                    'nombre'=>$row->nombre,
                    'id'=>$row->id,
                    'login'=>$row->login,
                    'pass'=>$row->pass,
                    'mail'=>$row->correo,
                    'telefono'=>$row->telefono,
                    'perfil'=>$row->perfil)
                );
                $this->session->set_userdata($data);
                return true;
            }
        }
        $this->session->unset_userdata('user_data');
        return false;
    }
}
