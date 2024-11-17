<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Treatment extends Admin_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('Treatment_model', 'Treatment');
		$this->load->library('datatable');
	}
	public function index()
	{
		$data = (array) $this->Treatment->first_or_fail(1);
		$view_data = [
			'title' => 'Chỉnh sửa chuyên điều trị',
			'view' => 'backend/pages/treatment/treatment_edit',
			'data' => $data,
			'tab' => 'treatment'
		];
		$this->load->view('backend/layout', $view_data);
	}
	public function update()
	{
		$data_to_update = [
			'content' => $this->input->post('content', FALSE),
		];
		if (!$this->Treatment->update_treatment($data_to_update)) {
			$this->flash('Có lỗi xảy ra, không thể cập nhật ngay bây giờ');
			redirect(base_url('admin/treatment'));
			return;
		} else {
			$this->flash('Cập nhật thành công');
			redirect(base_url('admin/treatment'));
			return;
		}
	}
}
