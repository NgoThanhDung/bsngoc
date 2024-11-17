<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Security extends Admin_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Security_model', 'Security');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}

	public function index()
	{
		// echo $this->News->test();
		echo "<pre>";
		return;
	}
	// ================= QUẢN LÝ SECURITY - BẢO MẬT ================= //
	/**
	 * Render trang danh sách chính sách bảo mật
	 */
	public function render_security_list_page()
	{
		$view_data = [
			'title' => 'Danh sách chính sách',
			'view' => 'backend/pages/security/security_list',
			'tab' => 'security,security_list'
		];
		$this->load->view('backend/layout', $view_data);
	}
	/**
	 *
	 */
	public function security_datatable_json()
	{
		$security = $this->Security->get_all_security();
		$security_data = array();
		foreach ($security['data'] as $security_piece) {
				$link = $security_piece['alias'];
				$security_data[] = array(
					$security_piece['id'],
					$security_piece['name'],
					'<a href="' . base_url($link) . '" target="_blank">' . $link . '</a>',
					$security_piece['created_at'],
					'<div class="action-buttons td-actions text-right">
						<a href="' . base_url("admin/security/" . $security_piece['id'] . "/edit") . '" class="edit-action"><i class="la la-edit edit"></i></a>
					</div>'
				);
		}
		$security['data'] = $security_data;
		echo json_encode($security);
	}
	/**
	 * Render trang chỉnh sửa chính sách
	 *
	 */
	public function render_edit_security_page($security_id)
	{
		$security = (array) $this->Security->get_security_id($security_id);
		$view_data = [
			'title' => 'Chỉnh sửa chính sách',
			'view' => 'backend/pages/security/security_edit',
			'security' => $security,
			'tab' => 'security,'
		];
		$this->load->view('backend/layout', $view_data);
	}
	/*
	*
	* Cập nhật tin tức
	*
	*/
	public function update_security()
	{
		$security_id = $this->input->post('id') ? $this->input->post('id') : -1;
		$data_to_update = [
			'author' => $this->session->userdata('id'),
			'thumbnail' => $this->input->post('thumbnail'),
			'content' => $this->input->post('content', FALSE),
			'caption' => $this->input->post('caption'),
			'status' => $this->input->post('status'),
			'keyword' => $this->input->post('keyword'),
			'description' => $this->input->post('description'),
		];
		if (!$this->Security->update_security($data_to_update, $security_id)) {
			$this->flash('Có lỗi xảy ra, không thể cập nhật tin tức ngay bây giờ');
			redirect(base_url('admin/security/' . $security_id . '/edit'));
			return;
		} else {
			$this->flash('Cập nhật chính sách thành công');
			redirect(base_url('admin/security'));
			return;
		}
	}

}
