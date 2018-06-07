<?php 
/**
 * 
 */
class Dbstamu extends CI_Model
{
	
	function getData(){
		$data = $this->db->get('pegawai');
		return $data;
	}
}
 ?>