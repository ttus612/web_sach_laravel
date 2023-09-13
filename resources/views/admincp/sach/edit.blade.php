@extends('layouts.app')

@section('content')
@include('layouts.nav') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật sách</div>
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
                    <form method="POST" action="{{route('sach.update',[$sach->id])}}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf 
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Tên sách</label>
                            <input type="text" class="form-control" name="tensach" value="{{$sach->tensach}}" onkeyup="ChangeToSlug();" id="slug" aria-describedby="emailHelp" placeholder="Tên truyện">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Lượt xem</label>
                            <input type="text" class="form-control" name="views" value="{{$sach->views}}" aria-describedby="emailHelp" placeholder="Lượt view">
                        </div>
        
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Từ khóa</label>
                            <input type="text" class="form-control" name="tukhoa" value="{{$sach->tukhoa}}" aria-describedby="emailHelp" placeholder="Từ khóa">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Slug sách</label>
                            <input type="text" class="form-control" name="slug_sach" value="{{$sach->slug_sach}}" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug sách">
                        </div>
                      
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Tóm tắt sách</label>
                            <textarea class="form-control"  name="tomtat" rows="5" style="resize: none;">{{$sach->tomtat}} </textarea>
                        </div>

                         <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Nội dung sách</label>
                            <textarea class="form-control" id="ckeditor_sach" name="noidung" rows="5" style="resize: none;"> {{$sach->noidung}}</textarea>
                        </div>
                   

                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Hình ảnh sách</label>
                            <input type="file" class="form-control-file" name="hinhanh" >
                            <img src="{{asset('public/uploads/sach/'.$sach->hinhanh)}}" height="200" width="200">
                        </div>
                   
                        <div class="mb-3 form-group">                
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt </label>
                            <select class="form-select" name="kichhoat" aria-label="Default select example">
                                <option value="0">Kích hoạt</option>
                                <option value="1">Không kích hoạt</option>
                            </select>  
                        </div>
                    
                        <button type="submit" name="themsach" class="btn btn-primary">Cập nhật sách</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
