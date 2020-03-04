<?php 
class M_users extends CI_Model{
	function getdata(){
		$this->db->from('perpus.users');
$this->db->order_by("id asc");
$query = $this->db->get(); 
return $query;
		
}
public function get()
	{
		$this->db->select('*');
		$this->db->from('perpus.users a');
		$this->db->join('perpus.tb_role b', 'b.id_role = a.id_role','left');
		$query = $this->db->get()->result();
		return $query;
	}
	public function get_role(){
	$this->db->select('*');
		$this->db->from('perpus.tb_role');
		$query = $this->db->get()->result_array();
		return $query;
}
public function save($data){
//return $this->db->insert($table,$data);
$this->db->insert('perpus.users' ,$data);
            return true;

}
public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('perpus.users');

		return true;
	}
}
 ?>