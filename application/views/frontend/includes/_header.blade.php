@php
$desktop_menu = $_CI->website->get_header_menu();
$get_lates_blog = $_CI->website->get_lates_blog();
$recursive_menu = get_recursive_menu($desktop_menu);
@endphp
<style>
    #navbarNavDropdown {
        justify-content: center;
    }

    .bg-green {
        background-color: #004489;
    }

    .alert-dark {
        background-color: #efefef;
        border-color: #efefef;
    }

    marquee {
        padding-top: 10px;
    }

    .alert {
        padding: 0;
        margin-bottom: 0;
    }

    .nav-link {
        color: white !important;
        font-weight: 600;
    }

    .nav-item .nav-link:hover {
        color: yellow !important;
    }

    .dropdown-item:hover {
        color: #004489 !important;
    }

    .nav-item {
        padding-right: 15px;
    }


    .navbar-nav li:hover>ul.dropdown-menu {
        display: block;
    }

    .dropdown-submenu {
        position: relative;
    }

    .dropdown-submenu>.dropdown-menu {
        top: 0;
        left: 100%;
        margin-top: -6px;
    }

    /* rotate caret on hover */
    .dropdown-menu>li>a:hover:after {
        text-decoration: underline;
        transform: rotate(-90deg);
    }

    .ct-header-text H4 {
        animation: blinker .7s infinite;
        font-weight: 600;
    }

    @keyframes blinker {
        50% {
            color: red;
        }
    }

    #btn-search:hover {
        background-color: #2d99cc !important;
        color: #fff;
    }

    .navbar-toggler-icon {
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28255, 255, 255, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e") !important;
    }

    .navbar-toggler {
        color: #fff;
        border: 1px #fff solid !important;
    }

    .inline {
        display: inline-block;

    }

    @media (max-width: 600px) {

        /* Thay đổi kích thước màn hình dưới 600px */
        .inline {
            display: block;

            margin-bottom: 10px;
            /* Khoảng cách giữa các thẻ khi xuống hàng */
        }
    }
</style>
<div class="main-header" style="position: sticky; top: 0; z-index: 1000;">
<div class="navbar-header">
    <div class="alert alert-dark" role="alert">
        <marquee>
            <h4 style="color: red;">Thời gian làm việc từ {{$_CI->website->website[0]['time_work']}}</h4>
        </marquee>
    </div>
</div>

    <nav class="navbar navbar-light" style="padding-top: 0; padding-bottom: 0; background-color: #fff;">
        <div class="container-fluid">
            <div class="row" style="width: 100%; display: contents">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 ct-header-text text-center">
                    <h3 class="text-green inline" style="padding-top: 10px;">{{$_CI->website->website[0]['website_name']}}</h3>
                    <h3 class="text-green inline">{{$_CI->website->website[0]['doctor_name']}}</h3>
                    <h5 class="text-address" style="color: #2d99cc;">{{$_CI->website->website[0]['address']}}</h5>
                </div>
            </div>
        </div>
    </nav>
    <nav class="navbar navbar-expand-md navbar-light bg-green">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav" style="margin-left: 100px;">
                    <?php foreach ($recursive_menu as $item) { ?>
                        <?php if ($item['submenu'] == null) { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= base_url() ?><?= $item['link'] ?>"><?= $item['name'] ?></a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $item['name'] ?> </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <?php foreach ($item['submenu'] as $sub) { ?>
                                        <li><a class="dropdown-item" href="<?= base_url() ?><?= $sub['link'] ?>"><?= $sub['name'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>
                        <?php } ?>
                    <?php } ?>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item"></li>
                    <li class="nav-item">
                        <form class="d-flex" method="get" action="<?= base_url() ?>bai-viet">
                            <table>
                                <td>
                                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm" name="search" aria-label="Search">
                                </td>
                                <td style="padding-left: 10px; padding-top: 5px;">
                                    <button id="btn-search" type="submit" class="btn btn-outline-primary" style="background-color: #fff;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"></path>
                                        </svg>
                                    </button>
                                </td>
                            </table>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>