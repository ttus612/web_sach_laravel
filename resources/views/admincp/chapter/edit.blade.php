@extends('layouts.app')

@section('content')
@include('layouts.nav') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Cập nhật chapter</div>
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
                    <form method="POST" action="{{route('chapter.update',[$chapter->id])}}">
                        @method('PUT')
                        @csrf 
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Tên chapter</label>
                            <input type="text" class="form-control" name="tieude" value="{{$chapter->tieude}}" onkeyup="ChangeToSlug();" id="slug" aria-describedby="emailHelp" >
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Slug chapter</label>
                            <input type="text" class="form-control" name="slug_chapter" value="{{$chapter->slug_chapter}}" id="convert_slug" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Tóm tắt chapter</label>
                            <input type="text" class="form-control" name="tomtat" value="{{$chapter->tomtat}}" id="exampleInputEmail1" aria-describedby="emailHelp" >
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Nội dung chapter</label>
                            <textarea name="noidung" class="form-control" id="noidung_chapter" rows="5" style="resize: none;">{{$chapter->noidung}}</textarea>
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Thuộc truyện</label>
                            <select class="form-select" name="truyen_id" aria-label="Default select example">
                                @foreach($truyen as $key => $value)
                                <option {{$chapter->truyen_id == $value->id ? 'selected': ''}} value="{{$value->id}}">{{$value->tentruyen}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 form-group">                
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt danh mục</label>
                            <select class="form-select" name="kichhoat" aria-label="Default select example">
                                @if($chapter->kichhoat == 0): ?>                               
                                    <option selected value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                @else                  
                                    <option value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                @endif
                            </select>  
                        </div>
                    
                        <button type="submit" name="themdanhmuc" class="btn btn-primary">Cập nhật </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
