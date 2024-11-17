
<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class Rices_model extends MY_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = "news";
		// mặc định trong MY_Model primaryKey = "id"
		// $this->primaryKey = "id";
	}
	/**
	 * Lấy danh sách danh mục tin tức datatable
	 */
	public function get_all_rices()
	{
		$this->db->select([
			'N.id as rices_id', 'N.category_id as rices_category_id', 'N.name as rices_name', 'N.view as rices_view',
			'N.status as rices_status', 'N.created_at as rices_created_at', 'N.alias as rices_alias',
			'N.author as author_id',
			'U.firstname as author_firstname', 'U.lastname as author_lastname', 'U.avatar as author_avatar'
		]);
		$this->db->from('news as N');
		$this->db->join('users as U', 'N.author = U.id');
		$where = 'category_id = 5';

		$SQL = $this->db->get_compiled_select();
		return $this->datatable->LoadJson($SQL, $where);
	}

	public function get_shop_rice($offset, $limit)
	{
		$this->db->select([
			'N.id', 'N.name', 'N.view', 'N.thumbnail', 'N.title', 'N.keyword', 'N.description',
			'N.status', 'N.created_at', 'N.alias', 'N.caption',
			'N.author as author_id'
		]);
		$this->db->from('news as N');
	$this->db->where(['status' => 1, 'category_id'=>5]);
		$this->db->limit($offset, $limit);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Cập nhật tin tức
	 * @param: mảng chứa dữ liệu cập nhật và id tin tức muốn cập nhật
	 *
	 */
	public function update_rices($data, $id)
	{
		return $this->update($data, [$this->primaryKey => $id]);
	}
	/**
	 * Xóa tin tức
	 */
	public function delete_rices($rices_id)
	{
		return $this->delete($rices_id);
	}
	public function count_row()

	{
		return $this->db->where(['status' => 1, 'category_id' => 5])->get($this->table)->num_rows();
	}

	public function update_view($id, $old_view)
	{
		$this->update(['view' => $old_view + 1], [$this->primaryKey => $id]);
	}
	public function get_shop_related()
	{
		$this->db->select('id,alias,name,thumbnail');
		$this->db->from($this->table);
		$this->db->where(['status' => 1, 'category_id'=>5]);
		$this->db->limit(2, 0);
		$this->db->order_by('created_at', 'DESC');
		return $this->db->get()->result_array();
	}
}
