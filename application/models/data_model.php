<?php
class Data_model extends CI_Model {
	function getAll() {
		$q=$this->db->query("select * from data");
		if($q->num_rows()>0){
			foreach ($q->result() as $row) {
				$data[]=$row;
			}
		   
		}
		else {
			$data[]="No Rows returned";
		}
		return $data;
	}	
}