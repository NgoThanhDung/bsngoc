<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= !empty($title) ? $title : 'Preview Your Selected Slideshow' ?></title>
  <link rel="stylesheet" type="text/css" href="<?= plugin_css('owl.carousel.min.css') ?>"/>
</head>
<body>
  <div class="owl-carousel preview-carousel">
    <?php foreach ($slideshow as $slide): ?>
      <div><a href="<?= base_url($slide['link']) ?>"><img src="<?= base_url($slide['url']) ?>" alt=""></a></div>
    <?php endforeach ?>
    <!-- <div><a href="#/"><img src="https://chipmall.vn/source/x1.jpg" alt=""></a></div>
    <div><a href="#/"><img src="https://chipmall.vn/source/x2_1.jpg" alt=""></a></div> -->
  </div>
  <script src="<?= plugin_js('jquery3.3.1.min.js') ?>"></script>
  <script type="text/javascript" src="<?= plugin_js('owl.carousel.min.js') ?>"></script>
  <script>
    // Preview slideshow - owl carousel
    $(".preview-carousel").owlCarousel({
      items: 1,
      loop: true,
      autoplay: true,
      autoplaySpeed: 1000,
      dots: false
    });
  </script>
</body>
</html>
