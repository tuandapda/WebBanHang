@extends('web.layouts.index')
@section('title','Login')  
@section('page')
<div class="ps-checkout pt-80 pb-80">
    <div class="ps-container">
        <div class="row">
            <form class="ps-checkout__form" action="web/logincheckout/checkout" method="post">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                <div class="ps-checkout__billing">
                  <h3>Đăng Ký</h3>
                        <div class="form-group form-group--inline">
                          <label>Họ Tên<span>*</span>
                          </label>
                          <input class="form-control" type="text" name="HoTen">
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          @if ($errors->has('HoTen'))
                              <p style="color: red"><small>{{$errors->first('HoTen')}}</small></p>
                          @endif
                        </div>
                        <div class="form-group form-group--inline">
                          <label>Điện Thoại<span>*</span>
                          </label>
                          <input class="form-control" type="text" name="Dienthoai">
                          @if ($errors->has('Dienthoai'))
                              <p style="color: red"><small>{{$errors->first('Dienthoai')}}</small></p>
                          @endif
                        </div>
                        <div class="form-group form-group--inline">
                          <label>Email<span>*</span>
                          </label>
                          <input class="form-control" type="email" name="Email">
                          @if ($errors->has('Email'))
                              <p style="color: red"><small>{{$errors->first('Email')}}</small></p>
                          @endif
                        </div>
                        <div class="form-group form-group--inline textarea">
                            <label>Địa Chỉ</label>
                            <textarea class="form-control" rows="5"  name="DiaChi"placeholder="Vui lòng nhập chính xác địa chỉ.."></textarea>
                            @if ($errors->has('DiaChi'))
                              <p style="color: red"><small>{{$errors->first('DiaChi')}}</small></p>
                          @endif
                          </div>
                        <div class="form-group form-group--inline">
                          <label>Tài Khoản<span>*</span>
                          </label>
                          <input class="form-control" type="text" name="TaiKhoan">
                          @if ($errors->has('TaiKhoan'))
                              <p style="color: red"><small>{{$errors->first('TaiKhoan')}}</small></p>
                          @endif
                        </div>
                        <div class="form-group form-group--inline">
                          <label>Mật Khẩu<span>*</span>
                          </label>
                          <input class="form-control" type="password" name="password">
                          @if ($errors->has('password'))
                              <p style="color: red"><small>{{$errors->first('password')}}</small></p>
                          @endif
                        </div>
                        <div class="form-group form-group--inline">
                          <label>Nhập Lại Mật Khẩu<span>*</span>
                          </label>
                          <input class="form-control" type="password" name="password_confirmation">
                        </div>
                        <div style="text-align: right">
                            <button class="ps-btn " type="submit">Đăng Ký<i class="ps-icon-next"></i></button>
                        </div>
                </div>
              </div>
            </form>
            <form class="ps-checkout__form" action="web/logincheckout/login" method="post">
              <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                <div class="ps-checkout__billing">
                    <h3>Đăng Nhập</h3>
                          <div class="form-group form-group--inline">
                            <label>Tài Khoản<span>*</span>
                            </label>
                            <input class="form-control" type="text" name="TaiKhoan">
                            <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          </div>
                          <div class="form-group form-group--inline">
                            <label>Mật Khẩu<span>*</span>
                            </label>
                            <input class="form-control" type="password" name="password">
                          </div>
                          <div style="text-align: right">
                          <button class="ps-btn " type="submit">Đăng Nhập<i class="ps-icon-next"></i></button>
                          </div>
              </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection