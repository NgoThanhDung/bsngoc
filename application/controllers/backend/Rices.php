<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Rices extends Admin_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Rices_model', 'Rices');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}

	public function index()
	{
		// echo $this->News->test();
		echo "<pre>";
		return;
	}

	// ================= QUẢN LÝ NEWS - TIN TỨC ================= //

	/**
	 * Render trang danh sách tin tức
	 */
	public function render_rices_list_page()
	{
		$view_data = [
			'title' => 'Danh sách gạo sạch',
			// 'css_file' => 'backend/includes/css_file/datatable_css.php',
			// 'js_file' => 'backend/includes/js_file/datatable_js.php',
			'view' => 'backend/pages/rices/rices_list',
			'tab' => 'rices,rices_list'
		];
		// $news = $this->News->
		$this->load->view('backend/layout', $view_data);
	}

	/**
	 *
	 */
	public function rices_datatable_json()
	{
		$rices = $this->Rices->get_all_rices();
		$rices_data = array();
		foreach ($rices['data'] as $rices_piece) {
			$link =$rices_piece['rices_alias'] . '-' . $rices_piece['rices_id'];
			$rices_data[] = array(
				$rices_piece['rices_id'],
				$rices_piece['rices_name'],
				'<a href="' . base_url($link) . '">' . $link . '</a>',
				$rices_piece['rices_created_at'],
				'<div class="action-buttons td-actions text-right">
					<a href="' . base_url("admin/rices/" . $rices_piece['rices_id'] . "/edit") . '" class="edit-action"><i class="la la-edit edit"></i></a>
					<a data-rices_piece-name="' . $rices_piece['rices_name'] . '" data-href="' . base_url("admin/rices/" . $rices_piece['rices_id'] . "/delete") . '" href="#/" class="delete-action"><i class="la la-close delete"></i></a>
				</div>'
			);
		}
		$rices['data'] = $rices_data;
		echo json_encode($rices);
	}

	/**
	 * Render trang thêm gạo sạch
	 */
	public function render_create_rices_page()
	{
		$view_data = [
			'title' => 'Thêm mới gạo sạch',
			// 'css_file' => 'backend/includes/css_file/datatable_css.php',
			// 'js_file' => 'backend/includes/js_file/datatable_js.php',
			'view' => 'backend/pages/rices/rices_create',
			'tab' => 'rices,rices_create'
		];
		$this->load->view('backend/layout', $view_data);
	}

	/**
	 * Thêm gạo sạch mới
	 */
	public function create_rices()
	{
		$form_data = [
			'news_name' => $this->input->post('name'),
			'news_alias' => make_alias($this->input->post('name')),
			'news_thumbnail' => $this->input->post('thumbnail'),
			'news_content' => $this->input->post('content', FALSE),
		];
		
		
		// Sử dụng Library Validation
		if ($this->validation->validate_form($form_data) == FALSE) {
			$this->render_create_rices_page();
			return;
		}
		$data_to_insert = [
			'author' => $this->session->userdata('id'),
			'name' => $this->input->post('name'),
			'category_id' => 5,
			'alias' => make_alias($this->input->post('name')),
			'thumbnail' => $this->input->post('thumbnail'),
			'content' => $this->input->post('content', FALSE),
			'caption' => $this->input->post('caption'),
			'created_at' => date('Y-m-d H:i:s'),
			'status' => $this->input->post('status'),
			'title' => $this->input->post('title') ? $this->input->post('title') : $this->input->post('name'),
			'keyword' => $this->input->post('keyword'),
			'description' => $this->input->post('description'),
		];

	
		if (!$this->Rices->insert($data_to_insert)) {
			$this->flash('Thêm gạo sạch không thành công');
			$this->render_create_rices_page();
			return;
		} else {
			$this->flash('Thêm gạo sạch thành công');
			redirect(base_url('admin/rices'));
			return;
		}
	}

	/**
	 * Render trang chỉnh sửa gạo sạch
	 *
	 */
	public function render_edit_rices_page($rices_id)
	{
		$rices = (array) $this->Rices->first_or_fail($rices_id);
		$view_data = [
			'title' => 'Chỉnh sửa gạo sạch',
			'view' => 'backend/pages/rices/rices_edit',
			'rices' => $rices,
			'tab' => 'rices,'
		];
		$this->load->view('backend/layout', $view_data);
	}

	/*
	*
	* Cập nhật tin tức
	*
	*/
	public function update_rices()
	{
		$rices_id = $this->input->post('id') ? $this->input->post('id') : -1;
		$form_data = [
			// 'news_name' => $this->input->post('name'),
			'rices_alias' => make_alias($this->input->post('name')),
			'rices_thumbnail' => $this->input->post('thumbnail'),
			'rices_content' => $this->input->post('content', FALSE),
		];

		$present_rices = (array) $this->Rices->first_or_fail($rices_id);
		if ($present_rices['name'] != $this->input->post('name')) {
			$form_data['rices_name'] = $this->input->post('name');
		}
		// $this->prt($form_data); return;

		// Sử dụng Library Validation
		if ($this->validation->validate_form($form_data) == FALSE) {
			$this->render_edit_rices_page($rices_id);
			return;
		}

		$data_to_update = [
			'author' => $this->session->userdata('id'),
			'name' => $this->input->post('name'),
			'alias' => make_alias($this->input->post('name')),
			'thumbnail' => $this->input->post('thumbnail'),
			'content' => $this->input->post('content', FALSE),
			'caption' => $this->input->post('caption'),
			'status' => $this->input->post('status'),
			'title' => $this->input->post('title') ? $this->input->post('title') : $this->input->post('name'),
			'keyword' => $this->input->post('keyword'),
			'description' => $this->input->post('description'),
		];
		// $this->prt($data_to_update); return;

		if (!$this->Rices->update_rices($data_to_update, $rices_id)) {
			$this->flash('Có lỗi xảy ra, không thể cập nhật gạo sạch ngay bây giờ');
			redirect(base_url('admin/rices/' . $rices_id . '/edit'));
			return;
		} else {
			$this->flash('Cập nhật gạo sạch thành công');
			redirect(base_url('admin/rices'));
			return;
		}
	}

	/*
	*
	* Xóa gạo sạch
	*
	*/
	public function delete_rices($rices_id)
	{
		$rices = $this->Rices->first_or_fail($rices_id);
		if (!$this->Rices->delete_rices($rices_id)) {
			$this->flash('Có lỗi xảy ra, không thể xóa tức này');
		} else {
			$this->flash('Xóa thành công');
		}
		redirect(base_url('admin/rices'));
	}
	// ================= END RICES ================= //
}
