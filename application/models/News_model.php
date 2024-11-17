
<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 *
 */
class News_model extends MY_Model
{

	function __construct()
	{
		parent::__construct();
		$this->table = "news";
		// mặc định trong MY_Model primaryKey = "id"
		// $this->primaryKey = "id";
	}

	public $alias_prefix = "tin-tuc/";

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
	public function get_all_news()
	{
		$this->db->select([
			'N.id as news_id', 'N.name as news_name', 'N.view as news_view','N.hot as news_hot',
			'N.status as news_status', 'N.created_at as news_created_at', 'N.alias as news_alias',
			'N.category_id as category_id',
			'NC.name as category_name', 'NC.alias as category_alias', 'N.author as author_id',
			'U.firstname as author_firstname', 'U.lastname as author_lastname', 'U.avatar as author_avatar'
		]);
		$this->db->from('news as N');
		$this->db->join('news_categories as NC', 'N.category_id = NC.id');
		$this->db->join('users as U', 'N.author = U.id');

		$SQL = $this->db->get_compiled_select();
		return $this->datatable->LoadJson($SQL);
	}
	public function get_new_page($offset, $limit)
	{

		$this->db->select([
			'N.id', 'N.category_id', 'N.name', 'N.view', 'N.thumbnail', 'N.title', 'N.keyword', 'N.description',
			'N.status', 'N.created_at', 'N.alias', 'N.caption',
			'N.category_id',
			'NC.name as category_name', 'NC.alias as category_alias', 'N.author as author_id'
		]);
		$this->db->from('news as N');
		$this->db->join('news_categories as NC', 'N.category_id = NC.id');
		$this->db->where(['N.status' => 1]);
		$this->db->limit($offset, $limit);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function get_shop_rice($offset, $limit)
	{

		$this->db->select([
			'N.id as news_id', 'N.category_id as news_category_id', 'N.name as news_name', 'N.view as news_view', 'N.thumbnail as news_thumbnail', 'N.title as news_title', 'N.keyword as news_keyword', 'N.description as news_description',
			'N.status as news_status', 'N.created_at as news_created_at', 'N.alias as news_alias', 'N.caption as news_caption',
			'N.category_id as category_id',
			'NC.name as category_name', 'NC.alias as category_alias', 'N.author as author_id'
		]);
		$this->db->from('news as N');
		$this->db->join('news_categories as NC', 'N.category_id = NC.id');
		$this->db->where(['N.status' => 1, 'category_id' => 5]);
		$this->db->limit($offset, $limit);
		$query = $this->db->get();
		return $query->result_array();
	}

	/**
	 * Cập nhật tin tức
	 * @param: mảng chứa dữ liệu cập nhật và id tin tức muốn cập nhật
	 *
	 */
	public function update_news($data, $id)
	{
		return $this->update($data, [$this->primaryKey => $id]);
	}
	/**
	 * Xóa tin tức
	 */
	public function delete_news($news_id)
	{
		return $this->delete($news_id);
	}
	public function count_row()

	{
		return $this->db->where(['status' => 1])->get($this->table)->num_rows();
	}
	public function get_news_detail($alias,$id)
	{
		$condition = [
			'status' => 1,
			'alias' => $alias,
			'id' => $id
		];
		$this->db->select('id,name,caption,thumbnail,category_id,content,view,title,keyword,description,created_at')->from('news')->where($condition);
		$query = $this->db->get();
		return $query->result_array();
	}
	public function update_view($id, $old_view)
	{
		$this->update(['view' => $old_view + 1], [$this->primaryKey => $id]);
	}
	public function get_all_blog_hot()
	{
		$this->db->select('id,name,alias,caption,thumbnail');
		$this->db->from($this->table);
		$this->db->where(['status' => 1, 'hot' => 1]);
		$this->db->order_by('created_at', 'DESC');
		return $this->db->get()->result_array();
	}
	public function get_all_blog_cate_id($id)
	{
		$this->db->select('id,name,alias');
		$this->db->from($this->table);
		$this->db->where(['status' => 1, 'category_id' => $id]);
		$this->db->order_by('created_at', 'DESC');
		return $this->db->get()->result_array();
	}
	public function get_blog_related($cate_id)
	{
		$this->db->select('id,alias,name,thumbnail');
		$this->db->from($this->table);
		$this->db->where(['status' => 1, 'category_id' => $cate_id]);
		$this->db->limit(2, 0);
		$this->db->order_by('created_at', 'DESC');
		return $this->db->get()->result_array();
	}
	public function get_blog_by_cate($cate_id)
	{
		$this->db->select('id,alias,name,thumbnail,caption');
		$this->db->from($this->table);
		$this->db->where(['status' => 1, 'category_id' => $cate_id]);
		$this->db->limit(5, 0);
		$this->db->order_by('created_at', 'DESC');
		return $this->db->get()->result_array();
	}
	public function get_latest_articles($limit = 5, $offset = 0)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where(['status' => 1]);
		if ($limit > 0) {
			$this->db->limit($limit, $offset);
		}
		$this->db->order_by('created_at', 'DESC');
		return $this->db->get()->result_array();
	}
	public function search_news_by_name($keyword, $limit = 0)
	{
	    $this->db->select([
			'*',
		  ]);
		  $this->db->from('news');
		  $this->db->where(['status' => 1]);
		  $this->db->like('name', " ".$keyword, 'both');
		  $this->db->or_like('name', $keyword, 'after');
		  $this->db->order_by('created_at', 'desc');
		  $this->db->group_by('id');
		  if ($limit > 0) {
			$this->db->limit($limit, 0);
		  }
		  return $this->db->get()->result_array();
	}
}
