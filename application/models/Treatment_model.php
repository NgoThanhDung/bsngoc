
<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Treatment_model extends MY_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = "treatment";
	}
	public function get_all()
	{
		$this->db->select('*');
		$this->db->from('treatment');
		$this->db->where( 'id',1);
		return $this->db->get()->result_array();
	}
	public function update_treatment($data)
	{
		return $this->update($data, [$this->primaryKey => 1]);
	}

}
