<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Sách truyện hay</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        <!-- COPPY LẠI 2 CÁI NÀY ĐỂ CÓ BOOSTRAP SỬ DỤNG -->

        <!-- Share -->
        <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=64f1bc817973a500190b5a55&product=sticky-share-buttons&source=platform" async="async"></script>
        
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">
    </head>
    <body >
        <div class="container">
            <!-- Menu -->
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
                <div class="container-fluid">
                     <i class="fas fa-book"></i>
                    <a class="navbar-brand" href="{{URL('/')}}">sachtruyen.com</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                    
                          <a class="nav-link active" aria-current="page" href="{{URL('/')}}">
                          <i class="fa-solid fa-house"></i>
                          Trang chủ</a>
                        </li>
                      
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-list"></i>
                            Danh mục truyện
                          </a>
                          <ul class="dropdown-menu">
                            <?php foreach ($danhmuc as $key => $dm): ?>
                                <li><a class="dropdown-item" href="{{url('danh-muc/'.$dm->slug_danhmuc)}}">{{$dm->tendanhmuc}}</a></li>
                            <?php endforeach ?>
                            
                          </ul>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-list"></i>
                            Thể loại truyện
                          </a>
                          <ul class="dropdown-menu">
                            <?php foreach ($theloai as $key => $tl): ?>
                                <li><a class="dropdown-item" href="{{url('the-loai/'.$tl->slug_theloai)}}">{{$tl->tentheloai}}</a></li>
                            <?php endforeach ?>
                          </ul>
                        </li>
                        <li class="nav-item ">
                          <a class="nav-link " href="{{url('/doc-sach')}}">
                            <i class="fas fa-book"></i>Sách
                            <span class="sr-only"></span>
                            
                          </a>
                        </li>
                        @if(!Session::get('login_pulisher'))
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fa-solid fa-user"></i>
                                Khách
                              </a>
                              <ul class="dropdown-menu">
                            
                                    <li><a class="dropdown-item" href="{{route('dang-ky')}}">
                                    <i class="fa-solid fa-registered"></i>
                                    Đăng kí</a></li>
                                    <li><a class="dropdown-item" href="{{route('dang-nhap')}}">Đăng nhập</a></li>
                            
                              </ul>
                            </li>
                        @else
                             <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile: {{Session::get('username')}}
                              </a>
                              <ul class="dropdown-menu">
                                
                                    <li><a class="dropdown-item" href="{{route('yeu-thich')}}">Truyện yêu thích</a></li>
                                    <li><a class="dropdown-item" href="">Thông tin cơ bản</a></li>
                                    <li><a class="dropdown-item" href="{{route('dang-xuat')}}"><i class="fa fa-user"></i> Đăng xuất</a></li>
                                
                              </ul>
                            </li>
                        @endif  
                      </ul>
                      <form autocomplete="off" class="d-flex" action="{{url('tim-kiem')}}" role="search" method="POST">
                        @csrf
                        <input class="form-control me-2" type="search" id="keywords" name="tukhoa" placeholder="Tìm kiếm tác giả, truyện,..." aria-label="Search">
                        <div id="search_ajax" class="item_search"></div>
                        <button class="btn btn-outline-success" style="width: 150px;" type="submit">Tìm kiếm</button>
                      </form>
                    </div>
                </div>
            </nav>
            <!-- Slide -->
            @yield('slide')
            <!-- Sách -->
            @yield('content')
            <!-- Footer -->
            <footer class="text-muted">
                <div class="container">
                    <p class="float-right">
                      <a href="#">Back to top</a>
                    </p>
                    <p>Sách tổng hợp và sửa lỗi chính tả các tác phẩm sách truyện, hiện có trên mạng internet. Nếu có thể vui lòng liên hệ qua email: th@gmailcom</p>
                    <p>New to Bootstrap? <a href="../../">Visit the homepage</a> or read our <a href="../../getting-started/">getting started guide</a>.</p>
                </div>
            </footer>
            <div class="sharethis-sticky-share-buttons"></div>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Scripts for carousel -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
        <script type="text/javascript" src="https://owlcarousel2.github.io/OwlCarousel2/assets/owlcarousel/owl.carousel.js"></script>
  
        <script type="text/javascript">
            $('.owl-carousel').owlCarousel({
                loop:true,
                margin:10,
                dot:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            })
        </script>

        <script type="text/javascript">
            $('.select-chapter').on('change',function() {
                var url = $(this).val(); 
                if (url) {
                    window.location = url;
                }
                return false;
            });
            current_chapter();
            function current_chapter() {
                var url = window.location.href;
                $('select[name = "select-chapter"]').find('option[value="'+url+'"]').attr("selected", true);
            }
        </script>

        <script type="text/javascript">
            $('#keywords').keyup(function(){
                var keywords = $(this).val();//Lấy giá trị trong phần #keyword

                if (keywords != ''){
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url:"{{url('/timkiem-ajax')}}",
                        method:"POST",
                        data:{keywords:keywords, _token:_token},
                        success:function(data){
                            $('#search_ajax').fadeIn();
                            $('#search_ajax').html(data);  
                        }
                    });
                }else{
                    $('#search_ajax').fadeOut();
                }
            });

            $(document).on('click','.li_search_ajax', function () {
                $('#keywords').val($(this).text());
                $('#search_ajax').fadeOut();
            });
        </script>

        <!-- Thích truyện -->
        <script type="text/javascript">
            show_wishlist();
            function show_wishlist() {
                if (localStorage.getItem('wishlist_truyen') != null){
                    var data = JSON.parse(localStorage.getItem('wishlist_truyen'));
                    data.reverse();
                    for (i = 0; i < data.length; i++) {
                        var title = data[i].title;
                        var img = data[i].img;
                        var id = data[i].id;
                        var url = data[i].url;
                        var loai = data[i].loai;
                        $('#yeuthich').append(`
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <img class="img img-responsive card-img-top"  width="100%" src="`+img+`" alt="`+title+`" >
                                </div>
                                <div class="col-md-8 sidebar">
                                    <a href="`+url+`" style=" text-decoration-line: unset; color:black;">
                                        <h5>`+title+`</h5>
                                    </a> 
                                    <p>Thể loại:`+loai+`</p>
                                </div>
                            </div>
                        `);
                    }
                }
            }

            $('.btn-thich-truyen').click(function(){
                $('.fa.fa-heart').css('color', '#fac');
                const id = $('.wishlist_id').val();
                const title = $('.wishlist_title').val();
                const img = $('.card-img-top').attr('src');
                const url = $('.wishlist_url').val();
                const loai = $('.wishlist_loai').val();

                const item = {
                    'id': id,
                    'title': title,
                    'img': img, 
                    'url': url,
                    'loai': loai
                }


                if (localStorage.getItem('wishlist_truyen') == null) {
                    localStorage.setItem('wishlist_truyen', '[]');
                }

                var old_data = JSON.parse(localStorage.getItem('wishlist_truyen'));
                var matches = $.grep(old_data, function(obj) {
                    return obj.id == id;
                })
                if (matches.length) {
                    alert('Truyện đã có trong danh sách yêu thích');
                }else{
                    if (old_data.length <=5) {
                        old_data.push(item);
                    }else{
                        alert('Đã đạt giới hạn lưu truyện yêu thíc;h')
                    }
                    $('#yeuthich').append(`
                            <div class="row mt-2">
                                <div class="col-md-4">
                                    <img class="img img-responsive card-img-top"  width="100%" src="`+img+`" alt="`+title+`" >
                                </div>
                                <div class="col-md-8 sidebar">
                                    <a href="`+url+`" style=" text-decoration-line: unset; color:black;">
                                        <h5>`+title+`</h5>
                                    </a> 
                                    <p>Thể loại:`+loai+`</p>
                                </div>
                            </div>
                        `);
                    
                    localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));
                    alert('Đã lưu vào danh sách truyện thành công')
                } 
                localStorage.setItem('wishlist_truyen', JSON.stringify(old_data));     
            });  
        </script>

    <!-- Lấy data cho model -->
        <script type="text/javascript">
            $(document).on('click', '.xemsachnhnhanh', function(){
                var sach_id = $(this).attr('id');
                var _token = $('input[name ="_token"]').val();
   
                $.ajax({
                    url:'{{url('/xemsachnhanh')}}',
                    method:"POST",
                    dataType:"JSON",
                    data:{sach_id: sach_id, _token:_token},
                    success:function(data) {
                        $('#tieude_sach').html(data.tieude_sach);
                        $('#noidung_sach').html(data.noidung_sach);
                        
                    }
                });
            });
        </script>

<!--         <script type="text/javascript">
            function themyeuthich() {
                var title = $('.btn-yeuthichtruyen').data('fa_title');
                var image = $('.btn-yeuthichtruyen').data('fa_image');
                var publisher_id = $('.btn-yeuthichtruyen').data('fa_publisher_id');
                var _token = $('input[name ="_token"]').val();
                // alert('themyeuthich');

                $.ajax({
                    url:'{{url('/themyeuthic')}}',
                    method:"POST",         
                    data:{title:title,image:image,publisher_id:publisher_id,_token:_token},
                    success:function(data) {
                        alert('Thêm thanhg công');
                        
                    }
                });
                
            }

        </script> -->

    </body>

</html>
