@extends('../layout')
@section('content')
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
    <li class="breadcrumb-item active" aria-current="page">Tìm kiếm</li>
  </ol>
</nav>
<!-- Sách mới -->
            <h3>Bạn tìm kiếm với từ khóa: {{$tukhoa}}</h3>
            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row">
                        <?php 
                            $count = count($truyen);
                        ?>
                        <?php if ($count == 0): ?>
                            <div class="col-md-12">
                                <div class="card mb-12 box-shadow">
                                    <div class="card-body">
                                        <p>Không tìm thấy truyện</p>
                                       
                                    </div>  
                                </div>
                            </div>
                        <?php else: ?>
                            <?php foreach ($truyen as $key => $v_truyen): ?>
                                <div class="col-md-3">
                                    <div class="card mb-3 box-shadow">
                                        <img class="card-img-top" data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{asset('public/uploads/truyen/'.$v_truyen->hinhanh)}}" data-holder-rendered="true">
                                        <div class="card-body">
                                            <h3>{{$v_truyen->tieude}}</h3>
                                            <p class="card-text">{{$v_truyen->tomtat}}</p>
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
                        <?php endif ?>
                    </div>
                </div>
            </div>
@endsection      