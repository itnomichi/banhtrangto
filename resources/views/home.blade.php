@extends('layout.main')
@section('content')
    @include('layout.head')
    <section class="menu cid-qTkzRZLJNu" once="menu" id="menu1-0">
        <nav class="navbar navbar-expand beta-menu navbar-dropdown align-items-center navbar-fixed-top collapsed bg-color transparent">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                <div class="hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button>
            <div class="menu-logo">
                <div class="navbar-brand">
                    <span class="navbar-logo">
                        <a href="/">
                             <img src="{{ asset('images/logo.png') }}" style="height: 3.8rem;">
                        </a>
                    </span>
                    <span class="navbar-caption-wrap">
                        <a class="navbar-caption text-secondary display-4" href="/">Bánh tráng tô</a>
                    </span>
                </div>
            </div>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav nav-dropdown nav-right" data-app-modern-menu="true">
                    <li class="nav-item">
                        <a class="nav-link link text-white display-4" href="/">
                            <span class="mbri-home mbr-iconfont mbr-iconfont-btn">&nbsp;Trang chủ</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link text-white display-4" href="/">
                            <span class="mbri-image-gallery mbr-iconfont mbr-iconfont-btn">&nbsp;Đăng nhập</span>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>
    </section>

    <section class="carousel slide cid-r1NPB9uQk4" data-interval="false" id="slider1-8">
        <div class="full-screen">
            <div class="mbr-slider slide carousel" data-pause="true" data-keyboard="false" data-ride="carousel"
                 data-interval="3000">
                <ol class="carousel-indicators">
                    <?php $class = "active"; ?>
                    @foreach($gt_images as $image)
                        <li data-app-prevent-settings="" data-target="#slider1-8" class="{{ $class }}" data-slide-to="0"></li>
                        <?php $class = ""; ?>
                    @endforeach
                </ol>
                <div class="carousel-inner" role="listbox">
                    <?php $class = "active"; ?>
                    @foreach($gt_images as $image)
                        <div class="carousel-item slider-fullscreen-image {{ $class }}" data-bg-video-slide="false"
                             style="background-image: url({{ asset('images/' . $image->id . '.' . $image->img_ext) }});">
                            <div class="container container-slide">
                                <div class="image_wrapper">
                                    <img src="{{ asset('images/' . $image->id . '.' . $image->img_ext) }}">
                                    <div class="carousel-caption justify-content-center">
                                        <div class="col-10 align-left">
                                            <h2 class="mbr-fonts-style display-1">{{ $image->img_title }}</h2>
                                            <p class="lead mbr-text mbr-fonts-style display-5">
                                                {{ $image->img_content }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php $class = ""; ?>
                    @endforeach
                </div>
                <a data-app-prevent-settings="" class="carousel-control carousel-control-prev" role="button"
                   data-slide="prev" href="#slider1-8">
                    <span aria-hidden="true" class="mbri-left mbr-iconfont"></span>
                    <span class="sr-only">Sau</span>
                </a>
                <a data-app-prevent-settings="" class="carousel-control carousel-control-next" role="button"
                   data-slide="next" href="#slider1-8">
                    <span aria-hidden="true" class="mbri-right mbr-iconfont"></span>
                    <span class="sr-only">Trước</span>
                </a>
            </div>
        </div>
    </section>

    <section class="header3 cid-r1NUqzA2Cg" id="header3-e">
        <div class="container">
            @foreach($sp_images as $image)
                <div class="media-container-row">
                    <div class="mbr-figure" style="width: 100%;">
                        <img src="{{ asset('images/' . $image->id . '.' . $image->img_ext) }}" title="">
                    </div>
                    <div class="media-content">
                        <h1 class="mbr-section-title mbr-white pb-3 mbr-fonts-style display-1">
                            {{ $image->img_title }}
                        </h1>

                        <div class="mbr-section-text mbr-white pb-3 ">
                            <p class="mbr-text mbr-fonts-style display-5">
                                {{ $image->img_content }}
                            </p>
                        </div>
                        <div class="mbr-section-btn">
                            <a class="btn btn-md btn-primary display-4" href="#">Đặt hàng</a>
                            <a class="btn btn-md btn-white-outline display-4" href="#">{{ $image->img_money }}<br></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <section class="features13 cid-r1NTDmNjGw mbr-parallax-background" id="features13-c">

        <div class="container">
            <h2 class="mbr-section-title pb-3 mbr-fonts-style display-2">Thành phần</h2>
            @foreach($tp_images as $images)
                <div class="media-container-row container">
                    @foreach($images as $image)
                        <div class="card col-12 col-md-6 p-5 m-3 align-center col-lg-4">
                        <div class="card-img">
                            <img src="{{ asset('images/' . $image->id . '.' . $image->img_ext) }}">
                        </div>
                        <h4 class="card-title py-2 mbr-fonts-style display-5">
                            {{ $image->img_title }}
                        </h4>
                        <p class="mbr-text mbr-fonts-style display-7">
                            {{ $image->img_content }}
                        </p>
                    </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>

    <section class="cid-r1NRRZFRBj" id="footer2-b">
        <div class="container">
            <div class="media-container-row content mbr-white">
                <div class="col-12 col-md-3 mbr-fonts-style display-7">
                    <p class="mbr-text">
                        <strong>Địa chỉ</strong>&nbsp;<br>
                        Chung cư 110 Phan Xích Long, Đường 16, Phường 3,
                        Bình Thạnh, Hồ Chí Minh&nbsp;<br><br><br>
                        <strong>Liên hệ</strong>&nbsp;<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;<br>
                        Phone: 0164.664.8173 (Nhi)<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        0974.517.487 (Min)<br><br>
                        Email:
                        Nhithu.13081996@gmail.com</p>
                </div>
                <div class="col-12 col-md-3 mbr-fonts-style display-7">
                    <p class="mbr-text">
                        <strong>Liên kết</strong>&nbsp;<br>Chưa rõ<br>Chưa rõ&nbsp;<br>Chưa ro&nbsp;<br><br>
                    </p>
                </div>
                <div class="col-12 col-md-6">
                    <div class="google-map">
                        <iframe frameborder="0" style="border:0"
                                src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0Dx_boXQiwvdz8sJHoYeZNVTdoWONYkU&amp;q=place_id:ChIJlXExJs8odTER3gtoK3ZzTac"
                                allowfullscreen="">
                        </iframe>
                    </div>
                </div>
            </div>
            <div class="footer-lower">
                <div class="media-container-row">
                    <div class="col-sm-12">
                        <hr>
                    </div>
                </div>
                <div class="media-container-row mbr-white">
                    <div class="col-sm-6 copyright">
                        <p class="mbr-text mbr-fonts-style display-7">
                            © Copyright 2018 ITNOMICHI - All Rights Reserved
                        </p>
                    </div>
                    <div class="col-md-6">
                        <div class="social-list align-right">
                            <div class="soc-item">
                                <a href="https://twitter.com/mobirise" target="_blank">
                                    <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                            <div class="soc-item">
                                <a href="https://www.facebook.com/thao.phan.5836" target="_blank">
                                    <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                            <div class="soc-item">
                                <a href="https://www.youtube.com/c/mobirise" target="_blank">
                                    <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                            <div class="soc-item">
                                <a href="https://instagram.com/mobirise" target="_blank">
                                    <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                            <div class="soc-item">
                                <a href="https://plus.google.com/u/0/+Mobirise" target="_blank">
                                    <span class="socicon-googleplus socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                            <div class="soc-item">
                                <a href="https://www.behance.net/Mobirise" target="_blank">
                                    <span class="socicon-behance socicon mbr-iconfont mbr-iconfont-social"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection