<div class="container">
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                      <div class="container-fluid">
                        <!-- <a class="navbar-brand" href="#">Navbar</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                          <span class="navbar-toggler-icon"></span>
                        </button> -->
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                              <a class="nav-link active" aria-current="page" href="{{route('home')}}">Admin</a>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Quản lí danh mục
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('danhmuc.create')}}">Thêm danh mục</a></li>
                                <li><a class="dropdown-item" href="{{route('danhmuc.index')}}">Liệt kê danh mục</a></li>
                              </ul>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Truyện
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('truyen.create')}}">Thêm truyện</a></li>
                                <li><a class="dropdown-item" href="{{route('truyen.index')}}">Liệt kê  truyện</a></li>
                              </ul>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sách
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('sach.create')}}">Thêm sách</a></li>
                                <li><a class="dropdown-item" href="{{route('sach.index')}}">Liệt kê sách</a></li>
                              </ul>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Chapter
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('chapter.create')}}">Thêm chapter</a></li>
                                <li><a class="dropdown-item" href="{{route('chapter.index')}}">Liệt kê chapter</a></li>
                              </ul>
                            </li>
                            <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Thể loại
                              </a>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{route('theloai.create')}}">Thêm thể loại</a></li>
                                <li><a class="dropdown-item" href="{{route('theloai.index')}}">Liệt thể loại</a></li>
                              </ul>
                            </li>
                          </ul>
                          <form class="d-flex" role="search">
                            <input class="form-control me-2" type="search" placeholder="Tìm kiếm" aria-label="Search">
                            <button class="btn btn-outline-success" style="width: 150px;" type="submit">Tìm kiếm</button>
                          </form>
                        </div>
                      </div>
                    </nav>
                 

</div>