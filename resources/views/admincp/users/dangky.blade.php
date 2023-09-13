@extends('../layout')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Đăng ký tài khoản</li>
  </ol>
</nav>
<!-- Sách mới -->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
<form method="POST" action="{{route('register-publisher')}}">
  @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Fullname:</label>
    <input type="text" class="form-control" name="fullname" id="exampleInputEmail1"  value="{{old('fullname')}}" aria-describedby="emailHelp" placeholder="Nhập Fullname">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">User name:</label>
    <input type="text" class="form-control" name="username" placeholder="Nhập User name" value="{{old('username')}}"   id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
    <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Số điện thoại:</label>
    <input type="text" class="form-control" name="sdt" placeholder="Nhập số điện thoại" value="{{old('sdt')}}"   id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address:</label>
    <input type="email" class="form-control" name="email" placeholder="Nhập email" value="{{old('email')}}" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" value="{{old('password')}}" id="exampleInputPassword1">
  </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password Confirmed</label>
    <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Don't forget</label>
  </div>
  <button type="submit" class="btn btn-primary">Đăng kí</button>
</form>
@endsection      