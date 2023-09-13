@extends('../layout')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
     <li class="breadcrumb-item"><a href="{{url('the-loai/'.$truyen_breadcrumb->theloai->slug_theloai)}}">{{$truyen_breadcrumb->theloai->tentheloai}}</a></li>
    <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen_breadcrumb->danhmuctruyen->slug_danhmuc)}}">{{$truyen_breadcrumb->danhmuctruyen->tendanhmuc}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$truyen_breadcrumb->tentruyen}}</li>
  </ol>
</nav>
<div class="row">
	<div class="col-md-12">
		<h4>{{$chapter->truyen->tentruyen}}</h4>
		<p>Chương hiện tại: {{$chapter->tieude}}</p>
		<div class="col-md-5">
			<style type="text/css">
				.isDisabled{
					color: currentColor;
					pointer-events: none;
					opacity: 0.5;
					text-decoration: none;
				}
			</style>
			<div class="form-group">
				<label for="exampleInputEmail1">Chọn chương:</label>
				<p><a href="{{url('xem-chapter/'.$previous_chapter)}}" class="btn btn-primary {{$chapter->id == $min_id->id ? 'isDisabled' : ''}}">Tập trước</a></p>
				<select class="form-select form-select-sm select-chapter" name="select-chapter"  aria-label="Small select example">
					<?php foreach ($all_chapter as $key => $all_c_value): ?>
				  		<option value="{{url('xem-chapter/'.$all_c_value->slug_chapter)}}">{{$all_c_value->tieude}}</option>
					<?php endforeach ?>
				</select>
				<br>
				<p>	<a href="{{url('xem-chapter/'.$next_chapter)}}" class="btn btn-primary {{$chapter->id == $max_id->id ? 'isDisabled' : ''}}">Tập sau</a></p>
			</div>
		</div>
		<br>
		<div class="noidungchuong">	
			{!! $chapter->noidung !!}
			<br>
			<div class="col-md-5">
				<div class="form-group">
					<label for="exampleInputEmail1">Chọn chương</label>
					<select class="form-select form-select-sm select-chapter" name="select-chapter"  aria-label="Small select example">
						<?php foreach ($all_chapter as $key => $all_c_value): ?>
					  		<option value="{{url('xem-chapter/'.$all_c_value->slug_chapter)}}">{{$all_c_value->tieude}}</option>
						<?php endforeach ?>
					</select>
				</div>
			</div>
			<h3>Lưu và chia sẻ truyện: </h3>
			<a href=""><i class="fab fa-facebook-f"></i></a>
			<a href=""><i class="fab fa-twitter"></i></a>
		</div>
	</div>
</div>
@endsection