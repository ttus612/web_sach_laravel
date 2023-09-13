@extends('../layout')
<!-- Nó sẽ cộng với layout của 'layout.blade.php
    Vì có cái yield(content) bên 'layout.blade.php' sẽ gọi đến cái này section này và lấy nguyên phần này trả về bên kia
   Để thêm 'slide' vào thì ta thêm 1 section nữa và sử dụng 
-->


@section('content')
<!-- Sách mới -->
            <h3>Sách mới cập nhật</h3>
            <div class="album py-5 bg-light">
                <div class="container">
                    <div class="row">
                        <?php foreach ($sach as $key => $v_s): ?>
                            <div class="col-md-3">
                                <div class="card mb-3 box-shadow">
                                    <img class="card-img-top " data-src="holder.js/100px225?theme=thumb&amp;bg=55595c&amp;fg=eceeef&amp;text=Thumbnail" alt="Thumbnail [100%x225]" style="height: 225px; width: 100%; display: block;" src="{{asset('public/uploads/sach/'.$v_s->hinhanh)}}" data-holder-rendered="true">
                                    <div class="card-body">
                                        <h3>{{$v_s->tensach}}</h3>
                                        <p class="card-text">{{$v_s->tomtat}}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="btn-group">
                                                <form>
                                                    @csrf
                                                    <!-- Button trigger modal -->
                                                    <button type="button" id="{{$v_s->id}}" class="btn btn-primary xemsachnhnhanh" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                      Xem nhanh
                                                    </button>

                                                    <!-- Modal -->
                                                    <div class="modal fade  " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                <div id="tieude_sach"></div>
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                          </div>
                                                          <div class="modal-body">
                                                                <div id="noidung_sach"></div>
                                                          </div>
                                                          <div class="modal-footer">
                                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                                                          </div>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </form>
                                                <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-eye">{{$v_s->views}}</i></a>
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