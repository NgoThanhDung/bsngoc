<div class="row flex-row">
	<div class="col-12">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4><?= $title ?></h4>
			</div>
			<div class="widget-body">
				<?php echo form_open(base_url('admin/news/create'), ['class'=>'form-horizontal create-news-form']); ?>
				<!-- ======================= -->
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Danh mục</label>
					<div class="col-md-6">
						<select required class="custom-select form-control" name="select_news_category">
							<?php foreach ($categories as $category): ?>
								<option value="<?= $category['id'] ?>" ><?= $category['name'] ?></option>
							<?php endforeach; ?>
						</select>
					</div>
				</div>
				<!-- ======================= -->
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Tiêu đề tin tức</label>
					<div class="col-md-10">
						<input type="text" class="form-control unicode name" name="name" value="<?= set_value('news_name') ?>" autocomplete="off">
						<small>
							<code>Bắt buộc. Tối thiểu 10 ký tự</code>
						</small>
					</div>
				</div>
				<!-- ======================= -->
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Đường dấn</label>
					<div class="col-md-10">
						<input type="text" class="form-control alias news_category_alias" data-alias-prefix="" name="alias" value="<?= set_value('news_alias') ?>">
					</div>
				</div>
				<!-- ======================= -->
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Mô tả</label>
					<div class="col-md-10">
						<textarea type="text" class="form-control news_category_name" name="caption" value="<?= set_value('caption') ?>" autocomplete="off"></textarea>
						<small>
							<code>Nên có</code>
						</small>
					</div>
				</div>
				<!-- ======================= -->
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-lg-2 form-control-label d-flex justify-content-md-end">Hình đại diện</label>
					<div class="col-lg-10">
						<div class="form-group">
							<div>
								<img class="newsimage" src="" alt="" style="display: block; max-width: 100%">
							</div>
							<br>
							<div class="input-group">
								<span class="input-group-btn">
									<a href="/filemanager/dialog.php?type=1&field_id=newsimage&relative_url=1" class="btn btn-primary ripple upload-news-image-btn stand-alone-filemanager">
										<i class="la la-image"></i>
									</a>
								</span>
								<input type="text" class="form-control" name="thumbnail" id="newsimage" value="" required>
							</div>
						</div>
					</div>
				</div>
				<!-- ======================= -->
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Nội dung</label>
					<div class="col-md-10">
						<textarea type="text" class="form-control tinymce_content" name="content" value="<?= set_value('news_content') ?>" autocomplete="off"></textarea>
						<small>
							<code>Bắt buộc</code>
						</small>
					</div>
				</div>

				<!-- ======================= -->
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Trạng thái</label>
					<div class="col-md-10">
						<div class="custom-control custom-radio styled-radio d-inline-block">
							<input class="custom-control-input" type="radio" name="status" id="opt-01" value="0">
							<label class="custom-control-descfeedback" for="opt-01">Ẩn</label>
						</div>
						&nbsp;
						&nbsp;
						<div class="custom-control custom-radio styled-radio d-inline-block">
							<input class="custom-control-input" type="radio" name="status" id="opt-02" checked value="1">
							<label class="custom-control-descfeedback" for="opt-02">Hiện</label>
						</div>
					</div>
					<label class="col-md-2 form-control-label d-flex justify-content-md-end"></label>
					<div class="col-md-10">
						<div class="custom-control custom-radio styled-radio d-inline-block">
							<input class="custom-control-input" type="radio" name="hot" id="opt-03" value="0">
							<label class="custom-control-descfeedback" for="opt-01">Bình thường</label>
						</div>
						&nbsp;
						&nbsp;
						<div class="custom-control custom-radio styled-radio d-inline-block">
							<input class="custom-control-input" type="radio" name="hot" id="opt-04" checked value="1">
							<label class="custom-control-descfeedback" for="opt-02">Hot</label>
						</div>
					</div>
				</div>
			
				<!-- ======================= -->
				<div class="em-separator separator-dashed"></div>
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Tiêu đề</label>
					<div class="col-md-10">
						<input type="text" class="form-control" name="title" value="<?= set_value('title') ?>">
						<small>
							<code></code>
						</small>
					</div>
				</div>
				<!-- ======================= -->
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Từ khóa</label>
					<div class="col-md-10">
						<input type="text" class="form-control" name="keyword" value="<?= set_value('keyword') ?>">
						<small>
							<!-- <code>Bắt buộc.</code> -->
						</small>
					</div>
				</div>
				<!-- ======================= -->
				<div class="form-group row d-flex align-items-center mb-5">
					<label class="col-md-2 form-control-label d-flex justify-content-md-end">Mô tả</label>
					<div class="col-md-10">
						<input type="text" class="form-control" name="description" value="<?= set_value('description') ?>">
						<small>
							<!-- <code>Bắt buộc.</code> -->
						</small>
					</div>
				</div>
				<!-- ======================= -->

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
