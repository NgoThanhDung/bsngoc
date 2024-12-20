@extends('frontend.master')

@section('main_views')
<section id="sliderSection">
    <div class="row" style="margin-top: 40px;">
        <div class="col-lg-8 col-md-8 col-sm-8" style="margin-top: 15px;">
            <div class="panel-blog">
                <?php if ($data == null || $style ==1) { ?>
                    <h2><span></span></h2>
                <?php } else { ?>
                    <h2><span><?= $data[0]['category_name'] ?></span></h2>
                <?php } ?>
            </div>
            <?php if ($data == null) { ?>
                <h3>Hiện tại không có bài viết nào</h3>
            <?php } else { ?>
                <?php foreach ($data as $v) { ?>
                    <div class="card mb-3">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <a href="<?= base_url() ?><?= $v['alias'] ?>-<?= $v['id'] ?>">
                                    <img src="<?= base_url() ?><?= $v['thumbnail'] ?>" class="img-fluid rounded-start" alt="...">
                                </a>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <a href="<?= base_url() ?><?= $v['alias'] ?>-<?= $v['id'] ?>" class="a-green">
                                        <h5 class="card-title"><b><?= $v['title'] ?></b></h5>
                                    </a>
                                    <p class="card-text"><?= $v['caption'] ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            <?php } ?>

        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
            @include('frontend.components._single_sidebar')
        </div>
    </div>
    <nav aria-label="Page navigation">
        <!-- <ul class="pagination">
            <?php
            if ($stt == 1) {
                echo $pagination;
            }
            ?>
        </ul> -->
    </nav>
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

    .active {
        background-color: #0097d9 !important;
    }

    .text-caption {
        display: block;
        display: -webkit-box;
        line-height: 16px;
        max-height: 74px;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        visibility: visible;
        text-overflow: ellipsis;
        overflow: hidden;
        text-align: justify;
    }
</style>

@endsection