<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <!-- <th>Tên</th> -->
        <th>Thuộc tính</th>
        <!-- <th>Giá</th> -->
        <th></th>
      </tr>
    </thead>
    <tbody>
      <?php $i = 1 ?>
      <?php foreach ($this->cart->contents() as $items): ?>
        <tr>
          <td><?= $i++ ?></td>
          <!-- <td><?= $items['name'] ?></td> -->
          <td>
            <p>
              <?php foreach ($this->cart->product_options($items['rowid']) as $option_name => $option_value): ?>

                <?php if ($option_value != "no"): ?>
                  <strong><?php echo $option_name; ?>:</strong> <?php echo $option_value; ?><br />
                <?php endif; ?>

              <?php endforeach; ?>
            </p>
          </td>
          <!-- <td> Giá: <input type="number" name="" value="0" min="0"> </td> -->
          <td>
            <div class="text-right">
              <button data-rowid="<?= $items['rowid'] ?>" type="button" class="btn btn-dark btn-remove-item"> <i class="la la-trash-o"></i> </button>
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>
