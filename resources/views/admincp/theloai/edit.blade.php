@extends('layouts.app')

@section('content')
@include('layouts.nav') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sửa thể loại</div>
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
                    <form method="POST" action="{{route('theloai.update',[$theloai->id])}}">
                        @method('PUT')
                        @csrf 
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Tên thể loại</label>
                            <input type="text" class="form-control" name="tentheloai" value="{{$theloai->tentheloai}}" onkeyup="ChangeToSlug();" id="slug" aria-describedby="emailHelp" placeholder="Tên thể loại">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Slug thể loại</label>
                            <input type="text" class="form-control" name="slug_theloai" value="{{$theloai->slug_theloai}}" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug thể loại">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Mô tả thể loại</label>
                            <input type="text" class="form-control" name="mota" value="{{$theloai->mota}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả thể loại">
                        </div>
                        <div class="mb-3 form-group">                
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt thể loại</label>
                            <select class="form-select" name="kichhoat" aria-label="Default select example">
                                @if($theloai->kichhoat == 0): ?>                               
                                    <option selected value="0">Kích hoạt</option>
                                    <option value="1">Không kích hoạt</option>
                                @else                  
                                    <option value="0">Kích hoạt</option>
                                    <option selected value="1">Không kích hoạt</option>
                                @endif
                        </select>  
                        </div>
                    
                        <button type="submit" name="thetheloai" class="btn btn-primary">Sửa </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
