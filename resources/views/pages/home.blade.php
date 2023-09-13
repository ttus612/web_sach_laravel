@extends('../layout')
<!-- Nó sẽ cộng với layout của 'layout.blade.php
    Vì có cái yield(content) bên 'layout.blade.php' sẽ gọi đến cái này section này và lấy nguyên phần này trả về bên kia
   Để thêm 'slide' vào thì ta thêm 1 section nữa và sử dụng 
-->

@section('slide')
    @include('pages.slide')
@endsection
@section('content')
<!-- Sách mới -->
            <br>
            <h3 >Sách hay mới cập nhật</h3>
            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row">
                        <?php foreach ($truyen as $key => $v_truyen): ?>
                            <div class="col-md-3">
                                <div class="card mb-3 box-shadow">
                                    <img class="card-img-top " data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{asset('public/uploads/truyen/'.$v_truyen->hinhanh)}}" data-holder-rendered="true">
                                    <div class="card-body">
                                        <h3>{{$v_truyen->tieude}}</h3>
                                        <p class="card-text">
                                            <?php 
                                                $tomtat = substr($v_truyen->tomtat,0,300);
                                             ?>
                                            {{$tomtat.'....'}}
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <a href="{{url('xem-truyen/'.$v_truyen->slug_truyen)}}" class="btn btn-sm btn-outline-secondary">Đọc ngay</a>
                                                <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye">123</i></a>
                                            </div>
                                            <small class="text-muted">9 mins ago</small>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        <?php endforeach ?>  
                    </div> 
                </div>
            </div>
@endsection      