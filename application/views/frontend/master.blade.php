<!DOCTYPE html>

<head>
    <html lang="en">
    {{-- SEO --}}
    <title>
        {{ $_CI->website->website[0]['seo_title'] }}
    </title>
    <meta charset="utf-8">
    <meta name="description" content="{{ $_CI->website->website[0]['seo_description'] }}">
    <meta name="keywords" content="{{ $_CI->website->website[0]['seo_keyword'] }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="{{ $_CI->website->website[0]['seo_title'] }}">
    <meta property="og:description" content="{{ $_CI->website->website[0]['seo_description'] }}">
    <meta property="og:image" content="<?php echo base_url(); ?>{{ $_CI->website->website[0]['logo'] }}">
    <meta property="og:url" content="{{ $_CI->website->website[0]['domain'] }}">
    <meta property="og:type" content="website">

    {{-- SEO --}}

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?><?= $_CI->website->website[0]['favicon'] ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?><?= $_CI->website->website[0]['favicon'] ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?><?= $_CI->website->website[0]['favicon'] ?>">
    <!-- Favicon -->
    <link rel="stylesheet" type="text/css" href="<?= frontend('assets/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= frontend('assets/css/animate.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= frontend('assets/css/font.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= frontend('assets/css/li-scroller.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= frontend('assets/css/slick.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= frontend('assets/css/jquery.fancybox.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= frontend('assets/css/theme.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= frontend('assets/css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= frontend('assets/css/hotline.css') ?>">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Reset CSS */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <div class="container-fluid" style="padding: 0px;">
        @include('frontend.includes._header')
        {{-- MAIN VIEW HERE --}}
        @yield('main_views')
        {{-- END MAIN VIEW HERE --}}
        @include('frontend.includes._footer')
    </div>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0&appId=2882287695195596" nonce="APkRhuLr">
    </script>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v18.0&appId=2882287695195596" nonce="R6T7J5zR">
    </script>
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-5JCT58GR');
    </script>
    <!-- End Google Tag Manager -->
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5JCT58GR" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!-- jquery-->
    <script src="<?= frontend('assets/js/jquery.min.js') ?>"></script>
    <script src="<?= frontend('assets/js/wow.min.js') ?>"></script>
    <script src="<?= frontend('assets/js/slick.min.js') ?>"></script>
    <script src="<?= frontend('assets/js/jquery.li-scroller.1.0.js') ?>"></script>
    <script src="<?= frontend('assets/js/jquery.newsTicker.min.js') ?>"></script>
    <script src="<?= frontend('assets/js/jquery.fancybox.pack.js') ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>