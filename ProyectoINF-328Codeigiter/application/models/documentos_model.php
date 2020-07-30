<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Documentos_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	public function obtener_todos_D()
	{
			$query = $this->db->get('documento');
			return $query;
	}
	public function delete_docu($id)
	{
			$this->db->delete('documento', array('id' => $id ));
	}
	public function update_d($id, $titulo_p, $titulo_s, $idioma, $tipo, $ruta, $descripcion, $palabras_clave)
	{
			//echo "<script> alert('".$correo."');</script>";
			$data = array(
									'titulo_p' => $titulo_p,
									'titulo_s' => $titulo_s,
									'idioma' => $idioma,
									'tipo'  => $tipo,
									'ruta'  => $ruta,
									'descripcion' => $descripcion,
									'palabras_clave' => $palabras_clave
							);
					$this->db->where('id', $id);
					$this->db->update('documento', $data);
	}
	public function nuevoD($titulo_p)
	{
			$query = $this->db->get_where('documento', array('titulo_p' => $titulo_p));
			if($query->num_rows() == 1)
			{
							return true;
			}
			else {
						return false;
			}
	}
	public function insertarD($titulo_p, $titulo_s, $idioma, $tipo, $ruta, $descripcion, $palabras_clave, $ideditorial, $idUD)
	{
			$data = array(
				'titulo_p' => $titulo_p,
				'titulo_s' => $titulo_s,
				'idioma' => $idioma,
				'tipo'  => $tipo,
				'ruta'  => $ruta,
				'descripcion' => $descripcion,
				'palabras_clave' => $palabras_clave,
				'id_editorial' => $ideditorial,
				'id_usuario' => $idUD
				);
			return $this->db->insert('documento', $data);
	}
	public function dev_idD($titulo_p)
	{
			$this->db->select('id');
			$this->db->where('titulo_p', $titulo_p);
			//$this->db->order_by('id', 'asc');
			$consulta = $this->db->get('documento');
			if($consulta->num_rows() > 0)
	        {
							foreach ($consulta->result() as $dato) {
									$idD = $dato->id;
							}
							return $idD;
	        }else
	        {
	        	return array();
	        }
		}

		public function dev_ultid()
		{
				$this->db->select('id');
				//$this->db->where('titulo_p', $titulo_p);
				$this->db->order_by('id', 'desc');
				$consulta = $this->db->get('documento',1);
				if($consulta->num_rows() > 0)
		        {
								foreach ($consulta->result() as $dato) {
										$idD = $dato->id;
								}
								return $idD;
		        }else
		        {
		        	return array();
		        }
			}
		public function escrito($iddoc,$idautor)
		{
			$data = array(
				'id_documento' => $iddoc,
				'id_autor' => $idautor
				);
			return $this->db->insert('escrito', $data);
		}
		public function elimina_escrito($iddoc,$idautor)
		{
				$this->db->delete('escrito', array('id_documento' => $iddoc, 'id_autor' => $idautor ));
		}
		public function dev_id_deEDI($id)
		{
				$this->db->select('id_editorial');
				$this->db->where('id', $id);
				$consulta = $this->db->get('documento');
								$resultadoss= $consulta->row();
								$id_deED = $resultadoss->id_editorial;
								return $id_deED;
			}
			public function dev_id_deAU($id)
			{
					$this->db->select('id_autor');
					$this->db->where('id_documento', $id);
					$consulta = $this->db->get('escrito');
									$resultadoss= $consulta->row();
									$id_deAU = $resultadoss->id_autor;
									return $id_deAU;
				}
			public function obtener_porID_D($id_U)
			{
					$this->db->select('*');
					$this->db->where('id_usuario', $id_U);
					//$this->db->order_by('id', 'asc');
					$query = $this->db->get('documento');
					return $query;
				}
				/*public function obtener_todos_A_deD($id_U)
				{
						$query = 'SELECT es.id_autor as id,au.nombre as nombre FROM documento do inner join escrito es inner join autores au on do.id=es.id_documento and es.id_autor=au.id where do.id_usuario='.$id_U.'';
						$resultados = $this->db->query($query);
						return $resultados;
				}*/
				public function obtener_todos_A_deD($id_U)
				{
					$this->db->select('es.id_autor as id,au.nombre as nombre');
					$this->db->from('documento do');
					$this->db->join('escrito es','do.id=es.id_documento');
					$this->db->join('autores au','es.id_autor=au.id');
					$this->db->where('do.id_usuario', $id_U);
					//$this->db->order_by('id', 'asc');
					$resultados = $this->db->get();
					return $resultados;
					}

				/*public function obtener_todos_E_deD($id_U)
				{
						$query = 'SELECT ed.id as id ,ed.nombre as nombre FROM documento do inner join editorial ed on do.id_editorial=ed.id where do.id_usuario='.$id_U.'';
						$resultados = $this->db->query($query);
						return $resultados;
				}*/
				public function obtener_todos_E_deD($id_U)
				{
					$this->db->select('ed.id id ,ed.nombre nombre');
					$this->db->from('documento do');
					$this->db->join('editorial ed','do.id_editorial=ed.id');
					$this->db->where('do.id_usuario', $id_U);
					//$this->db->order_by('id', 'asc');
					$resultados = $this->db->get();
					return $resultados;
					}

	/*public function delete($id)
	{
		$this->db->where('id', $id);
        $this->db->delete('documento');
	}*/

}

/* End of file documentos_model.php */
/* Location: ./application/models/documentos_model.php */
