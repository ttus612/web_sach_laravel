@extends('layouts.app')

@section('content')
@include('layouts.nav') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Thêm danh mục</div>
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
                    <form method="POST" action="{{route('danhmuc.store')}}">
                        @csrf 
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Tên danh mục</label>
                            <input type="text" class="form-control" name="tendanhmuc" value="{{old('tendanhmuc')}}" onkeyup="ChangeToSlug();" id="slug" aria-describedby="emailHelp" placeholder="Tên danh mục">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Slug danh mục</label>
                            <input type="text" class="form-control" name="slug_danhmuc" value="{{old('slug')}}" id="convert_slug" aria-describedby="emailHelp" placeholder="Slug danh mục">
                        </div>
                        <div class="mb-3 form-group">
                            <label for="exampleInputEmail1" class="form-label">Mô tả danh mục</label>
                            <input type="text" class="form-control" name="mota" value="{{old('tendanhmuc')}}" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Mô tả danh mục">
                        </div>
                        <div class="mb-3 form-group">                
                            <label for="exampleInputEmail1" class="form-label">Kích hoạt danh mục</label>
                            <select class="form-select" name="kichhoat" aria-label="Default select example">
                            <option value="0">Kích hoạt</option>
                            <option value="1">Không kích hoạt</option>
                        </select>  
                        </div>
                    
                        <button type="submit" name="themdanhmuc" class="btn btn-primary">Thêm </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
