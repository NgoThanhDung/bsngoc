@extends('frontend.master')

@section('main_views')
<section id="sliderSection">
    <div class="row" style="margin-top: 40px;">

        <div class="col-lg-8 col-md-8 col-sm-8" style="margin-top: 15px;">
            <div class="container">
                <form class="p-4 border rounded bg-light">
                    <div class="row mb-3">
                        <!-- Cột nhập tên bác sĩ -->
                        <div class="col-md-6">
                            <label for="doctorName" class="form-label">Nhập tên bác sĩ:</label>
                            <input type="text" class="form-control" id="doctorName" placeholder="Nhập tên bác sĩ">
                        </div>
                        <!-- Cột chọn chuyên khoa -->
                        <div class="col-md-6">
                            <label for="specialization" class="form-label">Chuyên khoa:</label>
                            <select class="form-select" id="specialization">
                                <option selected>Chọn hết</option>
                                <option value="1">Chuyên khoa 1</option>
                                <option value="2">Chuyên khoa 2</option>
                                <option value="3">Chuyên khoa 3</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-left">
                            <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="container my-4">
                <div class="row">
                    <!-- Danh sách bác sĩ -->
                    <?php foreach ($info as $item) { ?>
                        <div class="col-md-3 col-sm-6 mb-4 text-center">
                            <img src="<?= base_url() ?><?= $item['image_url'] ?>" alt="<?= $item['name'] ?>" class="doctor-image-outside">
                            <div class="doctor-info-outside">
                                <a href="#" class="a-doctor"
                                    data-bs-toggle="modal"
                                    data-bs-target="#doctorInfoModal"
                                    data-name="<?= $item['name'] ?>"
                                    data-degree="<?= $item['degree'] ?>"
                                    data-specialty="<?= $item['specialty'] ?>"
                                    data-image="<?= base_url() ?><?= $item['image_url'] ?>"
                                    data-schedule-link="<?= base_url() ?><?= $item['schedule_link'] ?>"
                                    data-position="<?= $item['position'] ?>"
                                    data-work-experience="<?= $item['work_experience'] ?>"
                                    data-education="<?= $item['education'] ?>"
                                    data-membership="<?= $item['membership'] ?>"
                                    data-research="<?= $item['research'] ?>"
                                    data-publications="<?= $item['publications'] ?>"
                                    data-birth-year="<?= $item['birth_year'] ?>"><?= $item['name'] ?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>

            <!-- Modal dùng chung cho các bác sĩ -->
            <div class="modal fade" id="doctorInfoModal" tabindex="-1" aria-labelledby="doctorInfoModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="margin-top: 50px;">
                    <div class="modal-content">
                        <div class="modal-header modal-header-custom">
                            <h5 class="modal-title" id="doctorInfoModalLabel">Thông tin bác sĩ</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body modal-body-custom">

                            <div class="doctor-info-modal">
                                <div class="row box-info">
                                    <div class="col-3 col-lg-3 col-md-3 col-sm-3">
                                        <img src="https://via.placeholder.com/120" alt="Doctor Image" id="doctorImage" class="doctor-image-modal">
                                    </div>
                                    <div class="col-9 col-lg-9 col-md-9 col-sm-9 text-info">
                                        <h6 id="doctorName">Tên bác sĩ</h6>
                                        <p id="doctorBirthYear">Năm sinh</p>
                                        <p id="doctorSpecialty">Chuyên khoa</p>
                                        <p id="doctorDegree">Học hàm, học vị</p>
                                        <p id="doctorEmail">Email</p>
                                        <p id="doctorSpecialty">Khám chuyên khoa</p>
                                        <a href="#" id="scheduleLink" class="schedule-link" target="_blank">Xem lịch khám</a>
                                    </div>
                                </div>

                                <div class="col-lg-12 col-md-12 col-sm-12 box-content">
                                    <div class="accordion" id="doctorDetailsAccordion">
                                        <!-- Chức vụ -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingPosition">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePosition" aria-expanded="true" aria-controls="collapsePosition">
                                                    Chức vụ
                                                </button>
                                            </h2>
                                            <div id="collapsePosition" class="accordion-collapse collapse show" aria-labelledby="headingPosition">
                                                <div class="accordion-body">
                                                    <p id="doctorPosition" style="color: black;">Bác sĩ hợp đồng khoa khám bệnh</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Quá trình công tác -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingWorkExperience">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWorkExperience" aria-expanded="true" aria-controls="collapseWorkExperience">
                                                    Quá trình công tác
                                                </button>
                                            </h2>
                                            <div id="collapseWorkExperience" class="accordion-collapse collapse show" aria-labelledby="headingWorkExperience">
                                                <div class="accordion-body">
                                                    <p>2008 đến nay: Giảng viên BM Nội TQ - ĐHYD</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Quá trình học tập -->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="headingEducation">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEducation" aria-expanded="true" aria-controls="collapseEducation">
                                                    Quá trình học tập
                                                </button>
                                            </h2>
                                            <div id="collapseEducation" class="accordion-collapse collapse show" aria-labelledby="headingEducation">
                                                <div class="accordion-body">
                                                    <p>1996 - 2002: Bác sĩ đa khoa chính quy - ĐHYD Tp.HCM</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
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
<script>
    // JavaScript để lấy dữ liệu từ các thuộc tính data-* và cập nhật nội dung modal
    const doctorInfoModal = document.getElementById('doctorInfoModal');
    doctorInfoModal.addEventListener('show.bs.modal', function(event) {
        const button = event.relatedTarget;

        // Lấy dữ liệu từ các thuộc tính
        const name = button.getAttribute('data-name') || 'Không có thông tin';
        const birthYear = button.getAttribute('data-birth-year') || 'Không có thông tin';
        const position = button.getAttribute('data-position') || 'Không có thông tin';
        const specialty = button.getAttribute('data-specialty') || 'Không có thông tin';
        const degree = button.getAttribute('data-degree') || 'Không có thông tin';
        const email = button.getAttribute('data-email') || 'Không có thông tin';
        const workExperience = button.getAttribute('data-work-experience') || 'Không có thông tin';
        const education = button.getAttribute('data-education') || 'Không có thông tin';
        const image = button.getAttribute('data-image') || 'https://via.placeholder.com/120';
        const scheduleLink = button.getAttribute('data-schedule-link') || '#';

        // Cập nhật nội dung modal
        document.getElementById('doctorName').textContent = name;
        document.getElementById('doctorBirthYear').textContent = `Năm sinh: ${birthYear}`;
        document.getElementById('doctorPosition').textContent = position;
        document.getElementById('doctorSpecialty').textContent = `Học hàm, học vị: ${specialty}`;
        document.getElementById('doctorDegree').textContent = `Chuyên khoa: ${degree}`;
        document.getElementById('doctorEmail').textContent = `Email: ${email}`;
        document.getElementById('doctorImage').src = image;
        document.getElementById('scheduleLink').href = scheduleLink;
    });
</script>
<style>
     .accordion-body p{
        color: black !important;
     }
    .modal-dialog {
        max-width: 50%;
    }

    .modal-content {
        border-radius: 10px;
        border: none;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        overflow: hidden;
    }

    .modal-header {
        background-color: #007bff;
        color: white;
        font-weight: bold;
        font-size: 18px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
    }

    .modal-footer {
        border-top: none;
        background-color: #f1f1f1;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
    }

    .btn-close {
        color: white !important;
        opacity: 1;
        background-color: #0056b3;
        border: none;
        padding: 5px;
        border-radius: 50%;
        font-size: 12px;
        transition: background-color 0.3s ease;
    }

    .btn-close:hover {
        background-color: #003f8a;
    }

    /* Styling for Doctor List */
    .doctor-image-outside {
        width: 100px;
        /* Kích thước nhỏ gọn */
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
        margin: 10px auto;
        display: block;
        border: 3px solid #007bff;
        /* Đường viền nổi bật */
        transition: transform 0.3s ease;
        /* Hiệu ứng khi hover */
    }

    .doctor-image-outside:hover {
        transform: scale(1.1);
        /* Phóng to nhẹ khi di chuột */
    }

    .doctor-info-outside a {
        color: #007bff;
        font-weight: bold;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .doctor-info-outside a:hover {
        color: #0056b3;
        /* Đổi màu khi hover */
        text-decoration: underline;
    }

    /* Doctor Info Modal Styling */
    .box-info {
        margin-bottom: 15px;
        background-color: #f9f9f9;
        padding: 15px;
        border-radius: 8px;
        border: 1px solid #ddd;
    }

    .box-content {
        max-height: 300px;
        /* Chiều cao tối đa */
        overflow-y: auto;
        /* Bật thanh cuộn dọc */
        background-color: #ffffff;
        padding: 15px;
        border-radius: 8px;
        border: 1px solid #ddd;
        box-shadow: inset 0 1px 5px rgba(0, 0, 0, 0.1);
        /* Hiệu ứng bên trong */
    }

    /* Thanh cuộn tinh tế hơn */
    .box-content::-webkit-scrollbar {
        width: 8px;
    }

    .box-content::-webkit-scrollbar-thumb {
        background-color: #007bff;
        border-radius: 5px;
    }

    .box-content::-webkit-scrollbar-thumb:hover {
        background-color: #0056b3;
    }

    /* Accordion Styling */
    .accordion-button {
        background-color: #f8f9fa;
        font-weight: bold;
        color: #343a40;
        transition: background-color 0.3s ease, color 0.3s ease;
        border-radius: 8px;
        margin-bottom: 5px;
    }

    .accordion-button:not(.collapsed) {
        background-color: #e9ecef;
        color: #006666;
    }

    .accordion-body {
        font-size: 1rem;
        color: #343a40;
    }

    .accordion-body ul {
        padding-left: 0px;
    }

    /* Doctor Image Modal */
    .doctor-image-modal {
        width: 150px;
        height: 150px;
        object-fit: cover;
        margin-right: 15px;
        border: 2px solid #ccc;
    }

    /* Doctor Information */
    .doctor-info-modal h6 {
        color: #910404;
        font-size: 17px;
        font-weight: bold;
        text-shadow: 0 1px 1px #666;
        margin-bottom: 10px;
    }

    .doctor-info-modal p {
        font-size: 1rem;
        margin: 0;
        color: #006666;
        margin-bottom: 4px;
    }

    .schedule-link {
        display: inline-block;
        font-size: 1rem;
        color: #007bff;
        font-weight: bold;
        text-decoration: none;
        float: right;
        transition: background-color 0.3s ease, color 0.3s ease;
        margin-top: 10px;
    }

    .schedule-link:hover {
        color: orange;
    }

    /* Responsive Styling */
    @media (max-width: 576px) {
        .accordion-body p {
            font-size: 10px;
        }

        .modal-dialog {
            max-width: 100%;
        }

        .doctor-image-modal {
            width: 80px;
            height: 100px;
        }

        .doctor-info-modal h5 {
            font-size: 1rem;
        }

        .doctor-info-modal p,
        .schedule-link {
            font-size: 0.7rem;
        }

        .box-content {
            max-height: 200px;
            /* Giảm chiều cao ở màn hình nhỏ */
        }
    }

    @media (min-width: 576px) and (max-width: 768px) {
        .doctor-info-modal h6 {
            font-size: 1.1rem;
        }

        .doctor-image-modal {
            width: 90px;
            height: 110px;
        }


        .accordion-body p {
            font-size: 12px;
        }

        .modal-dialog {
            max-width: 100%;
        }

        .doctor-info-modal p,
        .schedule-link {
            font-size: 0.8rem;
        }
    }

    @media (min-width: 768px) and (max-width: 992px) {
        .modal-dialog {
            max-width: 70%;
        }

        .doctor-image-modal {
            width: 100px;
            height: 120px;
        }


        .accordion-body p {
            font-size: 14px;
        }

        .doctor-info-modal h6 {
            font-size: 1rem;
        }

        .doctor-info-modal p,
        .schedule-link {
            font-size: 0.9rem;
        }
    }

    @media (min-width: 992px) {
        .modal-dialog {
            max-width: 70%;
        }

        .doctor-image-modal {
            width: 150px;
            height: 150px;
        }


        .accordion-body p {
            font-size: 16px;
        }

        .doctor-info-modal h6 {
            font-size: 1.2rem;
        }

        .doctor-info-modal p,
        .schedule-link {
            font-size: 1rem;
        }
    }
    @media (min-width: 1025px) {
        .modal-dialog {
            max-width: 50%;
        }
    }
</style>

@endsection