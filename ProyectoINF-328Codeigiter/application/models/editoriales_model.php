<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Editoriales_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function obtener_todos_E()
	{
			$query = $this->db->get('editorial');
			return $query;
	}
	public function delete_E($id)
	{
			$this->db->delete('editorial', array('id' => $id ));
			//$this->db->where('id', $id);
			//$query = $this->db->get('usuarios');
			//if($query)
			//{
			//    $this->db->where('id', $id);
			//    return $this->db->delete('usuarios');
			//}
	}
	public function update_e($id, $nombre)
	{
			//echo "<script> alert('".$correo."');</script>";
			$data = array(
									'nombre' => $nombre
							);
					$this->db->where('id', $id);
					$this->db->update('editorial', $data);
	}
	public function nuevoE($nombre)
	{
			$query = $this->db->get_where('editorial', array('nombre' => $nombre));
			if($query->num_rows() == 1)
			{
							return true;
			}
			else {
						return false;
			}
	}
	public function insertarE($nombre)
	{
			$data = array( 'nombre' => $nombre );
			return $this->db->insert('editorial', $data);
	}

	public function dev_idE($editorial)
	{
			$this->db->select('id');
			$this->db->where('nombre', $editorial);
			//$this->db->order_by('id', 'asc');
			$consulta = $this->db->get('editorial');
			if($consulta->num_rows() > 0)
	        {
							foreach ($consulta->result() as $dato) {
									$idE = $dato->id;
							}
							return $idE;
	        }else
	        {
	        	return array();
	        }
		}


}

/* End of file editoriales_model.php */
/* Location: ./application/models/editoriales_model.php */
