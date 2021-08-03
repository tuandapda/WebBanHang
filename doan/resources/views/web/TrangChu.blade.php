@extends('web.layouts.index')
@section('title','Trang Chủ')  
@section('page')

<div class="ps-container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <?php $i=0;?>
    <ol class="carousel-indicators">
      @foreach($slide as $sl)
      <li data-target="#myCarousel" data-slide-to="{{$i}}"
      @if($i==0) 
      class="active"
      @endif
      ></li>
      <?php $i++;?>
      @endforeach
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <?php $i=0;?>
      @foreach ($slide as $ds)
      <div
      @if($i==0) 
      class="item active"
      @else 
      class="item"
      @endif
      >
      <?php $i++;?>
        <img src="upload/slide/{{$ds->Anh}}" alt="Anh" width="460" height="345">
        <div class="carousel-caption">
          <h3></h3>
          <p></p>
        </div>
      </div> 
      @endforeach
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<div class="ps-section--features-product ps-section masonry-root pt-100 pb-100">
<div class="ps-container">
  <div class="ps-section__header mb-50">
    <h3 class="ps-section__title" data-mask="features"><i class="icon fa fa-cube"></i> SẢN PHẨM MỚI</h3>
    <ul class="ps-masonry__filter">
      <li class="current"><a href="#" data-filter="*">All <sup>{{$spMoi->count()}}</sup></a></li>
      <li><a href="#" data-filter=".tivi">LG <sup>1</sup></a></li>
      <li><a href="#" data-filter=".kids">SAMSUNG <sup>4</sup></a></li>
    </ul>
  </div>
  <div class="ps-section__content pb-50">
    <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
      <div class="ps-masonry">
        <div class="grid-sizer"></div>
        @foreach ($spMoi as $ds)
        <div class="grid-item kids">
          <div class="grid-item__content-wrapper">
            <div class="ps-shoe mb-30">
              <div class="ps-shoe__thumbnail">
                <div class="ps-badge"><span>New</span></div>
                @if($ds->GiamGia>0)
                <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-{{$ds->GiamGia}}%</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a>
                @endif
                <img src="../upload/sanpham/{{$ds->Anh}}" style="" alt="">
                <a class="ps-shoe__overlay" href="web/chitietsanpham/{{$ds->MaHang}}"></a>
              </div>
              <div class="ps-shoe__content">
                <div class="ps-shoe__variants">
                  <div class="ps-shoe__variant normal"><img src="../upload/sanpham/{{$ds->Anh}}" style="width:800px;heigth:800px" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                  <select class="ps-rating ps-shoe__rating">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="2">5</option>
                  </select>
                </div>
                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="web/chitietsanpham/{{$ds->MaHang}}">{{$ds->TenHang}}</a>
                  <p class="ps-shoe__categories"></p><span class="ps-shoe__price">
                    @if($ds->GiamGia>0)
                    <del>{{number_format($ds->GiaSP)}} VNĐ<br></del>
                    @endif{{number_format(($ds->GiaSP)-(($ds->GiaSP)*($ds->GiamGia)/100))}} VNĐ</span>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</div>
</div>
<!------>
<div class="ps-section--offer">
<div class="ps-column"><a class="ps-offer" href="product-listing.html"><img src="images/banner/anh1.jpg" alt=""></a></div>
<div class="ps-column"><a class="ps-offer" href="product-listing.html"><img src="images/banner/anh2.jpg" alt=""></a></div>
</div>
<!------>
<div class="ps-section ps-section--top-sales ps-owl-root ">
<div class="ps-container">
  <div class="ps-section__header mb-50">
    <div class="row">
          <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
            <h3 class="ps-section__title" data-mask="BEST SALE"><i class="icon fa fa-cube"></i> Top Sales</h3>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
            <div class="ps-owl-actions">
              <a class="" href="web/tatca">ALL &nbsp;</a>
              <a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a>
            </div>
          </div>
    </div>
  </div>
  <div class="ps-section__content">
    <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
        @foreach ($spGiamGia as $ds)
      <div class="ps-shoes--carousel">
        <div class="ps-shoe">
          @if($ds->GiamGia>0)
          <div class="ps-shoe__thumbnail">
            <div class="ps-badge"><span>SALES</span></div>
            <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-{{$ds->GiamGia}}%</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="../upload/sanpham/{{$ds->Anh}}" alt=""><a class="ps-shoe__overlay" href="web/chitietsanpham/{{$ds->MaHang}}"></a>
          </div>
          @endif
          <div class="ps-shoe__content">
            <div class="ps-shoe__variants">
              <div class="ps-shoe__variant normal"><img src="../upload/sanpham/{{$ds->Anh}}" alt=""><img src="../upload/sanpham/{{$ds->Anh}}" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
              <select class="ps-rating ps-shoe__rating">
                <option value="1">1</option>
                <option value="1">2</option>
                <option value="1">3</option>
                <option value="1">4</option>
                <option value="2">5</option>
              </select>
            </div>
            <div class="ps-shoe__detail"><a class="ps-shoe__name" href="web/chitietsanpham/{{$ds->MaHang}}">{{$ds->TenHang}}</a>
              <p class="ps-shoe__categories"></p><span class="ps-shoe__price">
                <del>{{number_format($ds->GiaSP)}}VNĐ</del> <br>{{number_format(($ds->GiaSP)-(($ds->GiaSP)*($ds->GiamGia)/100))}}.VNĐ</span>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</div>
</div>
<!----------->
<div class="ps-section ps-section--top-sales ps-owl-root">
  <div class="ps-container">
    <div class="ps-section__header mb-50">
      <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
              <h3 class="ps-section__title" data-mask="BEST SALE"><i class="icon fa fa-cube"></i> DESKTOP</h3>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
              <div class="ps-owl-actions">
                <a class="" href="web/tatca">ALL &nbsp;</a>
                <a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a>
              </div>
            </div>
      </div>
    </div>
    <div class="ps-section__content">
      <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
          @foreach ($destop as $ds)
        <div class="ps-shoes--carousel">
          <div class="ps-shoe">
            @if($ds->GiamGia>0)
            <div class="ps-shoe__thumbnail">
              <div class="ps-badge"><span>SALES</span></div>
              <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-{{$ds->GiamGia}}%</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="../upload/sanpham/{{$ds->Anh}}" alt=""><a class="ps-shoe__overlay" href="web/chitietsanpham/{{$ds->MaHang}}"></a>
            </div>
            @endif
            <div class="ps-shoe__content">
              <div class="ps-shoe__variants">
                <div class="ps-shoe__variant normal"><img src="../upload/sanpham/{{$ds->Anh}}" alt=""><img src="../upload/sanpham/{{$ds->Anh}}" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                <select class="ps-rating ps-shoe__rating">
                  <option value="1">1</option>
                  <option value="1">2</option>
                  <option value="1">3</option>
                  <option value="1">4</option>
                  <option value="2">5</option>
                </select>
              </div>
              <div class="ps-shoe__detail"><a class="ps-shoe__name" href="web/chitietsanpham/{{$ds->MaHang}}">{{$ds->TenHang}}</a>
                <p class="ps-shoe__categories"></p><span class="ps-shoe__price">
                  <del>{{number_format($ds->GiaSP)}}VNĐ</del> <br>{{number_format(($ds->GiaSP)-(($ds->GiaSP)*($ds->GiamGia)/100))}}.VNĐ</span>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  </div>
<!----------->
<!------>
<div class="ps-section ps-home-blog pb-80">
<div class="ps-container">
  <div class="ps-section__header mb-50">
    <h2 class="ps-section__title" data-mask="News"><i class="icon fa fa-cube"></i> TIN Tức</h2>
    <div class="ps-section__action"><a class="ps-morelink text-uppercase" href="web/tintuc">ALL<i class="fa fa-long-arrow-right"></i></a></div>
  </div>
  <div class="ps-section__content">
    <div class="row">
          @foreach($tinTuc as $ds)
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
            <div class="ps-post">
              <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="web/chitiettintuc/{{$ds->ID}}"></a><img src="upload/tintuc/{{$ds->Anh}}" alt=""></div>
              <div class="ps-post__content"><a class="ps-post__title" href="#">{{$ds->TieuDe}}</a>
                <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.html">Admin</a></span> -<span class="ml-5">{{date('d-m-Y', strtotime($ds->NgayCapNhat))}}</span></p>
                <p>{{substr( $ds->NoiDung,  0, 80 )}}...</p><a class="ps-morelink" href="web/chitiettintuc/{{$ds->ID}}">Read more<i class="fa fa-long-arrow-right"></i></a>
              </div>
            </div>
          </div>
          @endforeach
    </div>
  </div>
</div>
</div>
<!------>
@endsection
