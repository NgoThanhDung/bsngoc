<div class="row flex-row">
	<div class="col-12">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4><?= $title ?></h4>
			</div>
			<div class="widget-body">
				<?php echo form_open(base_url('admin/doctor/create'), ['class' => 'form-horizontal create-doctor-form']); ?>
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Tên bác sĩ</label>
					<div class="col-md-10">
						<input type="text" class="form-control unicode name" name="name" value="<?= set_value('name') ?>" autocomplete="off">
						<small>
							<code>Bắt buộc</code>
						</small>
					</div>
				</div>
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Chức danh</label>
					<div class="col-md-10">
						<input type="text" class="form-control unicode" name="title" value="<?= set_value('title') ?>" autocomplete="off">
						<small>
							<code>Nên có</code>
						</small>
					</div>
				</div>
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Chức vụ</label>
					<div class="col-md-10">
						<input type="text" class="form-control unicode" name="role" value="<?= set_value('role') ?>" autocomplete="off">
						<small>
							<code>Nên có</code>
						</small>
					</div>
				</div>
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-lg-2 form-control-label d-flex justify-content-md-end">Hình đại diện</label>
					<div class="col-lg-10">
						<div class="form-group">
							<div>
								<img class="doctorimage" src="" alt="" style="display: block; max-width: 100%">
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-btn">
									<a href="/filemanager/dialog.php?type=1&field_id=doctorimage&relative_url=1" class="btn btn-primary ripple upload-news-image-btn stand-alone-filemanager">
										<i class="la la-image"></i>
									</a>
								</span>
								<input type="text" class="form-control" name="image" id="doctorimage" value="" required>
							</div>
						</div>
					</div>
				</div>
				<!-- ======================= -->
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Mô tả</label>
					<div class="col-md-10">
						<textarea type="text" class="form-control tinymce_content" name="description" value="<?= set_value('description') ?>" autocomplete="off"></textarea>
						<small>
							<code>Bắt buộc</code>
						</small>
					</div>
				</div>
				<div class="em-separator separator-dashed"></div>
				<div class="col-md-10 offset-md-2 text-right">
					<button class="btn btn-gradient-02" type="submit">Thêm mới</button>
				</div>
				<!-- ======================= -->
				<?php echo form_close(); ?>
			</div>
		</div>
		<!-- End Form -->
	</div>
</div>
<!-- End Row -->