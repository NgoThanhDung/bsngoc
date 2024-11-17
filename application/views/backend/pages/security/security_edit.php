<div class="row flex-row">
	<div class="col-12">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4><?= $title ?></h4>
			</div>
			<div class="widget-body">
				<?php echo form_open(base_url('admin/security/update'), ['class' => 'form-horizontal create-security-form']); ?>
				<input type="hidden" name="id" value="<?= $security[0]['id'] ?>">
				<!-- =========================== -->
				<div class="form-group row d-flex align-items-center mb-5">
					<!-- =========================== -->
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Mô tả</label>
					<div class="col-md-10">
						<textarea type="text" class="form-control orm-control news_category_name" name="caption" autocomplete="off"><?= $security[0]['caption'] ?></textarea>
						<small>
							<code>Nên có</code>
						</small>
					</div>
				</div>
				<!-- =========================== -->
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-lg-2 form-control-label d-flex justify-content-md-end">Hình đại diện</label>
					<div class="col-lg-10">
						<div class="form-group">
							<div>
								<img class="securityimage" src="<?= base_url($security[0]['thumbnail']) ?>" alt="" style="display: block; max-width: 100%">
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-btn">
									<a href="/filemanager/dialog.php?type=1&field_id=securityimage&relative_url=1" class="btn btn-primary ripple upload-security-image-btn stand-alone-filemanager">
										<i class="la la-image"></i>
									</a>
								</span>
								<input type="text" class="form-control" name="thumbnail" id="securityimage" value="<?= $security[0]['thumbnail'] ?>" required>
							</div>
						</div>
					</div>
				</div>
				<!-- =========================== -->
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Nội dung</label>
					<div class="col-md-10">
						<textarea type="text" class="form-control tinymce_content" name="content" autocomplete="off"><?= $security[0]['content'] ?></textarea>
						<small>
							<code>Bắt buộc</code>
						</small>
					</div>
				</div>

				<!-- =========================== -->
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Trạng thái</label>
					<div class="col-md-10">
						<div class="custom-control custom-radio styled-radio d-inline-block">
							<input class="custom-control-input" type="radio" name="status" id="opt-01" <?= !$security[0]['status'] ? "checked" : "" ?> value="0">
							<label class="custom-control-descfeedback" for="opt-01">Ẩn</label>
						</div>
						&nbsp;
						&nbsp;
						<div class="custom-control custom-radio styled-radio d-inline-block">
							<input class="custom-control-input" type="radio" name="status" id="opt-02" <?= $security[0]['status'] ? 'checked' : '' ?> value="1">
							<label class="custom-control-descfeedback" for="opt-02">Hiện</label>
						</div>
					</div>
				</div>

				<!-- =========================== -->
				<div class="em-separator separator-dashed"></div>
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Tiêu đề</label>
					<div class="col-md-10">
						<input type="text" class="form-control" name="title" value="<?= $security[0]['title'] ?>">
						<small>
							<code></code>
						</small>
					</div>
				</div>
				<!-- =========================== -->
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Từ khóa</label>
					<div class="col-md-10">
						<input type="text" class="form-control" name="keyword" value="<?= $security[0]['keyword'] ?>">
						<small>
							<!-- <code>Bắt buộc.</code> -->
						</small>
					</div>
				</div>
				<!-- =========================== -->
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Mô tả</label>
					<div class="col-md-10">
						<input type="text" class="form-control" name="description" value="<?= $security[0]['description'] ?>">
						<small>
							<!-- <code>Bắt buộc.</code> -->
						</small>
					</div>
				</div>
				<!-- =========================== -->

				<div class="em-separator separator-dashed"></div>
				<div class="col-md-10 offset-md-2 text-right">
					<button class="btn btn-gradient-02" type="submit">Cập nhật</button>
				</div>
				<!-- =========================== -->
				<?php echo form_close(); ?>
			</div>
		</div>
		<!-- End Form -->
	</div>
</div>
<!-- End Row -->