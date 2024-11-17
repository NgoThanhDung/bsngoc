<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Lấy lại mật khẩu</title>
  <style>
  * {
    margin: 0; padding :0; box-sizing: border-box;
  }
  a {
    color: #252a2b; text-decoration: none;
  }
  .container {
    max-width: 900px; margin: 50px auto; overflow: auto;
  }
  .header {
    padding: 50px; color: #fff; text-align: center;
  }
  img {
    max-width: 200px;
  }
  .body {
    padding: 50px 0;
  }
  .footer {
    background-color: #252a2b; color: #fff; padding: 50px; text-align: center;
  }
  .footer a {
    color: #ebebee;
  }
  table {
    width: 100%; padding: 10px;
  }
  </style>
</head>
<body>
  <?php
    $end_at = strtotime($user['password_forgot_at']) + 1*60*60;
    $end_at = date('d-m-Y H:i:s', $end_at);
  ?>
  <div class="container">
    <div class="header">
      <a href="<?= base_url() ?>">
        <img src="<?= $this->website->website[0]['logo'] ?>" alt="<?= $this->website->website[0]['website_name'] ?>">
      </a>
    </div>
    <div class="body">
      <p>Xin chào <?= $user['firstname'] ?>,</p>
      <p>Chúng tôi gửi email này để giúp bạn khôi phục lại mật khẩu. Hãy truy cập vào liên kết phía dưới để đặt lại mật khẩu của bạn:</p>
      <p>Lưu ý: Liên kết chỉ có hiệu lực cho tới <?= $end_at ?></p>
      <p><a href="<?= base_url('mat-khau/khoi-phuc/'.$user['password_reset_code']) ?>">Đặt lại mật khẩu</a></p>
      <br>
      <p><i>Hãy bỏ qua tin nhắn này nếu đây không phải là yêu cầu của bạn</i></p>
    </div>
    <div class="footer">
      <p>
        <a href="<?= base_url() ?>" target="_blank">
          <i><?= $this->website->website[0]['website_name'] ?></i>
        </a>
      </p>
    </div>
  </div>

</body>
</html>
