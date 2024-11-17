<div class="row flex-row">
  <div class="col-12">
    <!-- Form -->
    <div class="widget has-shadow">
      <div class="widget-header bordered no-actions d-flex align-items-center">
        <h4><?= $title ?></h4>
      </div>
      <div class="widget-body">
        <?php echo form_open(base_url('admin/slideshow/update'), ['class'=>'form-horizontal create-slideshow-form']); ?>
        <input type="hidden" name="id" value="<?= $slideshow['id'] ?>">
        <!-- ======================= -->
        <div class="form-group row d-flex align-items-center mb-5">
          <label class="col-md-2 form-control-label d-flex justify-content-md-end">Tên slide</label>
          <div class="col-md-10">
            <input type="text" class="form-control name" name="name" value="<?= $slideshow['name'] ?>" autocomplete="off" required >
            <small>
              <code>Bắt buộc. Tối thiểu 5 ký tự</code>
            </small>
          </div>
        </div>

        <!-- ======================= -->

        <div class="row">

          <div class="col-md-10 offset-md-2">

            <div class="row slides-container">



              <?php foreach ($slides as $slide): ?>

                <?php

                  $this->load->view('backend/components/one_slide', [

                    'id' => $slide['id'],

                    'url' => $slide['url'],

                    'link' => $slide['link']

                  ]);

                ?>

              <?php endforeach; ?>

            </div>

          </div>

        </div>

        <!-- ======================= -->

        <div class="em-separator separator-dashed"></div>
        <div class="col-md-10 offset-md-2 text-right">

          <a href="#/" class="btn btn-gradient-03 add-more-slide" data-container=".slides-container">Thêm 1 slide nữa</a>
          <button class="btn btn-gradient-02" type="submit">Cập nhật slideshow</button>
        </div>
        <!-- ======================= -->
        <?php echo form_close(); ?>
      </div>
    </div>
    <!-- End Form -->
  </div>
</div>
<!-- End Row -->
