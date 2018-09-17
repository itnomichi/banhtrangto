@extends('layout.main')
@section('content')
    @include('layout.head')
    <div style="padding-top: 100px"></div>
	<div class="container">
	    <div class="media-container-row">
	        <div id="card" class="card p-3 col-12 col-md-6 col-lg-4">
				<form enctype='multipart/form-data' method="post" action="/save">
	            	<div class="card-wrapper">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="0">
                        <input type="file" name="img_file" onchange="fn_img_file_change(this)" accept="image/*" style="display: none">
                        <div class="card-img card-img-clear" onclick="fn_attach_image(this)">
                            <img src="">
                        </div>
                        <div class="collapse" id="collapse-0">
                            <div class="mbr-section-btn text-center">
                                <a href="#" onclick="fn_img_type_toggle('1', this)" class="btn img-type btn-warning btn-sm display-3">SP</a>
                                <a href="#" onclick="fn_img_type_toggle('2', this)" class="btn img-type btn-success-cst btn-sm display-3">TP</a>
                                <a href="#" onclick="fn_img_type_toggle('3', this)" class="btn img-type btn-warning btn-sm display-3">GT</a>
                                <input type="hidden" name="img_type" value="1">
                            </div>
                            <div class="card-box">
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7">Tiêu đề</label>
                                    <input type="text" class="form-control form-control-cst" name="img_title">
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label mbr-fonts-style display-7">Giá tiền</label>
                                    <input type="text" class="form-control form-control-cst" name="img_money">
                                </div>
                                <div class="form-group" data-for="message">
                                    <label class="form-control-label mbr-fonts-style display-7">Nội dung</label>
                                    <textarea type="text" class="form-control form-control-cst" name="img_content" rows="3"></textarea>
                                </div>
                            </div>
                            <div class="mbr-section-btn text-center">
                                <a href="#" onclick="fn_save(this)" class="btn btn-primary btn-sm display-4">
                                    Lưu
                                </a>
                                <a href="#" onclick="fn_collapse_toggle('0')" class="btn btn-secondary btn-sm display-4">
                                    Hủy
                                </a>
                            </div>
                        </div>
                        <div style="width: 100%; margin-top: 15px" align="center">
                            <a href="#" role="button" onclick="fn_collapse_toggle('0', this)">
                                <span class="mbr-iconfont mbri-arrow-down"></span>
                            </a>
                        </div>
                    </div>
				</form>
	        </div>
	        <div id="card" class="card p-3 col-12 col-md-6 col-lg-4">
				<form>
	            	<div class="card-wrapper">
                    {{ csrf_field() }}
                    <input type="hidden" name="id" value="0">
                    <input type="file" name="img_file" onchange="fn_img_file_change(this)" accept="image/*" style="display: none">
	                <div id="collapse-1-img" class="card-img" onclick="fn_attach_image(this)">
	                    <img src="http://banhtrangto.local/images/img_1.jpg">
	                </div>
	                <div class="collapse" id="collapse-1">
	                    <div class="mbr-section-btn text-center">
	                        <a href="#" onclick="fn_img_type_toggle('1', this)" class="btn btn-warning btn-sm display-3">SP</a>
	                        <a href="#" onclick="fn_img_type_toggle('1', this)" class="btn btn-success-cst btn-sm display-3">TP</a>
	                        <a href="#" onclick="fn_img_type_toggle('1', this)" class="btn btn-warning btn-sm display-3">GT</a>
	                        <input type="hidden" name="img_type" value="0">
	                    </div>
	                    <div class="card-box">
	                        <div class="form-group">
	                            <label class="form-control-label mbr-fonts-style display-7">Tiêu đề</label>
	                            <input type="text" class="form-control form-control-cst" name="img_title">
	                        </div>
	                        <div class="form-group">
	                            <label class="form-control-label mbr-fonts-style display-7">Giá tiền</label>
	                            <input type="text" class="form-control form-control-cst" name="img_money">
	                        </div>
	                        <div class="form-group" data-for="message">
	                            <label class="form-control-label mbr-fonts-style display-7">Nội dung</label>
	                            <textarea type="text" class="form-control form-control-cst" name="img_content" rows="3"></textarea>
	                        </div>
	                    </div>
	                    <div class="mbr-section-btn text-center">
	                        <a href="#"onclick="fn_save(this)" class="btn btn-primary btn-sm display-4">
	                            Lưu
	                        </a>
	                        <a href="#" onclick="fn_delete(this)" class="btn btn-secondary btn-sm display-4">
	                            Xóa
	                        </a>
	                    </div>
	                </div>
	                <div style="width: 100%; margin-top: 15px" align="center">
	                    <a href="#" role="button" onclick="fn_collapse_toggle('1', this)">
	                        <span class="mbr-iconfont mbri-arrow-down"></span>
	                    </a>
	                </div>
	            </div>
				</form>
	        </div>
	    </div>
	</div>
@endsection