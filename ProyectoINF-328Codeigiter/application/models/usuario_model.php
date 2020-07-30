<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Usuario_model extends CI_Model {
		public function __construct()
    {
		$this->load->database();
		//$this->load->helper('security');
		}

		public function nuevo($login, $pass)
    {
        $query = $this->db->get_where('usuarios', array('login' => $login, 'pass' => $pass));
        if($query->num_rows() == 1)
        {
                return true;
        }
        else {
        			return false;
        }
    }
		public function obtener_todos_U()
    {
				//$this->db->select('id,nombre');
				//$this->db->from('autores');
				//$this->db->order_by('id','asc');
        //$consulta = $this->db->get();
				//$resultado = $consulta->result();
				$query = $this->db->get('usuarios');
				return $query;
    }


    /**
     * Función auxiliar que genera un código random, con caracteres alfanuméricos.
     * @return String Código generado.
     */
    public function generate_code()
    {
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890";
        $cad = "";
        for($i=0;$i<10;$i++) {
            $cad .= substr($str,rand(0,62),1);
        }
        return $cad;
    }
		public function mostrar_modelo($valor)
    {
        $this->db->like("titulo_p",$valor);
				$consulta = $this->db->get("documento");
        return $consulta->result();
    }

    public function insertar($nombre, $login, $pass, $correo, $telefono, $perfil)
    {
    		$data = array(
    				'nombre'    => $nombre,
    				'login'     => $login,
						'pass'	    => $pass,
    				'correo'    => $correo,
    				'telefono'  => $telefono,
    				'perfil'    => $perfil
    			);
    		return $this->db->insert('usuarios', $data);
    }

    public function update_us($id, $nombre, $login, $pass, $correo, $telefono, $perfil)
    {
				//echo "<script> alert('".$correo."');</script>";
        $data = array(
                    'nombre' => $nombre,
                    'login'  => $login,
										'pass'  => $pass,
                    'correo' => $correo,
                    'telefono' => $telefono,
                    'perfil' => $perfil
                );
            $this->db->where('id', $id);
            $this->db->update('usuarios', $data);
    }

    /*public function update_pass($id, $pass)
    {
        $data = array(
                    //'pass' => do_hash($pass, 'md5')
										'pass' => $pass
                );
        $this->db->where('id', $id);
        return $this->db->update('usuarios', $data);
    }*/

    public function delete_user($id)
    {
				$this->db->delete('usuarios', array('id' => $id ));
				//$this->db->where('id', $id);
        //$query = $this->db->get('usuarios');
        //if($query)
        //{
        //    $this->db->where('id', $id);
        //    return $this->db->delete('usuarios');
        //}
    }
}

/* End of file usuario_model.php */
/* Location: ./application/models/usuario_model.php */
