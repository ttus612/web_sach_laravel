@extends('../layout')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item"><a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
    <li class="breadcrumb-item active" aria-current="page">{{$truyen->danhmuctruyen->tendanhmuc}}</li>
  </ol>
</nav>
<div class="row">
	<div class="col-md-9">
		<div class="row">
			<div class="col-md-3">
				<img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" data-holder-rendered="true">
			</div>
			<div class="col-md-9">
				<style type="text/css">
					.infotruyen{
						list-style: none;
					}
				</style>
				<ul class="infotruyen">
					<!-- Lấy biến  -->
					<input type="hidden" value="{{$truyen->tentruyen}}" class="wishlist_title" name="">
					<input type="hidden" value="{{\URL::current()}}" class="wishlist_url" name="">
					<input type="hidden" value="{{$truyen->id}}" class="wishlist_id" name="">
					<input type="hidden" value="{{$truyen->theloai->tentheloai}}" class="wishlist_loai" name="">
					<!-- End lấy biến -->
					<li>Tên truyện: {{$truyen->tentruyen}}</li>
					<li>Ngày đăng: {{$truyen->created_at->diffForHumans()}}</li>
					<li>Tác giả: {{$truyen->tacgia}}</li>
					<li>Danh mục truyện: <a href="{{url('danh-muc/'.$truyen->danhmuctruyen->slug_danhmuc)}}">{{$truyen->danhmuctruyen->tendanhmuc}}</a></li>
					<li>Thể loại: <a href="{{url('the-loai/'.$truyen->theloai->slug_theloai)}}">{{$truyen->theloai->tentheloai}}</a></li>
					<li>Số chap: 213</li>
					<li>Số chapter: 213</li>
					<li>Số lượt xem: 213333</li>
					<li><a href="#">Xem mục lục</a></li>
					<?php if ($chapter_dau): ?>
						<li>
							<a href="{{url('xem-chapter/'.$chapter_dau->slug_chapter)}}" class="btn btn-primary">Đọc ngay</a>
							<button class="btn btn-danger btn-thich-truyen"><i class="fa fa-heart" aria-hidden="true"></i> Thích truyện</button>
							<!-- 	<form>
									@csrf
									<button type="button" onclick="return themyeuthich()" 
									data-fa_publisher_id  ="{{Session::get('publisher_id')}}"
									data-fa_title  ="{{$truyen->tentruyen}}"
									data-fa_image  ="{{$truyen->hinhanh}}"
								
									class="btn btn-danger btn-yeuthichtruyen"><i class="fa fa-heart" aria-hidden="true"></i> Thích truyện
									</button>
								</form> -->
						</li>
						
						<li><a href="{{url('xem-chapter/'.$chapter_moinhat->slug_chapter)}}" class="btn btn-success mt-2">Đọc chương mới nhất</a></li>	
					<?php else: ?>
						<li><a href="" class="btn btn-danger">Hiện tại chưa có chương để đọc</a></li>	
					<?php endif ?>		
				</ul>
			</div>
		</div>
		<div class="col-md-12">
			<p>{{$truyen->tomtat}}</p>
		</div>
		<hr>
		<style type="text/css">
			.tagcloud05 ul {
				margin: 0;
				padding: 0;
				list-style: none;
			}
			.tagcloud05 ul li {
				display: inline-block;
				margin: 0 0 .3em 1em;
				padding: 0;
			}
			.tagcloud05 ul li a {
				position: relative;
				display: inline-block;
				height: 30px;
				line-height: 30px;
				padding: 0 1em;
				background-color: #3498db;
				border-radius: 0 3px 3px 0;
				color: #fff;
				font-size: 13px;
				text-decoration: none;
				-webkit-transition: .2s;
				transition: .2s;
			}
			.tagcloud05 ul li a::before {
				position: absolute;
				top: 0;
				left: -15px;
				content: '';
				width: 0;
				height: 0;
				border-color: transparent #3498db transparent transparent;
				border-style: solid;
				border-width: 15px 15px 15px 0;
				-webkit-transition: .2s;
				transition: .2s;
			}
			.tagcloud05 ul li a::after {
				position: absolute;
				top: 50%;
				left: 0;
				z-index: 2;
				display: block;
				content: '';
				width: 6px;
				height: 6px;
				margin-top: -3px;
				background-color: #fff;
				border-radius: 100%;
			}
			.tagcloud05 ul li span {
				display: block;
				max-width: 100px;
				white-space: nowrap;
				text-overflow: ellipsis;
				overflow: hidden;
			}
			.tagcloud05 ul li a:hover {
				background-color: #555;
				color: #fff;
			}
			.tagcloud05 ul li a:hover::before {
				border-right-color: #555;
			}
			h3.card-header {
			    background-color: antiquewhite;
			    text-align: center;
			    padding: 5px;
			    margin-top: 5px;
			}
		</style>
		<p>Từ khóa tìm kiếm</p>
		<?php 
			$tukhoa = explode(",",$truyen->tukhoa);	
		 ?>
		<div class="tagcloud05">
			<ul>
				<?php foreach ($tukhoa as $key => $tu): ?>
					<li><a href="{{url('tag/'.\Str::slug($tu))}}"><span>{{$tu}}</span></a></li>
				<?php endforeach ?>
			</ul>
		</div>

		<h4>Mục lục</h4>
		<ul class="mucluctruyen">
			<?php 
				$mucluc_count = count($chapter);
			?>
			<?php if ($mucluc_count > 0): ?>
				<?php foreach ($chapter as $key => $c_value): ?>
					<li><a href="{{url('xem-chapter/'.$c_value->slug_chapter)}}">{{$c_value->tieude}}</a></li>
				<?php endforeach ?>	
			<?php else: ?>
				<li>Đang cập nhật mục lục</li>
			<?php endif ?>
					
		</ul>

	
		
		<h4>Sách cùng danh mục</h4>	
		<div class="row">
          	<?php foreach ($cungdanhmuc as $key => $v_truyen): ?>
                <div class="col-md-3">
                    <div class="card mb-3 box-shadow">
                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{asset('public/uploads/truyen/'.$v_truyen->hinhanh)}}" data-holder-rendered="true">
                        <div class="card-body">
                            <h3>{{$v_truyen->tentruyen}}</h3>
                            <p class="card-text">
                            	<?php 
                                    $tomtat = substr($v_truyen->tomtat,0,300);
                                ?>
                                {{$tomtat.'....'}}
                            
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{url('xem-truyen/'.$v_truyen->slug_truyen)}}" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                                    <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye">123</i></a>
                                </div>
                                <small class="text-muted">9 mins ago</small>
                            </div>
                        </div>  
                    </div>
                </div>
            <?php endforeach ?> 
		</div>		
	</div>
	<div class="col-md-3">
		<h3 class="card-header">Sách nổi bật</h3>
		<?php foreach ($truyen_noibat as $key => $noibat): ?>
			<div class="row mt-2"> 
	            <div class="col-md-4">
	                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 120px; width: 100%; display: block;" src="{{asset('public/uploads/truyen/'.$noibat->hinhanh)}}" data-holder-rendered="true">
	            </div>
	            <div class="col-md-8">
	                <div class="card-body">
	                	<a href="{{url('xem-truyen/'.$noibat->slug_truyen)}}" style="text-decoration-line: none; color: black;"><h5>{{$noibat->tentruyen}}</h3></a>
	                    <p>Thể loại:{{$noibat->theloai->tentheloai}}</p>	
	                    <div class="d-flex justify-content-between align-items-center" >
	                        <div class="btn-group">
	                            <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye">123</i></a>
	                        </div>
	                        <small class="text-muted">9 mins ago</small>
	                    </div>
	                </div>
	            </div>
			</div>
        <?php endforeach ?> 

		<h3 class="card-header">Sách xem nhiều</h3>
		<?php foreach ($truyen_xemnhieu as $key => $xemnhieu): ?>
			<div class="row mt-2"> 
	            <div class="col-md-4">
	                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 120px; width: 100%; display: block;" src="{{asset('public/uploads/truyen/'.$xemnhieu->hinhanh)}}" data-holder-rendered="true">
	            </div>
	            <div class="col-md-8">
	                <div class="card-body">
	                	<a href="{{url('xem-truyen/'.$xemnhieu->slug_truyen)}}" style="text-decoration-line: none; color: black;"><h5>{{$xemnhieu->tentruyen}}</h3></a>
	                    <p>Thể loại:{{$xemnhieu->theloai->tentheloai}}</p>	
	                    <div class="d-flex justify-content-between align-items-center" >
	                        <div class="btn-group">
	                            <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye">123</i></a>
	                        </div>
	                        <small class="text-muted">9 mins ago</small>
	                    </div>
	                </div>
	            </div>
			</div>
        <?php endforeach ?> 


		<h3 class="card-header">Sách mới cập nhật</h3>
		<?php foreach ($truyen_moi as $key => $v_truyen): ?>
			<div class="row mt-2"> 
	            <div class="col-md-4">
	                <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 120px; width: 100%; display: block;" src="{{asset('public/uploads/truyen/'.$v_truyen->hinhanh)}}" data-holder-rendered="true">
	            </div>
	            <div class="col-md-8">
	                <div class="card-body">
	                	<a href="{{url('xem-truyen/'.$v_truyen->slug_truyen)}}" style="text-decoration-line: none; color: black;"><h5>{{$v_truyen->tentruyen}}</h3></a>
	                    <p>Thể loại:{{$v_truyen->theloai->tentheloai}}</p>	
	                    <div class="d-flex justify-content-between align-items-center" >
	                        <div class="btn-group">
	                            <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye">123</i></a>
	                        </div>
	                        <small class="text-muted">9 mins ago</small>
	                    </div>
	                </div>
	            </div>
			</div>
        <?php endforeach ?> 
        <h3 class="card-header">Truyện yêu thích</h3>
        <div id="yeuthich"></div>
	</div>
</div>
@endsection      