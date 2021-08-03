@extends('web.layouts.index')
@section('title','Chi Tiết')  
@section('page')
<div class="test">
    <div class="container">
      <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
            </div>
      </div>
    </div>
  </div>
  <div class="ps-product--detail pt-60">
    <div class="ps-container">
      <div class="row">
        <div class="col-lg-10 col-md-12 col-lg-offset-1">
          <div class="ps-product__thumbnail">
            <div class="ps-product__preview">
              <div class="ps-product__variants">
                <div class="item"><img src="upload/sanpham/{{$sp->Anh}}" alt=""></div>
                <div class="item"><img src="images/shoe-detail/2.jpg" alt=""></div>
                <div class="item"><img src="images/shoe-detail/3.jpg" alt=""></div>
              </div><a class="popup-youtube ps-product__video" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><img src="upload/sanpham/{{$sp->Anh}}" alt=""><i class="fa fa-play"></i></a>
            </div>
            <div class="ps-product__image">
              <div class="item"><img class="zoom" src="upload/sanpham/{{$sp->Anh}}" alt="" data-zoom-image="upload/sanpham/{{$sp->Anh}}"></div>
              <div class="item"><img class="zoom" src="images/shoe-detail/2.jpg" alt="" data-zoom-image="images/shoe-detail/2.jpg"></div>
              <div class="item"><img class="zoom" src="images/shoe-detail/3.jpg" alt="" data-zoom-image="images/shoe-detail/3.jpg"></div>
            </div>
          </div>
          <div class="ps-product__thumbnail--mobile">
            <div class="ps-product__main-img"><img src="upload/sanpham/{{$sp->Anh}}" alt=""></div>
            <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on"><img src="upload/sanpham/{{$sp->Anh}}" alt=""><img src="images/shoe-detail/2.jpg" alt=""><img src="images/shoe-detail/3.jpg" alt=""></div>
          </div>
          <div class="ps-product__info">
            <div class="ps-product__rating">
              <?php
              $tong=0;$i=0;
              foreach ($sp->DanhGia as $ds) {
                $so=$ds->Diem;
                $i++;
                $tong =$tong+$so;
              }
                if($i>0){
                $tb=round($tong/$i);
                }else {
                  $tb=0;
                }
              ?>
              <select class="ps-rating">
                <?php
                if($tb>0){
                for($i=1;$i<6;$i++)
                {
                  if($i<=$tb){
                ?>
                    <option value="1">1</option>
                <?php  }else {?>
                    <option value="2">5</option>
                <?php    
                  };
                }
              }
                ?>
              </select><a href="#">(Lượt đánh giá : {{$sp->DanhGia->count()}})</a>
            </div>
            <h1>{{$sp->TenHang}}</h1>
            
            <h3 class="ps-product__price">{{number_format(($sp->GiaSP)-(($sp->GiaSP)*($sp->GiamGia)/100))}}.VNĐ<del>({{number_format($sp->GiaSP)}}.VNĐ)</del></h3>
            <div class="ps-product__block ps-product__quickview">
              <h4>THÔNG SỐ KĨ THUẬT</h4>
                  <ul>
                    <li><p>MODEL :</p></li>
                    <li><p>NGUỒN :</p></li>
                    <li><p>BẢO HÀNH :</p></li>
                  </ul>
            </div>
            <div class="ps-product__block ps-product__quickview">
              <h4> DANH MỤC & NHÀ CUNG CẤP<h4>
                <p>{{$sp->danhmuc->TenDM}}</p>
                <p>{{$sp->nhacungcap->TenNhaCC}}</p>
            </div>
            {{-- <div class="ps-product__block ps-product__style">
              <h4>MÀU SẮC</h4>
              <ul>
                <li><a href="product-detail.html"><img src="images/shoe/sidebar/1.jpg" alt=""></a></li>
                <li><a href="product-detail.html"><img src="images/shoe/sidebar/2.jpg" alt=""></a></li>
                <li><a href="product-detail.html"><img src="images/shoe/sidebar/3.jpg" alt=""></a></li>
                <li><a href="product-detail.html"><img src="images/shoe/sidebar/2.jpg" alt=""></a></li>
              </ul>
            </div> --}}
            {{-- <div class="ps-product__block ps-product__size">
              <select class="ps-select selectpicker">
                <option value="1">Select Size</option>
                <option value="2">4</option>
                
              </select>
            </div> --}}
            <div class="ps-product__shopping"><a class="ps-btn mb-10" href="web/cart/add/{{$sp->MaHang}}">MUA NGAY<i class="ps-icon-next"></i></a>
              <div class="ps-product__actions"><a class="mr-10" href="whishlist.html"><i class="ps-icon-heart"></i></a><a href="compare.html"><i class="ps-icon-share"></i></a></div>
            </div>
          </div>
          <div class="clearfix"></div>
          <div class="ps-product__content mt-50">
            <ul class="tab-list" role="tablist">
              <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">MÔ TẢ</a></li>
              <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">BÌNH LUẬN</a></li>
              <li><a href="#tab_03" aria-controls="tab_03" role="tab" data-toggle="tab">CHIA SẺ</a></li>
              <li><a href="#tab_04" aria-controls="tab_04" role="tab" data-toggle="tab">GÓP Ý</a></li>
            </ul>
          </div>
          <div class="tab-content mb-60">
            <div class="tab-pane active" role="tabpanel" id="tab_01">
              <p>{!!$sp->MoTa!!}</p>
             
            </div>
            <div class="tab-pane" role="tabpanel" id="tab_02">
              <?php $id_khachhang=Session::get('id_khachhang');
              if ($id_khachhang = NULL){?>
              <p class="mb-20"><strong>Đăng nhập để bình luận ! </strong></p>  
              <?php }; ?>
              @foreach($sp->DanhGia as $ds)
              <div class="ps-review">
                <div class="ps-review__thumbnail"><img src="images/user/1.jpg" alt=""></div>
                <div class="ps-review__content">
                  <header>
                   
                    <select class="ps-rating">
                      <?php
                      $diem =$ds->Diem;
                      for($i=1;$i<6;$i++)
                      {
                        if($i<=$diem){
                      ?>
                          <option value="1">1</option>
                      <?php  }else {?>
                          <option value="2">5</option>
                      <?php    
                        };
                      }
                      ?>
                    </select>
                    <p>By <a href="">{{$ds->khachhang->HoTen}}</a> - Date : {{date('d-m-Y', strtotime($ds->NgayCapNhat))}}</p>
                  </header>
                  <p>{{ $ds->NoiDung}}</p>
                </div>
              </div>
              @endforeach
              <!--- bình luận--->
              @php
                  $id_khachhang=Session::get('id_khachhang'); 
              @endphp
              @if($id_khachhang != NULL )
              <form class="ps-product__review" action="binhluan/{{$sp->MaHang}}" method="POST">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <h4>Bình Luận - Đánh Giá </h4>
                <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                        <div class="form-group">
                          <label><i>Đánh Giá :</i><span></span></label>
                          <select class="ps-rating" name="Diem">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ">
                        <div class="form-group">
                          <label>Bình Luận:</label>
                          <textarea class="form-control" rows="6" name="NoiDung"></textarea>
                        </div>
                        <div class="form-group">
                          <button class="ps-btn ps-btn--sm" type="submit">Gửi<i class="ps-icon-next"></i></button>
                        </div>
                      </div>
                </div>
              </form>
              @endif
            </div>
            <div class="tab-pane" role="tabpanel" id="tab_03">
              <p>Add your tag <span> *</span></p>
              <form class="ps-product__tags" action="_action" method="post">
                <div class="form-group">
                  <input class="form-control" type="text" placeholder="">
                  <button class="ps-btn ps-btn--sm">Add Tags</button>
                </div>
              </form>
            </div>
            <div class="tab-pane" role="tabpanel" id="tab_04">
              <div class="form-group">
                <textarea class="form-control" rows="6" placeholder="Enter your addition here..."></textarea>
              </div>
              <div class="form-group">
                <button class="ps-btn" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
    <div class="ps-container">
      <div class="ps-section__header mb-50">
        <div class="row">
              <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                <h3 class="ps-section__title" data-mask="Related item"><i class="icon fa fa-cube"></i>SẢN PHẨM LIÊN QUAN</h3>
              </div>
              <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a></div>
              </div>
        </div>
      </div>
      <div class="ps-section__content">
        <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
            @foreach($splq->SanPham as $ds)
            @if($ds->MaHang != $sp->MaHang)
            <div class="ps-shoes--carousel">
              <div class="ps-shoe">
                @if($ds->GiamGia>0)
                <div class="ps-shoe__thumbnail">
                  <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-{{$ds->GiamGia}}%</span></div><a class="ps-shoe__favorite" href="web/chitietsanpham/{{$ds->MaHang}}"><i class="ps-icon-heart"></i></a><img src="upload/sanpham/{{$ds->Anh}}"alt=""><a class="ps-shoe__overlay" href="web/chitietsanpham/{{$ds->MaHang}}"></a>
                </div>
                @endif
                <div class="ps-shoe__content">
                  <div class="ps-shoe__variants">
                    <div class="ps-shoe__variant normal"><img src="upload/sanpham/{{$ds->Anh}}" alt=""><img src="upload/sanpham/{{$ds->Anh}}"alt=""><img src="upload/sanpham/{{$ds->Anh}}" alt=""><img src="upload/sanpham/{{$ds->Anh}} "alt=""></div>
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
            @endif
            @endforeach
        </div>
      </div>
    </div>
</div>
@endsection