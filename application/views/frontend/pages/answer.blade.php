@extends('frontend.master')

@section('main_views')
<section id="sliderSection">
    <div class="row" style="margin-top: 40px;">
        <div class="col-lg-8 col-md-8 col-sm-8" style="margin-top: 15px;">
            <div class="panel-blog">
                <h2><span>Giải đáp thắc mắc</span></h2>
            </div>
            <div class="container my-5">
                <div class="row align-items-center">
                    <!-- Bên trái: Tiêu đề và mô tả -->
                    <div class="col-md-6">
                        <h2>Liên hệ với chúng tôi</h2>
                        <p>
                            Bạn cần hỗ trợ? Vui lòng điền vào biểu mẫu bên dưới với câu hỏi của bạn hoặc tìm
                            <a href="#">email bộ phận</a> mà bạn muốn liên hệ.
                        </p>
                    </div>
                    <!-- Bên phải: Form -->
                    <div class="col-md-6">
                        <div class="contact-form">
                            <form>
                                <div class="mb-3">
                                    <!-- full name -->
                                    <label for="fullName" class="form-label">Họ và Tên*</label>
                                    <input type="text" class="form-control" id="fullName" placeholder="Nhập họ tên của bạn" required>
                                </div>
                                <!-- Email -->
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" class="form-control" id="email" placeholder="Nhập email của bạn" required>
                                </div>
                                <!-- Textarea -->
                                <div class="mb-3">
                                    <label for="message" class="form-label">Chúng tôi có thể giúp gì cho bạn?</label>
                                    <textarea class="form-control" id="message" rows="4" placeholder="Nhập nội dung cần hỗ trợ"></textarea>
                                </div>
                                <!-- Submit button -->
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary px-4">Gửi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            @include('frontend.components._single_sidebar')
        </div>
    </div>
</section>
<style>
    .panel-blog {
        background: #004489;
        color: white;
        border-radius: 6px;
        margin-bottom: 10px;
    }

    .panel-blog h2 {
        padding: 10px;
    }
</style>
@endsection