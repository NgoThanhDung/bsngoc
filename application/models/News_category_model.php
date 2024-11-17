
<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class News_category_model extends MY_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = "news_categories";
		// mặc định trong MY_Model primaryKey = "id"
		// $this->primaryKey = "id";
	}

	public $alias_prefix = "tin-tuc/";
	/**
	 * Lấy danh sách danh mục tin tức datatable
	 */
	public function get_all_news_cate()
	{
		$this->db->select()->from('news_categories')->where(['status' => 1]);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Tạo danh mục tin tức mới
	 */
	public function create_news_category($form_data)
	{
		if (!$form_data) {
			return FALSE;
		}
		return $this->insert($form_data) > 0;
	}


	/**
	 * Lấy danh sách danh mục tin tức datatable
	 */
	public function get_all_news_categories()
	{
		$this->db->select('id,name,alias,N.created_at')->from('news_categories as N');
		$SQL = $this->db->get_compiled_select();
		return $this->datatable->LoadJson($SQL);
	}

	/**
	 * Lấy danh mục thông qua Alias
	 */
	public function get_news_by_category($id)
	{
		$this->db->select([
			'N.id','N.title','N.caption', 'N.thumbnail', 'N.name', 'N.view',
			'N.status', 'N.created_at', 'N.alias',
			'N.category_id',
			'NC.name as category_name', 'NC.alias as category_alias',
		]);
		$this->db->from('news as N');
		$this->db->join('news_categories as NC', 'N.category_id = NC.id');
		$this->db->where(['N.category_id' => $id, 'N.status' => 1]);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_category_by_alias($alias = '')
	{
		if (!$alias) {
			return FALSE;
		}
		return $this->db->get_where($this->table, ['alias' => $alias, 'status' => 1])->row_array();
	}
}
