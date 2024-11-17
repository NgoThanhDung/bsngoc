<?php
defined('BASEPATH') or exit('No direct script access allowed');

/**
 *
 */
class Doctor extends Admin_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('Doctor_model', 'Doctor');
		$this->load->library('datatable'); // loaded my custom serverside datatable library
	}
	// ================= QUẢN LÝ Doctor - Bác sĩ ================= //

	/**
	 * Render trang danh sách tin tức
	 */
	public function render_doctor_list_page()
	{
		$view_data = [
			'title' => 'Danh sách đội ngũ bác sĩ',
			'view' => 'backend/pages/doctor/doctor_list',
			'tab' => 'doctor,doctor_list'
		];
		$this->load->view('backend/layout', $view_data);
	}
	/**
	 *
	 */
	public function doctor_datatable_json()
	{
		$doctor = $this->Doctor->get_all_doctor();
		$doctor_data = array();
		foreach ($doctor['data'] as $index => $v) {
			$doctor_data[] = array(
				$index += 1,
				$v['name'],
				$v['title'],
				$v['role'],
				'<div class="action-buttons td-actions text-right">
					<a href="' . base_url("admin/doctor/" . $v['id'] . "/edit") . '" class="edit-action"><i class="la la-edit edit"></i></a>
					<a data-doctor-name="' . $v['name'] . '" data-href="' . base_url("admin/doctor/" . $v['id'] . "/delete") . '" href="#/" class="delete-action"><i class="la la-close delete"></i></a>
				</div>'
			);
		}
		$doctor['data'] = $doctor_data;
		echo json_encode($doctor);
	}
	public function render_create_doctor_page()
	{
		$view_data = [
			'title' => 'Thêm mới đội ngũ bác sĩ',
			'view' => 'backend/pages/doctor/doctor_create',
			'tab' => 'doctor,doctor_create'
		];
		$this->load->view('backend/layout', $view_data);
	}
	public function create_doctor()
	{
		$form_data = [
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description', FALSE),
		];

		// Sử dụng Library Validation
		if ($this->validation->validate_form($form_data) == FALSE) {
			$this->render_create_doctor_page();
			return;
		}

		$data_to_insert = [
			'name' => $this->input->post('name'),
			'role' => $this->input->post('role'),
			'title' => $this->input->post('title'),
			'description' => $this->input->post('description'),
			'image' => $this->input->post('image'),
		];

		if (!$this->Doctor->insert($data_to_insert)) {
			$this->flash('Thêm thất bại');
			$this->render_create_doctor_page();
			return;
		} else {
			$this->flash('Thêm bác sĩ thành công');
			redirect(base_url('admin/doctor'));
			return;
		}
	}

	/**
	 * Render trang chỉnh sửa bác sĩ
	 *
	 */
	public function render_edit_doctor_page($id)
	{
		$doctor = (array) $this->Doctor->first_or_fail($id);
		$view_data = [
			'title' => 'Chỉnh sửa bác sĩ',
			'view' => 'backend/pages/doctor/doctor_edit',
			'doctor' => $doctor,
			'tab' => 'doctor,doctor_edit'
		];
		$this->load->view('backend/layout', $view_data);
	}
	/*
	*
	* Cập nhật bác sĩ
	*
	*/
	public function update_doctor()
	{
		$id = $this->input->post('id') ? $this->input->post('id') : -1;
		$data_to_update = [
			'name' => $this->input->post('name'),
			'title' => $this->input->post('title'),
			'role' => $this->input->post('role'),
			'image' => $this->input->post('image'),
			'description' => $this->input->post('description', FALSE),
		];
		if (!$this->Doctor->update_doctor($data_to_update, $id)) {
			$this->flash('Có lỗi xảy ra, không thể cập nhật bác sĩ ngay bây giờ');
			redirect(base_url('admin/doctor/' . $id . '/edit'));
			return;
		} else {
			$this->flash('Cập nhật bác sĩ thành công');
			redirect(base_url('admin/doctor'));
			return;
		}
	}
	/*
	*
	* Xóa bác sĩ
	*
	*/
	public function delete_doctor($id)
	{
		if (!$this->Doctor->delete_doctor($id)) {
			$this->flash('Có lỗi xảy ra, không thể xóa bác sĩ này');
		} else {
			$this->flash('Xóa bác sĩ thành công');
		}
		redirect(base_url('admin/doctor'));
	}
	// ================= END doctor - bác sĩ ================= //
}
