<?php echo form_open(base_url('admin/menu/update'), ['class'=>'form-horizontal create-menu-form']); ?>
<div class="row flex-row">
	<div class="col-12 col-lg-9">
		<!-- Form -->
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4><?= $title ?></h4>
			</div>
			<div class="widget-body">
				<input type="hidden" name="id" value="<?= $menu['id'] ?>">
				<input type="hidden" name="menu_type" value="<?= $menu['type'] ?>">

				<!-- ===================== -->
				<div class="form-group row d-flex align-items-center mb-5">
					<div class="col-12">
						<label class="form-control-label">Menu cha</label>
						<select required class="custom-select form-control select-menu-parent" data-exception="<?= $menu['id'] ?>" data-parent="<?= $menu['parent_id'] ?>" name="select_menu_parent">
							<option value="0">Gốc</option>
							<!-- myhelper_helper.php  -->
							<?php
							render_selection_menu($recursive_menu, $menu['parent_id'], $menu['id']);
							?>
						</select>
					</div>
				</div>

				<!-- ===================== -->
				<div class="form-group row d-flex align-items-center mb-5">
					<div class="col-12">
						<label class="form-control-label">Tên Menu</label>
						<input type="text" class="form-control" name="name" value="<?= $menu['name'] ?>" autocomplete="off" required>
						<small>
							<code>Bắt buộc</code>
						</small>
					</div>
				</div>

				<!-- ===================== -->
				<div class="form-group row d-flex align-items-center mb-5">
					<div class="col-12">
						<label class="form-control-label">Đường dẫn</label>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-btn">
									<a href="#/" class="btn btn-primary ripple menu-link-selection js-menu-link-selection">
										<i class="la la-link"></i>
									</a>
								</span>
								<input type="text" class="form-control" autocomplete="off" name="link" value="<?= $menu['link'] ?>">
							</div>
						</div>
					</div>
				</div>
				<!-- ===================== -->
				<div class="form-group row d-flex align-items-center mb-5">
					<div class="col-12">
						<label class="form-control-label">Vị trí</label>
						<select required class="custom-select form-control" data-order="<?= $menu['orders'] ?>" name="select_orders">
							<option value="0">Không</option>
						</select>
					</div>
				</div>
				<!-- ===================== -->
			</div>
		</div>
	</div>

	<!-- SIDEBAR  -->
	<div class="col-12 col-lg-3">
		<div class="sidebar">
			<!-- =================ONE WIDGET==================-->
			<!-- ============================================= -->
			<div class="one-widget action-button">
				<div class="widget">
					<div class="widget-header bordered">
						<h3>Action</h3>
					</div>
					<div class="widget-body">
						<div class="actions">
							<input type="submit" class="btn btn-primary" value="Cập nhật" name="update">
							<input type="submit" class="btn btn-secondary" value="Cập nhật và sửa" name="update_and_edit">
						</div>
					</div>
				</div>
			</div>
			<!-- =================ONE WIDGET==================-->
			<!-- ============================================= -->
			<div class="one-widget">
				<div class="widget">
					<div class="widget-header bordered">
						<h3>Ảnh đại diện</h3>
					</div>
					<div class="widget-body">
						<img class="productimage img-thumbnail" src="<?= $menu['image'] ?>" alt=""
						style="display: block; max-width: 100%">
						<p>
							<a href="/filemanager/dialog.php?type=1&field_id=productimage&relative_url=1"
							class="upload-product-image-btn stand-alone-filemanager"> Chọn hình ảnh </a>
						</p>
						<input type="hidden" class="form-control" name="thumbnail" id="productimage"
						value="<?= $menu['image'] ?>" required>
					</div>
				</div>
			</div>
			<!-- =================ONE WIDGET==================-->
			<!-- ============================================= -->
			<div class="one-widget">
				<div class="widget">
					<div class="widget-header bordered">
						<h3>Trạng thái</h3>
					</div>
					<div class="widget-body">
						<label class="switching-checkbox">
							<input class="input-swtich js-input-swtich" type="checkbox" data-disabled-text="Ẩn" data-enabled-text="Hiện" name="status" <?= $menu['status'] ? 'checked' : NULL ?>>
							<span></span>
						</label>
						<span class="label-bold show-text"></span>
					</div>
				</div>
			</div>
			<!-- =================ONE WIDGET==================-->
			<!-- ============================================= -->
			<div class="one-widget">
				<div class="widget">
					<div class="widget-header bordered">
						<h3>Mở</h3>
					</div>
					<div class="widget-body">
						<label class="switching-checkbox">
							<input class="input-swtich js-input-swtich" type="checkbox" data-disabled-text="Tab hiện tại" data-enabled-text="Tab mới" name="target" <?= $menu['target'] ? 'checked' : NULL ?>>
							<span></span>
						</label>
						<span class="label-bold show-text"></span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php echo form_close(); ?>
<!-- End Row -->



<?php $this->load->view('backend/components/menu_link_modal') ?>
