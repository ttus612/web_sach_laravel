
<h3>Sách hay</h3>
<div class="owl-carousel owl-theme mt-5"> 
    <?php foreach ($truyen as $key => $value): ?>
        <div class="item">
            <img src="{{asset('public/uploads/truyen/'.$value->hinhanh)}}" style="height: 300px;">
            <h3>{{$value->tentruyen}}</h3>
            <p><i class="fas fa-eye">123</i></p>
            <a href="{{url('xem-truyen/'.$value->slug_truyen)}}" class="btn btn-danger btn-sm">Đọc ngay</a> 
        </div>   
    <?php endforeach ?>   
</div>
