<div class="row flex-row">
	<div class="col-12">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4><?= $title ?></h4>
			</div>
			<div class="widget-body">
				<?php echo form_open(base_url('admin/treatment/update'), ['class' => 'form-horizontal']); ?>
				<input type="hidden" name="id" value="<?= $data['id'] ?>">
				<!-- =========================== -->
				<div class="form-group row d-flex align-items-center mb-5">
					<div class="col-md-12">
						<textarea type="text" class="form-control tinymce_content" name="content" autocomplete="off"><?= $data['content'] ?></textarea>
						<small>
							<code>Bắt buộc</code>
						</small>
					</div>
				</div>
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