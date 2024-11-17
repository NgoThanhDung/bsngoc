@extends('frontend.master')

@section('main_views')
<!-- Page Title-->

<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <?php foreach ($Slideshow as $index => $v) { ?>
      <?php if ($index == 0) { ?>
        <div class="carousel-item active">
          <img src="<?= $v['url'] ?>" class="d-block w-100" alt="...">
        </div>
      <?php } else { ?>
        <div class="carousel-item">
          <img src="<?= $v['url'] ?>" class="d-block w-100" alt="...">
        </div>
      <?php } ?>
    <?php } ?>
  </div>
</div>
<div class="row align-items-md-stretch p-2" style="justify-content: center; margin-top: 40px; margin-left: 0; margin-right: 0;">
  <div class="col-md-9 bg-text">
    <div class="text-black rounded-3 text-justify mt-30 animation-div">
      <div class="col-md-12">
        <div class="header-container">
          <h2 class="title">chuyên điều trị</h2>
          <div class="underline"></div>
        </div>
        <div class="treament-list">
          <div style="text-align: justify;">
            <?= $treatment[0]['content'] ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-8">
    <div class="col-md-12" style="margin-top: 30px;">
      <div class="header-container">
        <h2 class="title">ĐỘI NGŨ BÁC SĨ</h2>
        <div class="underline"></div>
      </div>
      <div id="carouselExampleIndicators" class="carousel slide animation-div" data-bs-ride="carousel">
        <div class="carousel-inner">
          <?php foreach ($doctor as $index => $v) { ?>
            <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">
              <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                  <img src="<?= $v['image'] ?>" class="d-block img-w" alt="Slide 1">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 text-justify p-l-r mr-top">
                  <h4><?= $v['title'] ?></h4>
                  <h2 class="text-green"><?= $v['name'] ?></h2>
                  <h5><b><?= $v['role'] ?></b></h5>
                  <div><?= $v['description'] ?></div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
  </div>
  <div class="col-md-12" style="margin-top: 30px;">
    <div class="header-container">
      <h2 class="title">các chuyên mục liên quan</h2>
      <div class="underline"></div>
    </div>
    <div class="slider-container">
      <div class="slider" id="slider">
        <div class="slide">
          <a class="link-cate" href="">
            <div class="card">
              <img src="<?= base_url() ?>/source/icon/bones.png" alt="Image 1">
              <p><b>Loãng xương</b></p>
            </div>
          </a>
        </div>
        <div class="slide">
          <a class="link-cate" href="">
            <div class="card">
              <img src="<?= base_url() ?>/source/icon/gout.png" alt="Image 2">
              <p><b>Gút</b></p>
            </div>
          </a>
        </div>
        <div class="slide">
          <a class="link-cate" href="">
            <div class="card">
              <img src="<?= base_url() ?>/source/icon/pain-in-joints.png" alt="Image 2">
              <p><b>Thoái hóa khớp</b> </p>
            </div>
          </a>
        </div>
        <div class="slide">
          <a class="link-cate" href="">
            <div class="card">
              <img src="<?= base_url() ?>/source/icon/arthritis.png" alt="Image 2">
              <p><b>Viêm khớp dạng thấp</b></p>
            </div>
          </a>
        </div>
        <div class="slide">
          <a class="link-cate" href="">
            <div class="card">
              <img src="<?= base_url() ?>/source/icon/injury.png" alt="Image 2">
              <p><b>Viêm cột sống dính khớp</b></p>
            </div>
          </a>
        </div>
        <div class="slide">
          <a class="link-cate" href="">
            <div class="card">
              <img src="<?= base_url() ?>/source/icon/face-mask.png" alt="Image 6">
              <p><b>Bệnh lý tự miễn</b></p>
            </div>
          </a>
        </div>
        <div class="slide">
          <a class="link-cate" href="">
            <div class="card">
              <img src="<?= base_url() ?>/source/icon/prescription.png" alt="Image 2">
              <p><b>Bệnh lý thường gặp</b></p>
            </div>
          </a>
        </div>
        <div class="slide">
          <a class="link-cate" href="">
            <div class="card">
              <img src="<?= base_url() ?>/source/icon/water-bottle.png" alt="Image 8">
              <p><b>Chế độ ăn uống, vận động</b>
              </p>
            </div>
          </a>
        </div>
      </div>
      <div class="nav-buttons">
        <button id="prevBtn">❮</button>
        <button id="nextBtn">❯</button>
      </div>
    </div>
  </div>

</div>
<!-- ===================================== -->
<style>
  .link-cate{
    text-decoration: none;
  }
  * {
    box-sizing: border-box;
  }

  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
  }

  .slider-container {
    width: 80%;
    margin: 50px auto;
    position: relative;
    overflow: hidden;
    border-radius: 10px;
  }

  .slider {
    display: flex;
    transition: transform 0.5s ease-in-out;
  }

  .slide {
    padding: 10px;
  }

  .card {
    background-color: #fff;
    border-radius: 10px;
    /* Bo góc card */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    /* Tạo bóng cho card */
    padding: 15px;
    text-align: center;
    transition: transform 0.3s ease;
  }

  .card:hover {
    transform: translateY(-10px);
    /* Hiệu ứng nổi khi hover */
  }

  .card img {
    max-width: 80%;
    border-radius: 10px;
    height: auto;
    margin: auto;
  }

  .card p {
    font-size: 16px;
    margin-top: 10px;
    color: #333;
  }

  .nav-buttons {
    position: absolute;
    top: 50%;
    width: 100%;
    display: flex;
    justify-content: space-between;
    transform: translateY(-50%);
    padding: 0 20px;
    /* Điều chỉnh padding cho nút */
    z-index: 1;
    /* Đảm bảo nút nằm trên cùng */
  }

  .nav-buttons button {
    background-color: rgba(0, 0, 0, 0.5);
    border: none;
    color: white;
    padding: 10px 15px;
    /* Thêm padding để tạo khoảng cách cho nút */
    cursor: pointer;
    border-radius: 5px;
    /* Bo góc cho nút */
  }

  .nav-buttons button:hover {
    background-color: rgba(0, 0, 0, 0.8);
  }

  /* Responsive Layouts */
  @media (min-width: 1200px) {
    .slide {
      flex: 0 0 calc(100% / 6);
      /* Hiển thị 6 ảnh trên màn hình lớn */
    }
  }

  @media (max-width: 1199px) and (min-width: 768px) {
    .slide {
      flex: 0 0 calc(100% / 4);
      /* Hiển thị 4 ảnh trên màn hình tablet */
    }
  }

  @media (max-width: 767px) {
    .slide {
      flex: 0 0 calc(100% / 2);
      /* Hiển thị 2 ảnh trên màn hình mobile lớn */
    }
  }

  @media (max-width: 480px) {
    .slide {
      flex: 0 0 100%;
      /* Hiển thị 1 ảnh trên màn hình rất nhỏ */
    }
    .card img {
    max-width: 70%;
  }
  }
</style>
<script>
  const slider = document.getElementById('slider');
  const slides = document.querySelectorAll('.slide');
  const prevBtn = document.getElementById('prevBtn');
  const nextBtn = document.getElementById('nextBtn');

  let currentIndex = 0;
  let slidesToShow = getSlidesToShow();
  const totalSlides = slides.length;

  // Hàm tính số lượng ảnh hiển thị dựa trên kích thước màn hình
  function getSlidesToShow() {
    const screenWidth = window.innerWidth;
    if (screenWidth >= 1200) return 7.5; // Desktop lớn
    if (screenWidth >= 768) return 5; // Tablet
    if (screenWidth >= 481) return 2; // Mobile lớn
    return 1; // Mobile nhỏ
  }

  // Cập nhật số lượng ảnh hiển thị khi thay đổi kích thước màn hình
  window.addEventListener('resize', () => {
    slidesToShow = getSlidesToShow();
    updateSliderPosition();
  });

  // Chuyển đến slide tiếp theo
  function showNextSlide() {
    if (currentIndex + slidesToShow < totalSlides) {
      currentIndex++;
    } else {
      currentIndex = 0; // Quay lại slide đầu tiên
    }
    updateSliderPosition();
  }

  // Chuyển đến slide trước đó
  function showPrevSlide() {
    if (currentIndex > 0) {
      currentIndex--;
    } else {
      currentIndex = totalSlides - slidesToShow; // Quay lại slide cuối cùng
    }
    updateSliderPosition();
  }

  // Cập nhật vị trí slider
  function updateSliderPosition() {
    const newTranslateX = -(currentIndex * 100) / slidesToShow;
    slider.style.transform = `translateX(${newTranslateX}%)`;
  }

  // Gắn sự kiện cho nút lướt qua và lướt về
  nextBtn.addEventListener('click', showNextSlide);
  prevBtn.addEventListener('click', showPrevSlide);
</script>
<!-- ===================================== -->

<style>
  .animation-div {
    transform: translateY(100%);
    animation: riseUp 1s ease-out forwards;
  }

  .animation-div {
    max-width: fit-content !important;
  }

  .header-container {
    text-align: center;
    padding: 20px;
    opacity: 0;
    transform: translateY(100%);
    animation: riseUp 1s ease-out forwards;
  }

  .title {
    color: #004489;
    text-transform: uppercase;
    letter-spacing: 5px;
    margin: 0;
    position: relative;
    display: inline-block;
    font-weight: bold;
  }

  .underline {
    width: 200px;
    height: 4px;
    background: linear-gradient(to right, #72edf2, #5151e5);
    margin: 10px auto 0;
    position: relative;
    overflow: hidden;
  }

  .underline::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(to right, rgba(255, 255, 255, 0), rgba(255, 255, 255, 0.5), rgba(255, 255, 255, 0));
    animation: move 2s linear infinite;
  }

  @keyframes move {
    0% {
      left: -100%;
    }

    50% {
      left: 100%;
    }

    100% {
      left: -100%;
    }
  }

  @keyframes riseUp {
    0% {
      opacity: 0;
      transform: translateY(100%);
    }

    100% {
      opacity: 1;
      transform: translateY(0);
    }
  }

  .p-l-r {
    padding-left: 30px;
    padding-right: 20px;

  }

  #carouselExampleIndicators {
    order: 1px solid #004489;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 1px 1px 8px 1px;
  }

  .img-w {
    width: -webkit-fill-available;
    height: -webkit-fill-available;
    object-fit: cover;
    border-radius: 5px;
  }

  .text-green {
    color: #004489;
    font-weight: bold;
  }

  .text-justify {
    text-align: justify;
  }

  .img-category {
    margin-top: 20px;
  }

  .card {
    height: 14rem;
    justify-content: center;
    text-align: center;
    border-radius: 15px;
    box-shadow: 6px 9px 13px rgba(0, 0, 0, 0.1);
  }

  .treament-list {
    font-weight: 500;
    background-color: #e2fcfd;
    height: auto;
    padding: 10px;
    box-shadow: 6px 9px 13px rgba(0, 0, 0, 0.1);
    border-radius: 5px;
  }

  .tag_nav {
    margin-left: 0px;
    padding-left: 0px;
  }
</style>
@endsection