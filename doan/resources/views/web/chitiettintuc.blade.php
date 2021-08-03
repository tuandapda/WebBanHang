@extends('web.layouts.index')
@section('title','Chi Tiết Tin Tức')  
@section('page')
<div class="ps-blog-grid pt-80 pb-80">
    <div class="ps-container">
      <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
              <div class="ps-post--detail">
                <div class="ps-post__thumbnail"><img src="upload/tintuc/{{$tinTuc->Anh}}" alt=""></div>
                <div class="ps-post__header">
                  <h3 class="ps-post__title">{{$tinTuc->TieuDe}}</h3>
                  <p class="ps-post__meta">Tác giả : <a href="blog-grid.html">Admin</a> Date : {{date('d-m-Y', strtotime($tinTuc->NgayCapNhat))}} <a href="blog-grid.html">{{$tinTuc->loaitin->Ten}}</a> </p>
                </div>
                <div class="ps-post__content">
                  <p>{{ $tinTuc->NoiDung}}</p>
                  <blockquote>
                    <p>It seems from the moment you begin to take your love of astronomy seriously, the thing that is on your mind is what kind of telescope will you get. And there is no question, investing in a good telescope can really enhance your enjoyment of your new passion in astronomy.</p>
                    <p class="author">Rodney <br> <span>Cannon</span></p>
                  </blockquote>
                  <p>In the history of modern astronomy, there is probably no one greater leap forward than the building and launch of the space   telescope known as the Hubble. While NASA has had many ups and downs, the launch and continued operation of the Hubble space telescope probably ranks next to the moon landings ace exploration accomplishments of the last hundred years.</p>
                </div>
                <div class="ps-post__footer">
                  <p class="ps-post__tags"><i class="fa fa-tags"></i><a href="blog-list.html">Man shoe</a>,<a href="blog-list.html"> Woman</a>,<a href="blog-list.html"> Nike</a></p>
                  <div class="ps-post__actions"><span><i class="fa fa-comments"></i> 23 Comments</span><span><i class="fa fa-heart"></i>  likes</span>
                    <div class="ps-post__social"><i class="fa fa-share-alt"></i><a href="#">Share</a>
                      <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="ps-author">
                <div class="ps-author__thumbnail"><img src="images/user/1.jpg" alt=""></div>
                <div class="ps-author__content">
                  <header>
                    <h4>MARK GREY</h4>
                    <p>WEB DESIGNER</p>
                  </header>
                  <p>The development of the mass spectrometer allowed the mass of atoms to be measured with increased accuracy. The device uses the launch and continued operation of the Hubble space telescope probably.</p>
                </div>
              </div>
              <div class="ps-comments">
                <h3>Comment(4)</h3>
                <div class="ps-comment">
                  <div class="ps-comment__thumbnail"><img src="images/user/2.jpg" alt=""></div>
                  <div class="ps-comment__content">
                    <header>
                      <h4>MARK GREY <span>(15 minutes ago)</span></h4><a href="#">Reply<i class="ps-icon-arrow-left"></i></a>
                    </header>
                    <p>The development of the mass spectrometer allowed the mass of atoms to be measured with increased accuracy. The device uses the launch and continued operation of the Hubble space telescope probably.</p>
                  </div>
                </div>
                <div class="ps-comment ps-comment--reply">
                  <div class="ps-comment__thumbnail"><img src="images/user/3.jpg" alt=""></div>
                  <div class="ps-comment__content">
                    <header>
                      <h4>MARK GREY <span>(3 hours ago)</span></h4><a href="#">Reply<i class="ps-icon-arrow-left"></i></a>
                    </header>
                    <p>The development of the mass spectrometer allowed the mass of atoms to be measured with increased accuracy. The device uses  continue ace explore.</p>
                  </div>
                </div>
                <div class="ps-comment">
                  <div class="ps-comment__thumbnail"><img src="images/user/4.jpg" alt=""></div>
                  <div class="ps-comment__content">
                    <header>
                      <h4>MARK GREY <span>(1 day ago)</span></h4><a href="#">Reply<i class="ps-icon-arrow-left"></i></a>
                    </header>
                    <p>The development of the mass spectrometer allowed the mass of atoms to be measured with increased accuracy. The device uses the launch and continued operation of the Hubble space telescope probably.</p>
                  </div>
                </div>
              </div>
              <form class="ps-form--comment" action="do_action" method="post">
                <h3>Bình Luận</h3>
                <div class="row">
                      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                        <div class="form-group">
                          <textarea class="form-control" rows="6" placeholder="Viết bình luận"></textarea>
                        </div>
                      </div>
                </div>
                <div class="form-group">
                  <button class="ps-btn ps-btn--sm ps-contact__submit">Gửi<i class="ps-icon-next"></i></button>
                </div>
              </form>
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
@endsection