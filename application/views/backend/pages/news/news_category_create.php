<div class="row flex-row">
	<div class="col-12">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4><?= $title ?></h4>
			</div>
			<div class="widget-body">
				<?php echo form_open(base_url('admin/news/category/create'), ['class'=>'form-horizontal create-news-category-form']); ?>

					<!-- =============================== -->
					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-md-3 form-control-label d-flex justify-content-md-end">Tên danh mục</label>
						<div class="col-md-6">
							<input type="text" class="form-control news_category_name" name="name" value="<?= set_value('news_category_name') ?>" autocomplete="off">
							<!-- unicode -->
							<small>
								<code>Bắt buộc</code>
							</small>
						</div>
					</div>
					<!-- =============================== -->
					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-md-3 form-control-label d-flex justify-content-md-end">Danh mục cha</label>
						<div class="col-md-6">
							<select required class="custom-select form-control" name="select_news_category">
								<option value="0">Gốc</option>
								<?php foreach ($categories as $category): ?>
									<option value="<?= $category['id'] ?>" ><?= $category['name'] ?></option>
								<?php endforeach; ?>
							</select>
						</div>
					</div>
					<!-- =============================== -->
					<!-- <div class="form-group row d-flex align-items-center mb-5">
						<label class="col-md-3 form-control-label d-flex justify-content-md-end">Trạng thái</label>
						<div class="col-md-6">
							<div class="custom-control custom-radio styled-radio d-inline-block">
								<input class="custom-control-input" type="radio" name="status" id="opt-01" checked value="1">
								<label class="custom-control-descfeedback" for="opt-01">Hoạt động</label>
							</div>
							&nbsp;
							&nbsp;
							<div class="custom-control custom-radio styled-radio d-inline-block">
								<input class="custom-control-input" type="radio" name="status" id="opt-02" value="0">
								<label class="custom-control-descfeedback" for="opt-02">Khóa</label>
							</div>
						</div>
					</div> -->

					<!-- =============================== -->
					<div class="em-separator separator-dashed"></div>
					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-md-3 form-control-label d-flex justify-content-md-end">Tiêu đề</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="title" value="">
							<small>
								<code></code>
							</small>
						</div>
					</div>
					<!-- =============================== -->
					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-md-3 form-control-label d-flex justify-content-md-end">Từ khóa</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="keyword" value="">
							<small>
								<!-- <code>Bắt buộc.</code> -->
							</small>
						</div>
					</div>
					<!-- =============================== -->
					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-md-3 form-control-label d-flex justify-content-md-end">Mô tả</label>
						<div class="col-md-6">
							<input type="text" class="form-control" name="description" value="">
							<small>
								<!-- <code>Bắt buộc.</code> -->
							</small>
						</div>
					</div>
					<!-- =============================== -->

					<div class="em-separator separator-dashed"></div>
					<div class="col-md-6 offset-md-3 text-right">
						<button class="btn btn-gradient-02" type="submit">Thêm mới</button>
					</div>
					<!-- =============================== -->
				<?php echo form_close(); ?>
			</div>
		</div>
		<!-- End Form -->
	</div>
</div>
<!-- End Row -->
