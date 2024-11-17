
<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Info_doctor_model extends MY_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = "info_doctors";
	}
	public function get_info_doctor()
	{
		$this->db->select('ID.*, SP.id as specialty');
		$this->db->from('info_doctors as ID');
		$this->db->join('specialties as SP', 'SP.id = ID.specialty_id');
		return $this->db->get()->result_array();
	}
	public function get_info_doctor_id($id)
	{
		$this->db->select('*');
		$this->db->from('info_doctors');
		$this->db->where( 'id', $id);
		return $this->db->get()->result_array();
	}
	public function get_all_info_doctor()
	{
		$this->db->select([
			'id', 'name','title','role','N.created_at'
		]);
		$this->db->from('info_doctors as N');
		$SQL = $this->db->get_compiled_select();
		return $this->datatable->LoadJson($SQL);
	}
	/**
	 * Cập nhật chính sách
	 * @param: mảng chứa dữ liệu cập nhật và id chính muốn cập nhật
	 *
	 */
	public function update_info_doctor($data, $id)
	{
		$this->db->where('id', $id);
		return $this->db->update('info_doctors', $data);
	}
	public function delete_info_doctor($id)
	{
		return $this->delete($id);
	}
}
