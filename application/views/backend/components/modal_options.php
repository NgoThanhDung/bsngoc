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
        <!-- <p><i>Để bỏ chọn 1 kích thước / màu sắc, hãy xóa (nhấn chuột vào dấu "X" đỏ) hoặc bỏ chọn (nhấn chuột vào dấu tích)</i></p> -->
        <!-- =========================== -->
        <div class="form-group row d-flex align-items-center mb-5">
          <div class="col-lg-12">
            <label class="form-control-label">Màu sắc </label>
            <div class="custom-select-container js-custom-select-container">
              <button class="toggle-option-list js-toggle-option-list">Click để chọn màu sắc</button>
              <div class="option-list-container color-list-container">
                <div class="option-search">
                  <input type="text" class="form-control" placeholder="Tìm kiếm">
                </div>
                <ul class="option-list color-list">
                  <!-- <li class="option js-option">
                    <input type="checkbox" name="color[]" value="1">
                    <span class="text">1</span>
                    <span class="tick"></span>
                  </li> -->
                </ul>
              </div>
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
          <div class="col-lg-12">
            <label class="form-control-label">Kích thước</label>
            <div class="custom-select-container js-custom-select-container">
              <button class="toggle-option-list js-toggle-option-list">Click để chọn kích thước</button>
              <div class="option-list-container size-list-container">
                <div class="option-search">
                  <input type="text" class="form-control">
                </div>
                <ul class="option-list size-list">
                </ul>
              </div>
            </div>
            <!-- <div class="input-group">
							<span class="input-group-btn">
								<button type="button" class="btn btn-primary ripple add-more-size add-more-button">
									Thêm
								</button>
							</span>
              <input type="text" class="form-control add-more-size-value add-more-value">
            </div> -->
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
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-shadow" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-primary save-product-options-button">Lưu</button>
      </div>
    </div>
  </div>
</div>
<!-- End  MODAL OPTIONS -->
