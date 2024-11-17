<!-- Begin menu link modal -->

<div id="add_menu_link_modal" class="modal fade">

  <div class="modal-dialog modal-dialog-centered">

    <div class="modal-content">

      <div class="modal-header">

        <h4 class="modal-title">Thêm đường dẫn</h4>

        <button type="button" class="close" data-dismiss="modal">

          <span aria-hidden="true">×</span>

          <span class="sr-only">Đóng</span>

        </button>

      </div>

      <div class="modal-body">

        <div>

          <div class="form-group row d-flex align-items-center mb-5">

            <div class="col-md-12">

              <select class="custom-select form-control select-menu-parent" name="select_link_type" autocomplete="off">

                <option value="none" selected>Không</option>

                <option value="product_cate">Danh mục sản phẩm</option>

                <option value="product">Sản phẩm</option>

                <option value="news_cate">Danh mục tin tức</option>

                <option value="news">Tin tức</option>

              </select>

            </div>

          </div>

        </div>

        <div class="result-container hide">

          <div class="js-search-for-link">

            <div class="form-group row d-flex align-items-center mb-5">

              <div class="col-md-12">

                <input type="text" class="form-control" name="search" placeholder="Tìm kiếm...">

              </div>

            </div>

          </div>

          <div>

            <div class="result-list js-result-list">

              <!-- RESULT LIST HERE  -->

              <!-- <ul>

                <li>Lorem ipsum dolor.</li>

                <li>Lorem ipsum dolor.</li>

                <li>Lorem ipsum dolor.</li>

                <li>Lorem ipsum dolor.</li>

              </ul> -->

              <!-- END RESULT LIST HERE  -->

            </div>

            <div class="result-pagination text-right">

              <button>

                <i class="la la-arrow-left"></i>

              </button>

              <button>

                <i class="la la-arrow-right"></i>

              </button>

            </div>

          </div>

        </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-shadow" data-dismiss="modal">Đóng</button>

        <!-- <button type="button" class="btn btn-primary">Save</button> -->

      </div>

    </div>

  </div>

</div>

<!-- End menu link modal -->

