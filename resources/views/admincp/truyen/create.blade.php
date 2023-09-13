@extends('layouts.app')

@section('content')
@include('layouts.nav') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm truyện</div>
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
                    <form method="POST" action="{{route('truyen.store')}}" enctype="multipart/form-data">
                        @csrf 
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Tên truyện</label>
                            <input type="text" class="form-control" name="tentruyen" value="{{old('tentruyen')}}" onkeyup="ChangeToSlug();" id="slug" aria-describedby="emailHelp" placeholder="Tên truyện">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Tác giả</label>
                            <input type="text" class="form-control" name="tacgia" value="{{old('tacgia')}}" aria-describedby="emailHelp" placeholder="Tác giả">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Slug truyện</label>
                            <input type="text" class="form-control" name="slug_truyen" value="{{old('slug_truyen')}}" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug truyện">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Từ khóa</label>
                            <input type="text" class="form-control" name="tukhoa" value="{{old('tukhoa')}}" aria-describedby="emailHelp" placeholder="Từ khóa">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Tóm tắt truyện</label>
                            <textarea class="form-control" name="tomtat" rows="5" style="resize: none;"> </textarea>
                        </div>
                         <div class="mb-3 form-group">                
                            <label for="exampleInputEmail1" class="form-label">Danh mục truyện</label>
                            <select class="form-select" name="danhmuc" aria-label="Default select example">
                                <?php foreach ($danhmuc as $key => $muc): ?>
                                    <option value="{{$muc->id}}">{{$muc->tendanhmuc}}</option>  
                                <?php endforeach ?>
                            </select>  
                        </div>
                        <div class="mb-3 form-group">                
                            <label for="exampleInputEmail1" class="form-label">Thể loại</label>
                            <select class="form-select" name="theloai" aria-label="Default select example">
                                <?php foreach ($theloai as $key => $tl): ?>
                                    <option value="{{$tl->id}}">{{$tl->tentheloai}}</option>  
                                <?php endforeach ?>
                            </select>  
                        </div>
                        <div class="mb-3 form-group">                
                            <label for="exampleInputEmail1" class="form-label">Truyện nổi bật/hot</label>
                            <select class="form-select" name="truyen_noibat" aria-label="Default select example">
                                <option value="0">Truyện mới</option>
                                <option value="1">Truyện nổi bật</option>
                                <option value="2">Truyện xem nhiều</option>
                            </select>  
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Hình ảnh truyện</label>
                            <input type="file" class="form-control-file" name="hinhanh" >
                        </div>
                   
                        <div class="mb-3 form-group">                
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt truyện</label>
                            <select class="form-select" name="kichhoat" aria-label="Default select example">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>  
                        </div>
                    
                        <button type="submit" name="themtruyen" class="btn btn-primary">Thêm truyện</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
