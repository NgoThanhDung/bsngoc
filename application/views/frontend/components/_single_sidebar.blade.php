@php
$get_blog_lasted = $_CI->website->get_lates_blog();
@endphp
<aside class="right_content">
    <div class="single_sidebar wow fadeInDown">
        <h2><span class="sp">TIN TỨC MỚI</span></h2>
        <?php foreach ($get_blog_lasted as $item) { ?>
            <div class="card mb-3">
                <div class="row g-0">
                    <div class="col-5 col-xl-5 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <a href="<?= base_url() ?><?= $item['alias'] ?>-<?= $item['id'] ?>">
                            <img src="<?= base_url() ?><?= $item['thumbnail'] ?>" class="img-fluid rounded-start">
                        </a>
                    </div>
                    <div class="col-7 col-xl-7 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card-body">
                            <a href="<?= base_url() ?><?= $item['alias'] ?>-<?= $item['id'] ?>" class="a-green"><h7 class="card-title"><?= $item['name'] ?></a></h7>
                            <p class="card-text"><?= mb_substr($item['caption'], 0, 50, 'UTF-8') . '...' ?></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
           </div>
</aside>