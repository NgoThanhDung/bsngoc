<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ORDER</title>
  <style>
  * {
    margin: 0; padding :0; box-sizing: border-box;
  }
  a {
    color: red; text-decoration: none;
  }
  img {
    max-width: 100px; vertical-align: middle;
  }
  .container {
    max-width: 900px; margin: 50px auto; overflow: auto;
  }
  .header {
    padding: 50px; background-color: #252a2b; color: #fff; text-align: center;
  }
  .body {
    border-left: 1px solid #252a2b;border-right: 1px solid #252a2b;
  }
  .footer {
    background-color: #252a2b; color: #fff; padding: 50px; text-align: center;
  }
  table {
    width: 100%; padding: 10px;
  }
  </style>
</head>
<body>
  <div class="container">
    <div class="header">
      <a style="color: #fff" href="<?= base_url() ?>"><?= $this->website->website[0]['website_name'] ?></a>
    </div>
    <div class="body">
      <table>
        <thead>
          <th style="text-align:left">Hình ảnh</th>
          <th style="text-align:left">Thông tin sản phẩm</th>
          <th style="text-align:right">Tổng</th>
        </thead>
        <tbody>
          <?php
          $total = 0;
          foreach ($details as $detail):
            $options  = $detail['options'];
            $subtotal = $detail['price']*$detail['qty'];
            $total += $subtotal;
          ?>
            <tr>
              <td>
                <img src="<?= base_url($options['img']) ?>" alt="sản phẩm">
              </td>
              <td>
                <p><?= $detail['name'] ?></p>
                <?php if ($options['has_detail']): ?>
                  <p>
                    KT: <?= $options['size'] ?>
                  </p>
                  <p>
                    Màu: <?= $options['color'] ?>
                  </p>
                <?php endif; ?>
                <!-- myhelper_helper.php -->
                <p>Đơn giá: <?= format_money($detail['price']) ?></p>
                <p>Số lượng: <?= $detail['qty'] ?></p>
              </td>
              <td style="text-align: right;"><?= format_money($subtotal) ?></td>
            </tr>
          <?php endforeach; ?>
          <tr>
            <td></td>
            <td></td>
            <td style="text-align: right;">Ship: <?= format_money($info['shipping_fee']) ?></td>
          </tr>
          <tr>
            <td> </td>
            <td> </td>
            <td style="text-align: right;"><?= format_money($total+$info['shipping_fee']) ?></td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="footer" style="">
      <p>Đơn hàng từ khách: <?= $info['name'] ?> - <?= $info['email'] ?></p>
      <p>SĐT: <?= $info['phone'] ?></p>
      <p>Địa chỉ: <?= $info['address'] ?></p>
      <p>Thời gian: <?= date('d/m/Y H:i:s', strtotime($info['created_at'])) ?></p>
    </div>
  </div>
</body>
</html>
