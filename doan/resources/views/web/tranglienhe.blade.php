@extends('web.layouts.index')
@section('title','Lien He')  
@section('page')
<div class="ps-contact ps-section pb-80">
  <br>
    <div id="contact-map" data-address="New York, NY" data-title="Sky Store!" data-zoom="17">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.890743482751!2d105.80015961424539!3d21.03705719287239!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3f0966fc43%3A0x1f147162045f4715!2zOTIgTmd1eeG7hW4gS2jDoW5oIFRvw6BuLCBRdWFuIEhvYSwgQ-G6p3UgR2nhuqV5LCBIw6AgTuG7mWksIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1626681182821!5m2!1svi!2s"
         width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy">
        </iframe>
    </div>
    <div class="ps-container">
      <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
              <div class="ps-section__header mb-50">
                <h2 class="ps-section__title" data-mask="Contact"><i class="icon fa fa-cube"></i> Liên Hệ</h2>
                @if(session('thongbao'))
                <div class="alert alert-success">
                    {{session('thongbao')}}
                </div>
                @endif
                <form class="ps-contact__form" action="/send_mail" method="post">
                  @csrf
                  <div class="row">   
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                          <div class="form-group">
                            <label>Tên <sub>*</sub></label>
                            <input class="form-control" type="text" placeholder="" name="Ten">
                          </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                          <div class="form-group">
                            <label>Email <sub>*</sub></label>
                            <input class="form-control" type="email" placeholder="" name="Email">
                          </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
                          <div class="form-group mb-25">
                            <label>Nội Dung <sub>*</sub></label>
                            <textarea class="form-control" rows="6" name="NoiDung"></textarea>
                          </div>
                          <div class="form-group">
                            <button class="ps-btn" type="submit">Send<i class="ps-icon-next"></i></button>
                          </div>
                        </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
              <div class="ps-section__content">
                <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                        <div class="ps-contact__block" data-mh="contact-block" style="height: 237px;">
                          <header>
                            <h3>Cơ Sở 1 <span> Hà Nội</span></h3>
                          </header>
                          <footer>
                            <p><i class="fa fa-map-marker"></i> 92 Nguyễn Khách Toàn ,Cầu Giấy , Hà Nội.</p>
                            <p><i class="fa fa-envelope-o"></i><a href="mailto@supportShoes@shoes.net">supportShoes@shoes.net</a></p>
                            <p><i class="fa fa-phone"></i> ( +84 ) 9892 2324  -  9401 123 003</p>
                          </footer>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                        <div class="ps-contact__block" data-mh="contact-block" style="height: 237px;">
                          <header>
                            <h3>Cơ Sở 2 <span> Hồ Chí Minh</span></h3>
                          </header>
                          <footer>
                            <p><i class="fa fa-map-marker"></i> 19C Trolley Square  Wilmington, DE 19806</p>
                            <p><i class="fa fa-envelope-o"></i><a href="mailto@supportShoes@shoes.net">supportShoes@shoes.net</a></p>
                            <p><i class="fa fa-phone"></i> ( +84 ) 9892 2324  -  9401 123 003</p>
                          </footer>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                        <div class="ps-contact__block" data-mh="contact-block" style="height: 263px;">
                          <header>
                            <h3>Cơ Sở 3 <span> Hải Phòng</span></h3>
                          </header>
                          <footer>
                            <p><i class="fa fa-map-marker"></i> 19C Trolley Square  Wilmington, DE 19806</p>
                            <p><i class="fa fa-envelope-o"></i><a href="mailto@supportShoes@shoes.net">supportShoes@shoes.net</a></p>
                            <p><i class="fa fa-phone"></i> ( +84 ) 9892 2324  -  9401 123 003</p>
                          </footer>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                        <div class="ps-contact__block" data-mh="contact-block" style="height: 263px;">
                          <header>
                            <h3>Cơ Sở 4 <span> Nam Định</span></h3>
                          </header>
                          <footer>
                            <p><i class="fa fa-map-marker"></i> 19C Trolley Square  Wilmington, DE 19806</p>
                            <p><i class="fa fa-envelope-o"></i><a href="mailto@supportShoes@shoes.net">supportShoes@shoes.net</a></p>
                            <p><i class="fa fa-phone"></i> ( +84 ) 9892 2324  -  9401 123 003</p>
                          </footer>
                        </div>
                      </div>
                </div>
              </div>
            </div>
      </div>
    </div>
  </div>
@endsection