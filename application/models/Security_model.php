
<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Security_model extends MY_Model
{

	function __construct()
	{
		parent::__construct();
	}
	public $alias_prefix = "chinh-sach/";
	public function get_about()
	{
		$this->db->select('name,caption,content,title,keyword,description,thumbnail,view,created_at');
		$this->db->from('security');
		$this->db->where(['status' => 1, 'id' => 4]);
		return $this->db->get()->result_array();
	}
	public function get_security_id($id)
	{
		$this->db->select('*');
		$this->db->from('security');
		$this->db->where(['status' => 1, 'id' => $id]);
		return $this->db->get()->result_array();
	}
	public function get_all_security()
	{
		$this->db->select([
			'id', 'name',
			'status', 'created_at', 'alias'
		]);
		$this->db->from('security');
		$SQL = $this->db->get_compiled_select();
		return $this->datatable->LoadJson($SQL);
	}
	/**
	 * Cập nhật chính sách
	 * @param: mảng chứa dữ liệu cập nhật và id chính muốn cập nhật
	 *
	 */
	public function update_security($data, $id)
	{
		$this->db->where('id', $id);
		return $this->db->update('security', $data);
	}
		public function update_view($id, $old_view)
	{
		$data = [
			'view' => $old_view + 1
		];
		$this->db->where('id', $id);
		return $this->db->update('security', $data);
	}
}
