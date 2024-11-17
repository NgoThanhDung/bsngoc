<?php

/**
 *
 */
class MY_Model extends CI_Model
{
	function __construct() {
		parent::__construct();
	}

	protected $table = "default_model";
	protected $primaryKey = "id";


	/**
	 * Kiểm tra table có dữ liệu hay không
	 * @return int số dòng dữ liệu có trong bảng
	 */
	public function check_table()
  {
    return $this->db->count_all_results($this->table);
  }

	/**
	 * Check 1 cột với dữ liệu truyền vào
	 * @param: tên cột và dữ liệu muốn check
	 */
	public function field_check($field_name, $field_value) {
		if (empty($field_name) || empty($field_value)) {
			return FALSE;
		}
		return $this->db->where($field_name, $field_value)
						->limit(1)
						->count_all_results($this->table) > 0;
	}

	/**
	 * Check 1 bộ dữ liệu có tồn tại hay không
	 * @param: điều kiện check
	 * @return bool
	 */
	public function check_with_conditions($condition = [], $table = "")
	{
		if (!$condition || empty($table)) {
			return FALSE;
		}

		return $this->db->where($condition)
						->limit(1)
						->count_all_results($table) > 0;
	}


	/**
	* Tìm đối tượng của một bảng nào đó. Nếu không có trả về trang 404
	*
	* @param id hoặc mảng
	* @return 404 hoặc đối tượng nếu tồn tại
	*/

	public function first_or_fail($where) {
		if (is_array($where)) {
			$this->db->where($where);
		} else {
			$this->db->where($this->primaryKey, $where);
		}

		$object = $this->db->get($this->table)->row();

		if (!$object) {
			show_404();
		}
		return $object;
	}

	/**
	* Tìm đối tượng của một bảng nào đó theo id
	*
	* @param id
	* @return 404 hoặc đối tượng nếu tồn tại
	*/

	public function find($id) {
		$object = $this->db->get_where($this->table, [$this->primaryKey => $id])->row();
		return $object;
	}


	/**
	* Update record
	*
	* @param 2 array: array [cột => giá trị cần update ] và array [cột => giá trị cần để tìm ra đối tượng].
	* Hoặc data_to_update là object
	* @condition: Nếu $data_to_update là mảng => phải có điều kiện đi kèm.
	* @return true ()
	*/

	public function update($data_to_update, $condition=[]) {
		if(empty($condition)) {
			$id = $this->primaryKey;
			$condition[$id] = $data_to_update->$id;
		}
		$this->db->update($this->table, $data_to_update, $condition);
		return $this->db->affected_rows() > 0;
	}


	/**
	 * Thêm 1 bộ dữ liệu vào bảng trong database
	 *
	 * @param Mảng $data chứa dữ liệu cần insert (tên cột => giá trị)
	 * @return số dòng bị thay đổi
	 */

	public function insert($data) {
		$this->db->insert($this->table, $data);
		return $this->db->affected_rows();
	}


	/**
	 * Lấy tất cả dữ liệu từ 1 bảng
	 *
	 * @param ---
	 * @return mảng chứa dữ liệu của 1 bảng
	 *
	 */

	public function all($return_type = 'result_array') {
		return $this->db->get($this->table)->$return_type();
	}


	/**
	 * Lấy cột của một bảng
	 *
	 * @param ---
	 * @return mảng chứa dữ liệu 1 cột của 1 mảng
	 *
	 */

	public function get_columns($array, $column_name) {
		return array_column($array, $column_name);
	}


	/**
	 * Xóa dữ liệu trong bảng
	 * @param: Khóa chính hoặc mảng chứa điều kiện
	 */
	public function delete($condition_or_id) {
		if (!is_array($condition_or_id)) {
			$condition_or_id = [$this->primaryKey => $condition_or_id];
		}
		$this->db->delete($this->table, $condition_or_id);
		return $this->db->affected_rows() > 0;
	}

	public function insert_and_get_id($data, $table="")
	{
		if (empty($data) || empty($table)) {
			return FALSE;
		}
		$this->db->insert($table, $data);
		return $this->db->insert_id();
	}

	/**
	 * Lấy ra dòng đầu tiên thỏa điều kiện.
	 * @param  array  $condition mảng điều kiện
	 * @param  string $table     tên bảng
	 * @return object
	 */
	public function first($condition = [], $table = '')
	{
		if (is_array($condition)) {
			$this->db->where($condition);
		} else {
			$this->db->where($this->primaryKey, $condition);
		}

		return $object = $this->db->get($table)->row();
	}

}
