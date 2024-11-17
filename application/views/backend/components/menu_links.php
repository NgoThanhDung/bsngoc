<ul>

  <?php

    foreach ($results as $result):

      if ($type == "product") {

        // myhelper_helper.php

        $link = generate_product_link($result['result_alias'], $result['result_id'], 'short');

      } elseif ($type == "product_cate") {

        $link = generate_product_category_link($result['result_alias'], 'short');

      }

  ?>

    <li data-short-link="<?= $link ?>">

      <?= $result['result_name'] ?>

    </li>

  <?php endforeach; ?>

</ul>

