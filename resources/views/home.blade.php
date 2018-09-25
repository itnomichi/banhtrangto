@extends('layout.main')
@section('content')
    @include('layout.head')
    @if(sizeof($gt_images) > 0)
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
    @endif

    @if(sizeof($sp_images) > 0)
        {{ csrf_field() }}
        <section class="header3 cid-r1NUqzA2Cg-cst" id="header3-e">
            <div class="container">
                @foreach($sp_images as $image)
                    <div id="order" class="media-container-row">
                        <input type="hidden" name="img_id" value="{{$image->id}}">
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
                                <a class="btn btn-md btn-primary display-4"id="btn-dathang" href="#" onclick="fn_order(this, event)">Đặt hàng</a>
                                <a class="btn btn-md btn-white-outline display-4" href="#">{{ number_format($image->img_money) }} VNĐ<br></a>
                            </div>
                            <div class="collapse">
                                <div class="row row-sm-offset mbr-white">
                                    <div class="col-md-6 multi-horizontal">
                                        <div class="form-group">
                                            <label class="form-control-label mbr-fonts-style display-7">Số lượng</label>
                                            <input type="text" class="form-control form-control-cst" name="ord_quantity" value="1">
                                        </div>
                                    </div>
                                    <div class="col-md-6 multi-horizontal">
                                        <div class="form-group">
                                            <label class="form-control-label mbr-fonts-style display-7">Số điện thoại</label>
                                            <input type="text" class="form-control form-control-cst" name="ord_phone">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mbr-white">
                                    <label class="form-control-label mbr-fonts-style display-7">Ghi chú</label>
                                    <textarea type="text" class="form-control form-control-cst" name="ord_notes" rows="2"></textarea>
                                </div>
                                <div class="mbr-section-btn">
                                    <a class="btn btn-md btn-primary display-4" href="#" onclick="fn_order_confirm(this, event)">Xác nhận</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

    @if(sizeof($tp_images) > 0)
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
    @endif

    @include('layout.foot')
@endsection