<?php foreach ($checkboxes as $index => $checkbox): ?>

  <?php $num = $index + 1; ?>

  <div class="mb-3 <?= $name.$num ?>">

    <div class="styled-checkbox">

      <input type="checkbox" value="<?= $checkbox['name'] ?>" name="<?= $name ?>[]" id="<?= $name.$num ?>">

      <label for="<?= $name.$num ?>">

        <?= $checkbox['name'] ?>

        <i data-parent="<?= $name.$num ?>" class="la la-times remove-option-item"></i>

      </label>

    </div>

  </div>

<?php endforeach; ?>

