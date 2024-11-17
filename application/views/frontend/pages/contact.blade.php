@extends('frontend.master')

@section('main_views')
<section id="sliderSection">
    <div class="row" style="margin-top: 40px;">
        <div class="col-lg-8 col-md-8 col-sm-8" style="margin-top: 15px;">
            <div class="panel-blog">
                <h2><span>Tra cứu</span></h2>
            </div>
            <div class="contact_area">
                <p>{{$_CI->website->website[0]['website_intro']}}</p>
                <p><b>Hotline:</b> {{$_CI->website->website[0]['hotline']}} - {{$_CI->website->website[0]['zalo']}}</p>
                <p><b>Email:</b> {{$_CI->website->website[0]['email']}}</p>
                <p><b>Địa chỉ:</b> {{$_CI->website->website[0]['address']}}</p>
            </div>
            <div class="contact_area" >
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.695750343441!2d106.67978577485664!3d10.757915189389742!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f1b5658ae3f%3A0xe69fd6c4a4b7d626!2zNTEvMjQgxJAuIE5ndXnhu4VuIFRyw6NpLCBQaMaw4budbmcgMiwgUXXhuq1uIDUsIFRow6BuaCBwaOG7kSBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1716560381160!5m2!1svi!2s" height="500" style=" width: -webkit-fill-available;border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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