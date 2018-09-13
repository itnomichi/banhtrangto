
@extends('layout.main')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="media-container-column col-lg-6" data-form-type="formoid">
                <div class="menu-logo" style="margin: 30px 0">
                    <div class="navbar-brand">
                        <span class="navbar-logo">
                            <a href="/">
                                 <img src="{{ asset('images/logo.png') }}" style="height: 3.8rem;">
                            </a>
                        </span>
                        <span class="navbar-caption-wrap">
                            <a class="navbar-caption text-secondary display-5" href="/">Bánh tráng tô</a>
                        </span>
                    </div>
                </div>
                <form class="mbr-form" action="auth" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="form-control-label mbr-fonts-style display-7">Tên</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label mbr-fonts-style display-7">Mật khẩu</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div align="center">
                        <span class="input-group-btn">
                            <button href="" type="submit" class="btn btn-primary btn-form display-4">Đăng nhập</button>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection