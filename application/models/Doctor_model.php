
<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Doctor_model extends MY_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = "doctor";
	}
	public function get_doctor()
	{
		$this->db->select('*');
		$this->db->from('doctor');
		return $this->db->get()->result_array();
	}
	public function get_doctor_id($id)
	{
		$this->db->select('*');
		$this->db->from('doctor');
		$this->db->where( 'id', $id);
		return $this->db->get()->result_array();
	}
	public function get_all_doctor()
	{
		$this->db->select([
			'id', 'name','title','role','N.created_at'
		]);
		$this->db->from('doctor as N');
		$SQL = $this->db->get_compiled_select();
		return $this->datatable->LoadJson($SQL);
	}
	/**
	 * Cập nhật chính sách
	 * @param: mảng chứa dữ liệu cập nhật và id chính muốn cập nhật
	 *
	 */
	public function update_doctor($data, $id)
	{
		$this->db->where('id', $id);
		return $this->db->update('doctor', $data);
	}
	public function delete_doctor($id)
	{
		return $this->delete($id);
	}
}
