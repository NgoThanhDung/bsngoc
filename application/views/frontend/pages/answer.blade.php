@extends('frontend.master')

@section('main_views')
<section id="sliderSection">
    <div class="row" style="margin-top: 40px;">
        <div class="col-lg-8 col-md-8 col-sm-8" style="margin-top: 15px;">
            <div class="panel-blog">
                <h2><span>Giải đáp thắc mắc</span></h2>
            </div>
            <div class="container contact-container">
                <div class="row w-100">
                    <!-- Left Content -->
                    <div class="col-12 col-md-6 contact-content text-center text-md-start">
                        <h1>Contact us</h1>
                        <p>
                            Need to get in touch with us? Either fill out the form with your inquiry or find the
                            <a href="#" class="text-decoration-none">department email</a> you'd like to contact below.
                        </p>
                    </div>

                    <!-- Contact Form -->
                    <div class="col-12 col-md-6">
                        <div class="contact-form">
                            <form>
                                <div class="row">
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="firstName" class="form-label">First name*</label>
                                        <input type="text" id="firstName" class="form-control" placeholder="First name" required>
                                    </div>
                                    <div class="col-12 col-md-6 mb-3">
                                        <label for="lastName" class="form-label">Last name*</label>
                                        <input type="text" id="lastName" class="form-control" placeholder="Last name" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email*</label>
                                    <input type="email" id="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="message" class="form-label">What can we help you with?</label>
                                    <textarea id="message" rows="4" class="form-control" placeholder="Your message"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="fileUpload" class="form-label">Upload a file (optional)</label>
                                    <input type="file" id="fileUpload" class="form-control">
                                </div>
                                <button type="submit" class="w-100">Submit</button>
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

    .contact-container {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 50px 20px;
        min-height: 30vh;
    }

    .contact-content h1 {
        font-size: 3rem;
        font-weight: bold;
    }

    .contact-content p {
        font-size: 1.1rem;
        margin-top: 1rem;
        color: #666;
    }

    .contact-form {
        background: #fff;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .contact-form input,
    .contact-form textarea {
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        padding: 10px;
        width: 100%;
        margin-bottom: 15px;
    }

    .contact-form button {
        background-color: #004489;
        color: #fff;
        border: none;
        padding: 10px 20px;
        font-size: 1rem;
        border-radius: 5px;
        cursor: pointer;
    }

    .contact-form button:hover {
        background-color: #004489;
    }
</style>
@endsection