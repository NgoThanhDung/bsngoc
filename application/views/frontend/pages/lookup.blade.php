@extends('frontend.master')

@section('main_views')
<section id="sliderSection">
    <div class="row" style="margin-top: 40px;">
        <div class="col-lg-8 col-md-8 col-sm-8" style="margin-top: 15px;">
            <div class="panel-blog">
                <h2><span>Tra cứu</span></h2>
            </div>
            <div class="container my-5">
                <h1 class="mb-4">Tìm kiếm</h1>
                <!-- Search Form -->
                <div class="card p-4 shadow-sm">
                    <form>
                        <div class="row mb-3">
                            <!-- Từ khóa -->
                            <div class="col-md-6">
                                <label for="keyword" class="form-label">Từ khóa</label>
                                <input type="text" class="form-control" id="keyword" placeholder="Nhập từ khóa..." required>
                            </div>
                            <!-- Tìm kiếm nâng cao -->
                            <div class="col-md-6 d-flex align-items-end">
                                <a href="#" class="text-decoration-none">Tìm kiếm nâng cao</a>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <!-- Lọc theo tạp chí -->
                            <div class="col-md-4">
                                <label for="journal" class="form-label">Tạp chí</label>
                                <select class="form-select" id="journal">
                                    <option value="">Tất cả</option>
                                    <option value="1">Tạp chí A</option>
                                    <option value="2">Tạp chí B</option>
                                </select>
                            </div>
                            <!-- Lọc theo loại bài viết -->
                            <div class="col-md-4">
                                <label for="articleType" class="form-label">Loại bài viết</label>
                                <select class="form-select" id="articleType">
                                    <option value="">Tất cả</option>
                                    <option value="research">Nghiên cứu</option>
                                    <option value="review">Đánh giá</option>
                                </select>
                            </div>
                            <!-- Lọc theo chủ đề -->
                            <div class="col-md-4">
                                <label for="subject" class="form-label">Chủ đề</label>
                                <select class="form-select" id="subject">
                                    <option value="">Tất cả</option>
                                    <option value="science">Khoa học</option>
                                    <option value="technology">Công nghệ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <!-- Lọc theo ngày -->
                            <div class="col-md-4">
                                <label for="date" class="form-label">Ngày</label>
                                <select class="form-select" id="date">
                                    <option value="">Tất cả</option>
                                    <option value="newest">Mới nhất</option>
                                    <option value="oldest">Cũ nhất</option>
                                </select>
                            </div>
                        </div>
                        <!-- Nút hành động -->
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                            <button type="reset" class="btn btn-outline-secondary">Xóa bộ lọc</button>
                        </div>
                    </form>
                </div>
                <!-- Kết quả tìm kiếm -->
                <div class="mt-5">
                    <p>Hiển thị 1–16 trong tổng số 16 kết quả</p>
                    <div class="list-group">
                        <a href="#" class="list-group-item list-group-item-action">
                            <h5 class="mb-1">Tiêu đề bài viết đầu tiên</h5>
                            <p class="mb-1">Mô tả ngắn của bài viết đầu tiên...</p>
                            <small>08/09/2010 - Tạp chí A</small>
                        </a>
                        <a href="#" class="list-group-item list-group-item-action">
                            <h5 class="mb-1">Tiêu đề bài viết thứ hai</h5>
                            <p class="mb-1">Mô tả ngắn của bài viết thứ hai...</p>
                            <small>01/11/2010 - Tạp chí B</small>
                        </a>
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