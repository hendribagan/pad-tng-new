<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class jalan_kelas_model extends CI_Model {
	private $tbl = 'pad_reklame_kelas_jalan';
	
	function __construct() {
		parent::__construct();
	}
	
	function get_all()
	{
		$this->db->order_by('nama'); 
		$query = $this->db->get($this->tbl);
		if($query->num_rows()!==0)
		{
			return $query->result();
		}
		else
			return FALSE;
	}
	
	function get_select($jalan_id='')
	{
        $sql = "select distinct jk.id, jk.nama, jk.nilai
            from pad_reklame_kelas_jalan jk
            left join pad_reklame_jalan j on j.jalan_kelas_id=jk.id ";
        $where = "where j.id is null";
		if (!empty($jalan_id)) 
            $where = "where j.id={$jalan_id}";
		
		// $this->db->order_by('nama');  
		$query = $this->db->query($sql.$where);
		if($query->num_rows()!==0)
		{
			return $query->result();
		}
		else
			return FALSE;
	}
    
	function get_select2()
	{
		$this->db->order_by('nama');  
		$query = $this->db->get($this->tbl);
		if($query->num_rows()!==0)
		{
			return $query->result();
		}
		else
			return FALSE;
	}
	
	function get($id)
	{
		$this->db->where('id',$id);
		$query = $this->db->get($this->tbl);
		if($query->num_rows()!==0)
		{
			return $query->row();
		}
		else
			return FALSE;
	}
	
	//-- admin
	function save($data) {
		$this->db->insert($this->tbl,$data);
		return $this->db->insert_id();
	}
	
	function update($id, $data) {
		$this->db->where('id', $id);
		$this->db->update($this->tbl,$data);
	}
	
	function delete($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->tbl);
	}
}

/* End of file _model.php */