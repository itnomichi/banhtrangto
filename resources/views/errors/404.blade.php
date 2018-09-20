@extends('layout.main')
@section('content')
    @include('layout.head')
    <div style="padding-top: 100px"></div>
    <div class="container">
        <div class="media-container-row">
            <div id="card" class="card p-3 col-12 col-md-6 col-lg-4">
                <img src="{{asset('/images/error.jpg')}}" style="width: 100%">
            </div>
            <div id="card" class="card p-3 col-12 col-md-6 col-lg-4">
                <div class="title">
                    <span style="font-weight: 500">Awww...Đừng khóc.</span><br>
                    <span style="font-weight: 100">Lỗi 404 thôi mà.</span><br>
                    <span style="font-weight: 100">Những gì bạn đang tìm kiếm có thể đã bị thất lạc.</span><br>
                </div>
            </div>
        </div>
    </div>
@endsection