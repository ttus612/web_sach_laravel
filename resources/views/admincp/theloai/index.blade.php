@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Liệt kê thể loại</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped table-hover">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tên thể loại</th>
                          <th scope="col">Slug thể loại</th>
                          <th scope="col">Mô tả</th>
                          <th scope="col">Kích hoạt</th>
                          <th scope="col">Quản lí</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($theloai as $key => $tl): ?>
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$tl->tentheloai}}</td>
                                <td>{{$tl->slug_theloai}}</td>
                                <td>{{$tl->mota}}</td>
                                <td>
                                    @if($tl->kichhoat == 0)
                                        <span class="text text-success" >Kích hoạt</span>
                                    @else
                                        <span class="text text-danger" >Không kích hoạt</span>
                                    @endif  
                                </td>
                                <td>
                                    <a href="{{route('theloai.edit',[$tl->id])}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('theloai.destroy',[$tl->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có muốn xóa danh mục này hay không?');" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach ?>
                       
                      
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
