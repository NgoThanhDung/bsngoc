<!-- Modal dùng để thêm kích thước mà màu sắc khi tạo sản phẩm  -->
<!-- MODAL OPTIONS -->
<div id="options_modal" class="modal fade">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Thuộc tính</h4>
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">đóng</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- <p>Nếu sản phẩm không có màu sắc hoặc không có kích thước bạn cần thêm màu sắc hoặc kích thước "no"</p> -->
        <p><i>Nhấn "Enter" khi đang nhập kích thước / màu sắc để thêm nhanh</i></p>
        <p><i>Để bỏ chọn 1 kích thước / màu sắc, hãy xóa (nhấn chuột vào dấu "X" đỏ) hoặc bỏ chọn (nhấn chuột vào dấu
            tích)</i></p>
				<?php echo form_open('', ['class' => "select-product-options-form"]); ?>
        <!-- =========================== -->
        <div class="form-group row d-flex align-items-center mb-5">
          <label class="col-lg-12 form-control-label">Màu sắc </label>
          <!-- <i data-toggle="modal" data-target="#color_modal" class="la la-plus-circle add-color add-more-option-item"></i> -->
          <div class="col-lg-12">
            <br>
            <div class="input-group">

							<span class="input-group-btn">
                <button type="button" class="btn btn-primary ripple add-more-color add-more-button">
                  Thêm
                </button>
              </span>
              <input type="text" class="form-control add-more-color-value add-more-value">
            </div>
            <br>
          </div>
          <div class="col-lg-12 color-box">
            <!-- <div class="mb-3 color1">

							<div class="styled-checkbox">

								<input type="checkbox" name="color[]" id="color1" disabled>

								<label for="color1">Màu 1 <i data-parent="color1" class="la la-times remove-option-item"></i> </label>

							</div>

						</div> -->
          </div>
        </div>
        <!-- ================================ -->
        <div class="form-group row d-flex align-items-center mb-5">
          <label class="col-lg-12 form-control-label">Kích thước</label>
          <div class="col-lg-12">
            <br>
            <div class="input-group">

							<span class="input-group-btn">

								<button type="button" class="btn btn-primary ripple add-more-size add-more-button">
                  Thêm
								</button>

							</span>
              <input type="text" class="form-control add-more-size-value add-more-value">
            </div>
            <br>
          </div>
          <div class="col-lg-12 size-box">
            <!-- <div class="mb-3 size1">

							<div class="styled-checkbox">

								<input type="checkbox" name="size[]" id="size1" checked disabled>

								<label for="size1">KT1 <i data-parent="size1" class="la la-times remove-option-item"></i> </label>

							</div>

						</div> -->
          </div>
        </div>
        <!-- ================================ -->
				<?php echo form_close(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-shadow" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary save-product-options-button">Lưu</button>
      </div>
    </div>
  </div>
</div>
<!-- End  MODAL OPTIONS -->

