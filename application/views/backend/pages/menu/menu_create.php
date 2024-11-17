<?php echo form_open(base_url('admin/menu/create'), ['class'=>'form-horizontal create-menu-form']); ?>
<div class="row flex-row">
	<div class="col-12 col-lg-9">
		<div class="widget has-shadow">
			<div class="widget-header bordered no-actions d-flex align-items-center">
				<h4><?= $title ?></h4>
			</div>
			<div class="widget-body">
				<input type="hidden" name="menu_type" value="<?= $type ?>">
				<!-- ===================== -->
				<div class="form-group row d-flex align-items-center mb-5">
					<div class="col-12">
						<label class="form-control-label">Menu cha</label>
						<select required class="custom-select form-control select-menu-parent" name="select_menu_parent">
							<option value="0">Gốc</option>
							<!-- myhelper_helper.php  -->
							<?php
							$recursive_menu = get_recursive_menu($menu_list);
							render_selection_menu($recursive_menu);
							?>
						</select>
					</div>
				</div>

				<!-- ===================== -->
				<div class="form-group row d-flex align-items-center mb-5">
					<div class="col-12">
						<label class="form-control-label">
							Tên Menu
							<code>*</code>
						</label>
						<input type="text" class="form-control" name="name" value="<?= set_value('menu_name') ?>" autocomplete="off" required>
					</div>
				</div>

				<!-- ===================== -->
				<div class="form-group row d-flex align-items-center mb-5">
					<div class="col-12">
						<label class="form-control-label">
							Đường dẫn
							<code>*</code>
						</label>
						<div class="form-group">
							<div class="input-group">
								<span class="input-group-btn">
									<a href="#/" class="btn btn-primary ripple menu-link-selection js-menu-link-selection">
										<i class="la la-link"></i>
									</a>
								</span>
								<input type="text" class="form-control" autocomplete="off" name="link" value="" placeholder="Click vào nút bên trái để thêm nhanh đường dẫn">
							</div>
						</div>
					</div>
				</div>
				<!-- ===================== -->
				<div class="form-group row d-flex align-items-center mb-5">
					<div class="col-12">
						<label class="form-control-label">Vị trí</label>
						<select required class="custom-select form-control" name="select_orders">
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
							<input type="submit" class="btn btn-primary" value="Thêm mới" name="create">
							<input type="submit" class="btn btn-secondary" value="Thêm và sửa" name="create_and_edit">
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
						<img class="productimage img-thumbnail" src="<?= set_value('menu_thumbnail') ?>" alt=""
						style="display: block; max-width: 100%">
						<p>
							<a href="/filemanager/dialog.php?type=1&field_id=productimage&relative_url=1"
							class="upload-product-image-btn stand-alone-filemanager"> Chọn hình ảnh </a>
						</p>
						<input type="hidden" class="form-control" name="thumbnail" id="productimage"
						value="<?= set_value('menu_thumbnail') ?>" required>
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
							<input class="input-swtich js-input-swtich" type="checkbox" data-disabled-text="Ẩn" data-enabled-text="Hiện" checked name="status">
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
							<input class="input-swtich js-input-swtich" type="checkbox" data-disabled-text="Tab hiện tại" data-enabled-text="Tab mới" name="target">
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
