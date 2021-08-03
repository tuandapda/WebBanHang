@extends('web.layouts.index')
@section('title','Danh Mục')  
@section('page')
<div class="ps-products-wrap pt-80 pb-80">
  <div class="ps-products" data-mh="product-listing">
    <div class="ps-product-action">
      <div class="ps-product__filter">
        <form method="POST">
            @csrf
      <select class="ps-select selectpicker" name="sort" id="sort">
        @php
        if(isset($_GET['sort_by'])){
        $sort_by =$_GET['sort_by'];
         }
         else {
          $sort_by=null;
         }
        @endphp
        @if($sort_by=='tang_dan')
        <option value="{{Request::url()}}?sort_by=null">Sắp xếp</option>
        <option selected="selected" value="{{Request::url()}}?sort_by=tang_dan">Giá (Thấp -> Cao)</option>
        <option value="{{Request::url()}}?sort_by=giam_dan">Giá (Cao -> Thấp)</option>
        @elseif($sort_by=='giam_dan')
        <option value="{{Request::url()}}?sort_by=null">Sắp xếp</option>
        <option  value="{{Request::url()}}?sort_by=tang_dan">Giá (Thấp -> Cao)</option>
        <option selected="selected" value="{{Request::url()}}?sort_by=giam_dan">Giá (Cao -> Thấp)</option>
        @else
        <option selected="selected" value="{{Request::url()}}?sort_by=null">Sắp xếp</option>
        <option  value="{{Request::url()}}?sort_by=tang_dan">Giá (Thấp -> Cao)</option>
        <option  value="{{Request::url()}}?sort_by=giam_dan">Giá (Cao -> Thấp)</option>
        @endif
      </select>
        </form>
      </div>
    </div>
  
    <div class="ps-product__columns">
      @foreach ($sp as $ds)
      <div class="ps-product__column">
        <div class="ps-shoe mb-30">
          <div class="ps-shoe__thumbnail">
             @if($ds->GiamGia>0)
             <div class="ps-badge"><span>SALES</span></div>
            <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-{{$ds->GiamGia}}%</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a>
            @endif
            <img src="upload/sanpham/{{$ds->Anh}}"style="width: 400px;height:300px;" alt=""><a class="ps-shoe__overlay"href="web/chitietsanpham/{{$ds->MaHang}}"></a>
          </div>
          <div class="ps-shoe__content">
            <div class="ps-shoe__variants">
              <div class="ps-shoe__variant normal"><img  src="upload/sanpham/{{$ds->Anh}}" alt=""><img  src="upload/sanpham/{{$ds->Anh}}" alt=""><img  src="upload/sanpham/{{$ds->Anh}}" alt=""><img src="images/shoe/5.jpg" alt=""></div>
              <select class="ps-rating ps-shoe__rating">
                <option value="1">1</option>
                <option value="1">2</option>
                <option value="1">3</option>
                <option value="1">4</option>
                <option value="2">5</option>
              </select>
            </div>
            <div class="ps-shoe__detail"><a class="ps-shoe__name" href="web/chitietsanpham/{{$ds->MaHang}}">{{$ds->TenHang}}</a>
              <p class="ps-shoe__categories"><a href="#">{{$ds->TenDM}}</a>,<a href="#"> {{$ds->TenNhaCC}}</a></p><span class="ps-shoe__price">
                <del>{{number_format($ds->GiaSP)}}</del><br> {{number_format(($ds->GiaSP)-(($ds->GiaSP)*($ds->GiamGia)/100))}}.Đ</span>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="ps-product-action">
        {{$sp->links()}}
    </div>
  </div>
  <div class="ps-sidebar" data-mh="product-listing">
    <aside class="ps-widget--sidebar ps-widget--category">
      <div class="ps-widget__header">
        <h3>DANH MỤC</h3>
      </div>
      <div class="ps-widget__content">
        <ul class="ps-list--checked">
          @foreach ($danhmuc as $ds)
           <li><a href="web/trangdanhmuc/{{$ds->DanhMuc_Id}}">{{$ds->TenDM}}</a></li>  
         @endforeach 
        </ul>
      </div>
    </aside>
    {{-- <aside class="ps-widget--sidebar ps-widget--filter">
      <div class="ps-widget__header">
        <h3>GIÁ</h3>
      </div>
      <div class="ps-widget__content">
        <div class="ac-slider" data-default-min="300" data-default-max="2000" data-max="3450" data-step="50" data-unit="$"></div>
        <p class="ac-slider__meta">giá:<span class="ac-slider__value ac-slider__min"></span>-<span class="ac-slider__value ac-slider__max"></span></p><a class="ac-slider__filter ps-btn" href="#">Filter</a>
      </div>
    </aside> --}}
    <aside class="ps-widget--sidebar ps-widget--category">
      <div class="ps-widget__header">
        <h3>Hãng SX</h3>
      </div>
      <div class="ps-widget__content">
        <ul class="ps-list--checked">
          @foreach ($nhacc as $ds)
          @if(1==0)
          <li><a class="current" href="web/trangnhacc/{{$ds->NhaCC_Id}}">{{$ds->TenNhaCC}}</a></li>            
          @else
          <li><a  href="web/trangnhacc/{{$ds->NhaCC_Id}}">{{$ds->TenNhaCC}}</a></li>
          @endif  
           @endforeach
        </ul>
      </div>
    </aside>
    <aside class="ps-widget--sidebar ps-widget--category">
      <div class="ps-widget__header">
        <h3>THÔNG SỐ</h3>
      </div>
      <div class="ps-widget__content">
        <ul class="ps-list--checked">
          <li class="current"><a href="product-listing.html">FULL HD</a></li>
          <li><a href="product-listing.html">HD 1080 </a></li>
          <li><a href="product-listing.html">4K</a></li>
          <li><a href="product-listing.html">8K</a></li>
        </ul>
      </div>
    </aside>
    <div class="ps-sticky desktop">
      
      <aside class="ps-widget--sidebar">
        <div class="ps-widget__header">
          <h3>MÀU SẮC </h3>
        </div>
        <div class="ps-widget__content">
          <ul class="ps-list--color">
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
            <li><a href="#"></a></li>
          </ul>
        </div>
      </aside>
    </div>
    <!--aside.ps-widget--sidebar-->
    <!--    .ps-widget__header: h3 Ads Banner-->
    <!--    .ps-widget__content-->
    <!--        a(href='product-listing'): img(src="images/offer/sidebar.jpg" alt="")-->
    <!---->
    <!--aside.ps-widget--sidebar-->
    <!--    .ps-widget__header: h3 Best Seller-->
    <!--    .ps-widget__content-->
    <!--        - for (var i = 0; i < 3; i ++)-->
    <!--            .ps-shoe--sidebar-->
    <!--                .ps-shoe__thumbnail-->
    <!--                    a(href='#')-->
    <!--                    img(src="images/shoe/sidebar/"+(i+1)+".jpg" alt="")-->
    <!--                .ps-shoe__content-->
    <!--                    if i == 1-->
    <!--                        a(href='#').ps-shoe__title Nike Flight Bonafide-->
    <!--                    else if i == 2-->
    <!--                        a(href='#').ps-shoe__title Nike Sock Dart QS-->
    <!--                    else-->
    <!--                        a(href='#').ps-shoe__title Men's Sky-->
    <!--                    p <del> £253.00</del> £152.00-->
    <!--                    a(href='#').ps-btn PURCHASE-->
  </div>
</div>

@endsection