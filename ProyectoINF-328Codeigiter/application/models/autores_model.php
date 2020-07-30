<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Autores_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function obtener_todos_A()
	{
		//$this->db->order_by("nombre", "asc");
		//$query = $this->db->get('autores');
		//
		//if($query->num_rows() > 0)
		//		{
		//				return $query->result_array();
		//		}
			$query = $this->db->get('autores');
			return $query;
	}
	public function delete_A($id)
	{
			$this->db->delete('autores', array('id' => $id ));
	}
	public function update_a($id, $nombre)
	{
			//echo "<script> alert('".$correo."');</script>";
			$data = array('nombre' => $nombre);
					$this->db->where('id', $id);
					$this->db->update('autores', $data);
	}
	public function nuevoA($nombre)
	{
			$query = $this->db->get_where('autores', array('nombre' => $nombre));
			if($query->num_rows() == 1)
			{
							return true;
			}
			else {
						return false;
			}
	}
	public function insertarA($nombre)
	{
			$data = array( 'nombre' => $nombre );
			return $this->db->insert('autores', $data);
	}
	public function dev_idA($autor)
	{
			$this->db->select('id');
			$this->db->where('nombre', $autor);
			//$this->db->order_by('id', 'asc');
			$consulta = $this->db->get('autores');
			if($consulta->num_rows() > 0)
	        {
							foreach ($consulta->result() as $dato) {
									$idA = $dato->id;
							}
							return $idA;
	        }else
	        {
	        	return array();
	        }
		}

}

/* End of file autores_model.php */
/* Location: ./application/models/autores_model.php */
