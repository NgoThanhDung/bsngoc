@extends('frontend.master')

@section('main_views')
<section id="contentSection">
    <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8">
            <div class="left_content">
                <div class="single_page">
                    <h1><?php echo $get_security[0]['name'] ?></h1>
                    <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i><?php echo $get_security[0]['view'] ?></a> <span><i class="fa fa-calendar"></i><?php echo $get_security[0]['created_at'] ?></span></div>
                    <div class="single_page_content"> <img class="img-center" src="<?php echo base_url() ?><?php echo $get_security[0]['thumbnail']  ?>" alt="">
                        <?php echo $get_security[0]['content'] ?>
                    </div>
                    <div class="social_link">
                        <ul class="sociallink_nav">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                        </ul>
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
    .single_page_content div img {
        width: -webkit-fill-available !important;
        height: fit-content !important;
    }

    .single_page_content img {
        width: -webkit-fill-available !important;
        height: fit-content !important;
    }

    .single_page_content {
        text-align: justify;
    }
</style>
@endsection