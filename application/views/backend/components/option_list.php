<?php foreach ($list as $item): ?>
  <li class="option js-option">
    <input type="checkbox" name="<?= $name."[]" ?>" value="<?= $item['id'] ?>">
    <span class="text"><?= $item['name'] ?></span>
    <?php if ($name == "colors"): ?>
      <span class="color_review" style="background-color: <?= $item['hex'] ?>;"></span>
    <?php endif; ?>
    <span class="tick"></span>
  </li>
<?php endforeach; ?>
