@extends('layouts.app')

@section('content')
@include('layouts.nav') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm sách</div>
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
                    <form method="POST" action="{{route('sach.store')}}" enctype="multipart/form-data">
                        @csrf 
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Tên sách</label>
                            <input type="text" class="form-control" name="tensach" value="{{old('tensach')}}" onkeyup="ChangeToSlug();" id="slug" aria-describedby="emailHelp" placeholder="Tên truyện">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Lượt xem</label>
                            <input type="text" class="form-control" name="views" value="{{old('views')}}" aria-describedby="emailHelp" placeholder="Lượt view">
                        </div>
        
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Từ khóa</label>
                            <input type="text" class="form-control" name="tukhoa" value="{{old('tukhoa')}}" aria-describedby="emailHelp" placeholder="Từ khóa">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Slug sách</label>
                            <input type="text" class="form-control" name="slug_sach" value="{{old('slug_sach')}}" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug sách">
                        </div>
                      
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Tóm tắt sách</label>
                            <textarea class="form-control"  name="tomtat" rows="5" style="resize: none;"> </textarea>
                        </div>

                         <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Nội dung sách</label>
                            <textarea class="form-control" id="ckeditor_sach" name="noidung" rows="5" style="resize: none;"> </textarea>
                        </div>
                     <!--    <div class="mb-3 form-group">                
                            <label for="exampleInputEmail1" class="form-label">Truyện nổi bật/hot</label>
                            <select class="form-select" name="truyennoibat" aria-label="Default select example">
                                <option value="0">Truyện mới</option>
                                <option value="1">Truyện nổi bật</option>
                                <option value="2">Truyện xem nhiều</option>
                            </select>  
                        </div> -->
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Hình ảnh sách</label>
                            <input type="file" class="form-control-file" name="hinhanh" >
                        </div>
                   
                        <div class="mb-3 form-group">                
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt </label>
                            <select class="form-select" name="kichhoat" aria-label="Default select example">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>  
                        </div>
                    
                        <button type="submit" name="themsach" class="btn btn-primary">Thêm sách</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
