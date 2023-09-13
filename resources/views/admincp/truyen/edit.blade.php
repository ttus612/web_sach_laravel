@extends('layouts.app')

@section('content')
@include('layouts.nav') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật truyện</div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!-- GỬI BẰNG PHƯƠNG THỨC POST ĐỂ TRUYỀN DL VÀ LƯU DL VÀO CSDL -->
                    <form method="POST" action="{{route('truyen.update',[$truyen->id])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf 
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Tên truyện</label>
                            <input type="text" class="form-control" name="tentruyen" value="{{$truyen->tentruyen}}" onkeyup="ChangeToSlug();" id="slug" aria-describedby="emailHelp" placeholder="Tên truyện">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Tác giả</label>
                            <input type="text" class="form-control" name="tacgia" value="{{$truyen->tacgia}}" aria-describedby="emailHelp" placeholder="Tác giả">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Từ khóa</label>
                            <input type="text" class="form-control" name="tukhoa" value="{{$truyen->tukhoa}}" aria-describedby="emailHelp" >
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Slug truyện</label>
                            <input type="text" class="form-control" name="slug_truyen" value="{{$truyen->slug_truyen}}" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug truyện">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Tóm tắt truyện</label>
                            <textarea class="form-control" name="tomtat" rows="5" style="resize: none;"> {{$truyen->tomtat}}</textarea>
                        </div>
                        <div class="mb-3 form-group">                
                            <label for="exampleInputEmail1" class="form-label">Danh mục truyện</label>
                            <select class="form-select" name="danhmuc" aria-label="Default select example">
                                <?php foreach ($danhmuc as $key => $muc): ?>
                                    <option {{$muc->id == $truyen->danhmuc_id ? 'selected' : ''}} value="{{$muc->id}}">{{$muc->tendanhmuc}}</option>
                             
                                <?php endforeach ?>
                             
                            </select>  
                        </div>
                        <div class="mb-3 form-group">                
                            <label for="exampleInputEmail1" class="form-label">Thể loại truyện</label>
                            <select class="form-select" name="theloai" aria-label="Default select example">
                                <?php foreach ($theloai as $key => $tl): ?>
                                    <option {{$tl->id == $truyen->theloai_id ? 'selected' : ''}} value="{{$tl->id}}">{{$tl->tentheloai}}</option>
                             
                                <?php endforeach ?>
                             
                            </select>  
                        </div>
                        <div class="mb-3 form-group">                
                            <label for="exampleInputEmail1" class="form-label">Truyện nổi bật/hot</label>
                            <select class="form-select" name="truyen_noibat" aria-label="Default select example">
                                @if($truyen->truyen_noibat == 0)
                                    <option selected value="0">Truyện mới</option>
                                    <option value="1">Truyện nổi bật</option>
                                    <option value="2">Truyện xem nhiều</option>
                                @elseif($truyen->truyen_noibat == 1)
                                    <option  value="0">Truyện mới</option>
                                    <option selected value="1">Truyện nổi bật</option>
                                    <option value="2">Truyện xem nhiều</option>
                                @else
                                    <option value="0">Truyện mới</option>
                                    <option value="1">Truyện nổi bật</option>
                                    <option selected value="2">Truyện xem nhiều</option>
                                @endif
                             
                            </select>  
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Hình ảnh truyện</label>
                            <input type="file" class="form-control-file" name="hinhanh" >
                            <img src="{{asset('public/uploads/truyen/'.$truyen->hinhanh)}}" height="200" width="200">
                        </div>
                        <div class="mb-3 form-group">                
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt truyện</label>
                            <select class="form-select" name="kichhoat" aria-label="Default select example">
                                @if($truyen->kichhoat == 0): ?>                               
                                    <option selected value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                @else                  
                                    <option value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                @endif
                            </select>  
                        </div>
                    
                        <button type="submit" name="themtruyen" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
