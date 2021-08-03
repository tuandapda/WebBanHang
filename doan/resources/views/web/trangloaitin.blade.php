@extends('web.layouts.index')
@section('title','Loại Tin')  
@section('page')
<div class="ps-blog-grid pt-80 pb-80">
    <div class="ps-container">
      <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
               @foreach($loaitin_tk->tin as $ds) 
              <div class="ps-post--2">
                <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="web/chitiettintuc/{{$ds->ID}}"></a><img src="upload/tintuc/{{$ds->Anh}}" alt=""></div>
                <div class="ps-post__container">
                  <header class="ps-post__header"><a class="ps-post__title" href="web/chitiettintuc/{{$ds->ID}}">{{$ds->TieuDe}}</a>
                    <p>Date : {{date('d-m-Y', strtotime($ds->NgayCapNhat))}} </p>
                  </header>
                  <div class="ps-post__content">
                    <p>{{substr( $ds->NoiDung,  0, 80 )}}...</p>
                  </div>
                  <footer class="ps-post__footer"><a class="ps-post__morelink"  href="web/chitiettintuc/{{$ds->ID}}">READ MORE<i class="ps-icon-arrow-left"></i></a>
                    <div class="ps-post__actions"><span><i class="fa fa-comments"></i> 23 Comments</span><span><i class="fa fa-heart"></i>  likes</span>
                      <div class="ps-post__social"><i class="fa fa-share-alt"></i><a href="#">Share</a>
                        <ul>
                          <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                          <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
                      </div>
                    </div>
                  </footer>
                </div>
              </div>
              @endforeach            
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
              <aside class="ps-widget--sidebar ps-widget--search">
                <form class="ps-search--widget" action="web/timkiemtin" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                  <input class="form-control" type="text" placeholder="Search posts..." name="tuKhoa">
                  <button type="submit"><i class="ps-icon-search"></i></button>
                </form>
              </aside>
              <aside class="ps-widget--sidebar">
                <div class="ps-widget__header">
                  <h3>Danh Mục Tin Tức</h3>
                </div>
                <div class="ps-widget__content">
                  <ul class="ps-list--arrow">
                    @foreach($loaiTin as $ds)
                    <li ><a href="web/trangloaitin/{{$ds->ID}}">{{$ds->Ten}}</a></li>
                     @endforeach
                  </ul>
                </div>
              </aside>
              <aside class="ps-widget--sidebar">
                <div class="ps-widget__header">
                  <h3>HOT</h3>
                </div>
                <div class="ps-widget__content"><a href="web/trangchu"><img src="../upload/slide/anh.jpg" alt=""></a></div>
              </aside>
              <aside class="ps-widget--sidebar">
                <div class="ps-widget__header">
                  <h3>TIN MỚI</h3>
                </div>
                @foreach($tinMoi as $ds)
                <div class="ps-widget__content">
                  <div class="ps-post--sidebar">
                    <div class="ps-post__thumbnail"><a href="web/chitiettintuc/{{$ds->ID}}"></a><img src="upload/tintuc/{{$ds->Anh}}" alt="" width="80px"></div>
                    <div class="ps-post__content"><a class="ps-post__title" href="web/chitiettintuc/{{$ds->ID}}">{{$ds->TieuDe}}</a><span>{{date('d-m-Y', strtotime($ds->NgayCapNhat))}}</span></div>
                  </div>
                  @endforeach
                </div>
              </aside>
              <aside class="ps-widget--sidebar">
                <div class="ps-widget__header">
                  <h3>Sản phẩm mới</h3>
                </div>
                <div class="ps-widget__content">
                    @foreach($spMoi as $ds)
                  <div class="ps-shoe--sidebar">
                    <div class="ps-shoe__thumbnail"><a href="web/chitietsanpham/{{$ds->MaHang}}"></a><img src="upload/sanpham/{{$ds->Anh}}" alt=""></div>
                    <div class="ps-shoe__content"><a class="ps-shoe__title" href="web/chitietsanpham/{{$ds->MaHang}}">{{$ds->TenHang}}</a>
                      <p>
                          @if($ds->GiamGia>0)
                          <del> {{number_format($ds->GiaSP)}} </del>
                          @endif
                          {{number_format(($ds->GiaSP)-(($ds->GiaSP)*($ds->GiamGia)/100))}}
                        </p><a class="ps-btn" href="web/chitietsanpham/{{$ds->MaHang}}">CHI TIET</a>
                    </div>
                  </div>
                  @endforeach
                </div>
              </aside>
              <aside class="ps-widget--sidebar">
                <div class="ps-widget__header">
                  <h3>Tags</h3>
                </div>
                <div class="ps-widget__content">
                  <ul class="ps-tags">
                      @foreach($danhMuc as $ds)
                      <li><a href="web/trangdanhmuc/{{$ds->DanhMuc_Id}}">{{$ds->TenDM}}</a></li>
                      @endforeach
                  </ul>
                </div>
              </aside>
            </div>
      </div>
    </div>
  </div>
</div>
@endsection