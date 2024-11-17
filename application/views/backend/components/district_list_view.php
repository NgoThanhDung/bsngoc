<option value="0">Chọn Quận / Huyện</option>
<?php foreach ($districts as $district): ?>
  <option value="<?= $district['id'] ?>">
    <?= $district['name'] ?>
  </option>
<?php endforeach; ?>
