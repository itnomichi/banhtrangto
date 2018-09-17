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
                <form name="login-frm" class="mbr-form" action="auth" method="post">
                    {{ csrf_field() }}
                    <div id="login-alert" class="alert alert-danger alert-danger-cst" role="alert" style="display: none">
                        Tên hoặc Mật khẩu không đúng.
                    </div>
                    <div class="form-group">
                        <label class="form-control-label mbr-fonts-style display-7">Tên</label>
                        <input type="text" class="form-control" name="username">
                    </div>
                    <div class="form-group">
                        <label class="form-control-label mbr-fonts-style display-7">Mật khẩu</label>
                        <input type="password" autocomplete="off" class="form-control" name="password">
                    </div>
                </form>
                <div align="center">
                    <div class="mbr-section-btn">
                        <a class="btn btn-md btn-primary display-4" onclick="fn_login()" href="#">Đăng nhập</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection