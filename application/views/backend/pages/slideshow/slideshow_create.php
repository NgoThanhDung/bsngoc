<div class="row flex-row">
	<div class="col-12">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4><?= $title ?></h4>
			</div>
			<div class="widget-body">
				<?php echo form_open(base_url('admin/slideshow/create'), ['class'=>'form-horizontal create-slideshow-form']); ?>

					<!-- ======================= -->
					<div class="form-group row d-flex align-items-center mb-5">
						<label class="col-md-2 form-control-label d-flex justify-content-md-end">Tên Slideshow</label>
						<div class="col-md-10">
							<input type="text" class="form-control name" name="name" value="<?= set_value('slideshow_name') ?>" autocomplete="off" required>
							<small>
								<code>Bắt buộc. Tối thiểu 5 ký tự</code>
							</small>
						</div>
					</div>
					<!-- ======================= -->
					<div class="row">
						<div class="col-md-10 offset-md-2">
							<div class="row slides-container">

								<div class="col-md-6 slide-container">
									<div class="one-slide">
										<span class="la la-close ripple remove-slide-button"></span>
										<div class="image-box">
											<img class="slideimage1" src="<?= base_url('public/backend/assets/img/others/noimage.jpg') ?>" alt="">
										</div>
										<div class="link-box">
											<input type="hidden" id="slideimage1" name="url[]" placeholder="Đường dẫn khi click vào slide (1 bài viết, 1 tin tức,...)">
										</div>
										<div class="action-buttons">
											<div class="form-group">
												<div class="input-group">
													<span class="input-group-btn">
														<a href="/filemanager/dialog.php?type=1&field_id=slideimage1&relative_url=1" data-fancybox="stand-alone-filemanager" class="btn btn-primary ripple select-slide-image-button stand-alone-filemanager">
															<i class="la la-link"></i>
														</a>
													</span>
													<input type="text" class="form-control slideimage-link" autocomplete="off" name="links[]" value="" placeholder="Đường dẫn khi click vào slide (1 bài viết, 1 tin tức,...)">
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>



					<!-- ======================= -->
					<div class="em-separator separator-dashed"></div>
					<div class="col-md-10 offset-md-2 text-right">
						<a href="#/" class="btn btn-gradient-03 add-more-slide" data-container=".slides-container">Thêm 1 slide nữa</a>
						<button class="btn btn-gradient-02" type="submit">Lưu slideshow</button>
					</div>
					<!-- ======================= -->
				<?php echo form_close(); ?>
			</div>
		</div>
		<!-- End Form -->
	</div>
</div>
<!-- End Row -->
