<div class="header--sidebar"></div>
    <header class="header">
      <div class="header__top">
        <div class="container-fluid">
          <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                  <p>92-Nguyễn Khách Toàn - Cầu Giấy -Hà Nội .  -  Hotline: 0869245667</p>
                </div>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                     <?php               
                      $id_khachhang=Session::get('id_khachhang');
                      $ten =Session::get('taikhoan_khachhang');
                      if ($id_khachhang != NULL){?>
                       <div class="header__actions"><a href="#">Chào mừng : <?php echo $ten;?></a><a href="web/loguotcheckout">Đăng Xuất</a>
                        <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USD<i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu">
                            <li><a href="#"><img src="images/flag/usa.svg" alt=""> USD</a></li>
                            <li><a href="#"><img src="images/flag/singapore.svg" alt=""> SGD</a></li>
                            <li><a href="#"><img src="images/flag/japan.svg" alt=""> JPN</a></li>
                          </ul>
                        </div>
                        <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language<i class="fa fa-angle-down"></i></a>
                          <ul class="dropdown-menu">
                            <li><a href="#">English</a></li>
                            <li><a href="#">Japanese</a></li>
                            <li><a href="#">Việt Nam</a></li>
                          </ul>
                        </div>
                      </div>
                      <?php
                      }else {
                        ?>
                        <div class="header__actions"><a href="web/logincheckout/checkout">Đăng nhập & Đăng ký</a>
                      <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">USD<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                          <li><a href="#"><img src="images/flag/usa.svg" alt=""> USD</a></li>
                          <li><a href="#"><img src="images/flag/singapore.svg" alt=""> SGD</a></li>
                          <li><a href="#"><img src="images/flag/japan.svg" alt=""> JPN</a></li>
                        </ul>
                      </div>
                      <div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Language<i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">English</a></li>
                          <li><a href="#">Japanese</a></li>
                          <li><a href="#">Việt Nam</a></li>
                        </ul>
                      </div>
                    </div>
                    <?php
                      }
                    ?>
                </div>
          </div>
        </div>
      </div>
      <nav class="navigation">
        <div class="container-fluid">
          <div class="navigation__column left">
            <div class="header__logo"><a class="ps-logo" href="index.html"><img src="images/logo.png" alt=""></a></div>
          </div>
          <div class="navigation__column center">
                <ul class="main-menu menu">
                  <li class="menu-item menu-item-has-children dropdown"><a href="web/trangchu">Home</a>
                  </li>
                  <li class="menu-item menu-item-has-children has-mega-menu"><a href="web/tatca">DANH MỤC</a>
                    <div class="mega-menu">
                      <div class="mega-wrap">
                        <div class="mega-column">
                          <ul class="mega-item mega-features">
                            @foreach ($danhmuc as $ds)
                            <li><a href="web/trangdanhmuc/{{$ds->DanhMuc_Id}}">{{$ds->TenDM}}</a></li>  
                            @endforeach 
                          </ul>
                        </div>
                        <div class="mega-column">
                          <h4 class="mega-heading">Nhà Cung Cấp</h4>  
                          <ul class="mega-item">
                            @foreach ($nhacc as $ds)
                            <li><a href="web/trangnhacc/{{$ds->NhaCC_Id}}">{{$ds->TenNhaCC}}</a></li>  
                            @endforeach
                          </ul>
                        </div>
                        <div class="mega-column">
                          <h4 class="mega-heading">KHác</h4>
                          <ul class="mega-item">
                          </ul>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="menu-item"><a href="web/tintuc">TIN TỨC</a></li>
                  <li class="menu-item"><a href="web/lienhe">LIÊN HỆ</a></li>
                </ul>
          </div>
          <div class="navigation__column right">
            <form class="ps-search--header" action="web/timkiemsanpham" method="post">
              @csrf
              <input class="form-control" type="text" placeholder="Search Product…" name="tuKhoa">
              <button type="submit"><i class="ps-icon-search"></i></button>
            </form>
            <div class="ps-cart"><a class="ps-cart__toggle" href="web/showcart"><span><i>{{Cart::getContent()->count()}}</i></span><i class="ps-icon-shopping-cart"></i></a>
              <div class="ps-cart__listing">
                <div class="ps-cart__content">
                  @foreach($cart as $ds)
                  <div class="ps-cart-item"><a class="ps-cart-item__close" href="{{asset('web/cart/xoa/'.$ds->id)}}"></a>
                    <div class="ps-cart-item__thumbnail"><a href="product-detail.html"></a><img src="upload/sanpham/{{$ds->attributes->anh}}" alt=""></div>
                    <div class="ps-cart-item__content"><a class="ps-cart-item__title" href="product-detail.html">{{$ds->name}}</a>
                      <p><span>số lượng:<i>{{$ds->quantity}}</i></span><br><span>Giá:<i>{{number_format($ds->price)}}</i></span></p>
                    </div>
                  </div>
                  @endforeach
                </div>
                <div class="ps-cart__total">
                  <p>Tổng:<span>{{number_format($tong)}}</span></p>
                </div>
                <div class="ps-cart__footer"><a class="ps-btn" href="web/showcart">Check out<i class="ps-icon-arrow-left"></i></a></div>
              </div>
            </div>
            <div class="menu-toggle"><span></span></div>
          </div>
        </div>
      </nav>
    </header>
    <div class="header-services">
      <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Giao hàng miễn phí</strong> -:- nhanh chóng, tiện lợi !</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Giao hàng trong tuần</strong> -:- nhanh chóng, tiện lợi !</p>
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Giao hàng 24h/7</strong> -:- nhanh chóng, tiện lợi !</p>
      </div>
    </div>