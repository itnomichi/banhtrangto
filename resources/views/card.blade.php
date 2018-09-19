<div id="card" class="card p-3 col-12 col-md-6 col-lg-3">
	<form>
		<div class="card-wrapper">
			{{ csrf_field() }}
			<input type="hidden" name="id" value="{{$image->id}}">
			<input type="file" name="img_file" onchange="fn_img_file_change(this)" accept="image/*" style="display: none">
			<div id="collapse-{{$image->id}}-img" class="card-img" onclick="fn_attach_image(this)">
				<img src="{{ asset('images/'.$image->id . "." . $image->img_ext) }}">
			</div>
			<div class="collapse" id="collapse-{{$image->id}}">
				<div class="mbr-section-btn text-center">
					<a href="#" onclick="fn_img_type_toggle('{{$image->id}}', this)" class="btn {{ $image->img_type == '1' ? 'btn-success-cst' : 'btn-warning' }} btn-sm display-3">SP</a>
					<a href="#" onclick="fn_img_type_toggle('{{$image->id}}', this)" class="btn {{ $image->img_type == '2' ? 'btn-success-cst' : 'btn-warning' }} btn-sm display-3">TP</a>
					<a href="#" onclick="fn_img_type_toggle('{{$image->id}}', this)" class="btn {{ $image->img_type == '3' ? 'btn-success-cst' : 'btn-warning' }} btn-sm display-3">GT</a>
					<input type="hidden" name="img_type" value="{{$image->img_type}}">
				</div>
				<div class="card-box">
					<div class="form-group">
						<label class="form-control-label mbr-fonts-style display-7">Tiêu đề</label>
						<input type="text" class="form-control form-control-cst" name="img_title" value="{{$image->img_title}}" >
					</div>
					<div class="form-group">
						<label class="form-control-label mbr-fonts-style display-7">Giá tiền</label>
						<input type="text" class="form-control form-control-cst" name="img_money" value="{{$image->img_money}}" >
					</div>
					<div class="form-group" data-for="message">
						<label class="form-control-label mbr-fonts-style display-7">Nội dung</label>
						<textarea type="text" class="form-control form-control-cst" name="img_content" rows="3">{{$image->img_content}}</textarea>
					</div>
				</div>
				<div class="mbr-section-btn text-center">
					<a href="#"onclick="fn_save(this)" class="btn btn-primary btn-sm display-4">
						Lưu
					</a>
					<a href="#" onclick="fn_delete(this, '{{$image->id}}')" class="btn btn-secondary btn-sm display-4">
						Xóa
					</a>
				</div>
			</div>
			<div style="width: 100%; margin-top: 15px" align="center">
				<a href="#" role="button" onclick="fn_collapse_toggle(this)">
					<span class="mbr-iconfont mbri-arrow-down"></span>
				</a>
			</div>
		</div>
	</form>
</div>