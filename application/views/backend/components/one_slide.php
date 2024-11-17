<div class="col-md-6 slide-container">

  <div class="one-slide">

    <span class="la la-close ripple remove-slide-button"></span>

    <div class="image-box">

      <img class="<?= $id ?>" src="<?= !empty($url) ? base_url($url) : base_url('public/backend/assets/img/others/noimage.jpg') ?>" alt="">

    </div>

    <div class="link-box">

      <input type="hidden" id="<?= $id ?>" name="url[]" placeholder="Đường dẫn khi click vào slide (1 bài viết, 1 tin tức,...)" value="<?= !empty($url) ? $url : '' ?>">

    </div>

    <div class="action-buttons">

      <div class="form-group">

        <div class="input-group">

          <span class="input-group-btn">

            <a href="/filemanager/dialog.php?type=1&field_id=<?= $id ?>&relative_url=1" data-fancybox="stand-alone-filemanager" class="btn btn-primary ripple select-slide-image-button stand-alone-filemanager">

              <i class="la la-link"></i>

            </a>

          </span>

          <input type="text" class="form-control slideimage-link" autocomplete="off" name="links[]" value="" placeholder="Đường dẫn khi click vào slide (1 bài viết, 1 tin tức,...)">

        </div>

      </div>

    </div>

  </div>

</div>

