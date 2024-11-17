<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?= !empty($title) ? $title : 'Chưa có tiêu đề' ?></title>
<meta name="description" content="Elisyam is a Web App and Admin Dashboard Template built with Bootstrap 4">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Google Fonts -->
<script src="http://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
<script>
  WebFont.load({
    google: {"families":["Google Sans:400,500,600,700"]},
    active: function() {
        sessionStorage.fonts = true;
    }
});
</script>
<!-- Favicon -->
<link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('public/backend/assets/img/logo-pdh.png') ?>">
<link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('public/backend/assets/img/logo-pdh.png') ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('public/backend/assets/img/logo-pdh.png') ?>">
<!-- Stylesheet -->
<link rel="stylesheet" href="<?= base_url('public/backend/assets/vendors/css/base/bootstrap.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/backend/assets/vendors/css/base/elisyam-1.5.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/backend/assets/css/animate/animate.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('public/backend/assets/css/backend/backend.css') ?>">