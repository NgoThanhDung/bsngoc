<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Xác thực tài khoản</title>
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

  <div class="container">
    <div class="header">
      <a href="<?= base_url() ?>">
        <img src="<?= $this->website->website[0]['logo'] ?>" alt="<?= $this->website->website[0]['website_name'] ?>">
      </a>
    </div>
    <div class="body">
      <p>Xin chào quý khách <?= $this->session->firstname ?>,</p>
      <p>Chúng tôi gửi email này để giúp bạn cập nhật email liên hệ.</p>
      <p>Nhấn vào liên kết phía dưới để cập nhật email liện hệ hiện tại thành <?= $data['new_email'] ?></p>
      <p><a href="<?= base_url('email/cap-nhat/'.$data['code']) ?>">Cập nhật email</a></p>
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
