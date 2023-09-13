@extends('layouts.app')

@section('content')
@include('layouts.nav')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Liệt kê sách</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table class="table table-striped table-hover ">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Tên sách</th>   
                          <th scope="col">Hình ảnh</th>
                          <th scope="col">Từ khóa</th>
                          <th scope="col">Slug sách</th>
                          <th scope="col">Tóm tắt</th>
                       
                          <th scope="col">Kích hoạt</th>
                          <th scope="col">Ngày tạo</th>
                          <th scope="col">Ngày cập nhật</th>
                         
                          <th scope="col">Quản lí</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($list_sach as $key => $sach): ?>
                            <tr>
                                <th scope="row">{{$key}}</th>
                                <td>{{$sach->tensach}}</td>
                                <td><img src="{{asset('public/uploads/sach/'.$sach->hinhanh)}}" height="200" width="200">
                                </td>
                                <td>{{$sach->tukhoa}}</td>
                                <td>{{$sach->slug_sach}}</td>
                                <td>
                                    <?php 
                                        $tomtat = substr($sach->tomtat, 0, 200);
                                     ?>
                                    {!! $tomtat !!}
                                </td>

        
                                <td>
                                    @if($sach->kichhoat == 0)
                                        <span class="text text-success" >Kích hoạt</span>
                                    @else
                                        <span class="text text-danger" >Không kích hoạt</span>
                                    @endif  
                                </td>
                                <td>
                                    @if($sach->created_at != ' ')
                                        {{$sach->created_at}} - {{$sach->created_at->diffForHumans()}}
                                    @endif       
                                </td>
                                <td>
                                    @if($sach->updated_at != ' ')
                                        {{$sach->updated_at}} - {{$sach->updated_at->diffForHumans()}}
                                    @endif  
                                    
                                </td>
                                <td>
                                    <a href="{{route('sach.edit',[$sach->id])}}" class="btn btn-primary">Edit</a>
                                    <form action="{{route('sach.destroy',[$sach->id])}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Bạn có muốn tryện này hay không?');" class="btn btn-danger">Delete</button>
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
