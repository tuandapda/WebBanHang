@extends('web.layouts.index')
@section('title','Thanh Toán')  
@section('page')
<div class="ps-checkout pt-80 pb-80">
    <div class="ps-container">
        <div class="row">
            <form class="ps-checkout__form" action="web/logincheckout/dathang" method="post">
              <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                <div class="ps-checkout__billing">
                  @if(session('thongbao'))
                  <div class="alert alert-success">
                      {{session('thongbao')}}
                  </div>
                  @endif
                  <h3>Xác Nhận Thông Tin </h3>
                        <div class="form-group form-group--inline">
                          <label>Họ Tên<span>*</span>
                          </label>
                          <input class="form-control" type="text" name="HoTen" value="{{$ojbKH->HoTen}}">
                          <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                          @if ($errors->has('HoTen'))
                              <p style="color: red"><small>{{$errors->first('HoTen')}}</small></p>
                          @endif
                        </div>
                        <div class="form-group form-group--inline">
                          <label>Điện Thoại<span>*</span>
                          </label>
                          <input class="form-control" type="text" name="Dienthoai" value="{{$ojbKH->Dienthoai}}">
                          @if ($errors->has('Dienthoai'))
                              <p style="color: red"><small>{{$errors->first('Dienthoai')}}</small></p>
                          @endif
                        </div>
                        <div class="form-group form-group--inline">
                          <label>Email<span>*</span>
                          </label>
                          <input class="form-control" type="email" name="Email" value="{{$ojbKH->Email}}">
                          @if ($errors->has('Email'))
                              <p style="color: red"><small>{{$errors->first('Email')}}</small></p>
                          @endif
                        </div>
                        <div class="form-group form-group--inline textarea">
                            <label>Địa Chỉ</label>
                            <textarea class="form-control" rows="5"  name="DiaChi"placeholder="Vui lòng nhập chính xác địa chỉ..">{{$ojbKH->DiaChi}}</textarea>
                            @if ($errors->has('DiaChi'))
                              <p style="color: red"><small>{{$errors->first('DiaChi')}}</small></p>
                          @endif
                          </div>
                        <div class="form-group form-group--inline">
                          <label>Tài Khoản<span>*</span>
                          </label>
                          <input class="form-control" type="text" name="TaiKhoan" value="{{$ojbKH->TaiKhoan}}" readonly>
                          @if ($errors->has('TaiKhoan'))
                              <p style="color: red"><small>{{$errors->first('TaiKhoan')}}</small></p>
                          @endif
                        </div>
                        <h3 class="mt-40"></h3>
                        <div class="form-group form-group--inline textarea">
                          <label>Ghi chú</label>
                          <textarea class="form-control" rows="5" placeholder="Nhập........."name="GhiChu"></textarea>
                        </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                <div class="ps-checkout__order">
                  <header>
                    <h3>Đơn Hàng</h3>
                  </header>
                  <div class="content">
                    <table class="table ps-checkout__products">
                      @if(Cart::getContent()->count()>=1)
                      <thead>
                        <tr>
                          <th class="text-uppercase">Sản phẩm</th>
                          <th class="text-uppercase">Tiền</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($sp as $ds)
                        <tr>
                         
                          <td>{{$ds->name}}&nbsp;&nbsp;&nbsp;&nbsp;X &nbsp; {{$ds->quantity}} </td>
                          <td>{{number_format(($ds->quantity)*($ds->price))}}</td>
                        </tr>
                        @endforeach
                        <tr>
                          <td>VTA(+10%)</td>
                          <td>{{number_format($vat=$tong*10/100)}}</td>
                        </tr>
                        <tr>
                          <td>Giảm Giá</td>
                          <td>
                              @php
                              $tong_giam=0;
                              @endphp 
                              @if(Session::get('code'))
                              
                                @foreach(Session::get('code') as $key=>$cou)
                                  
                                  @if($cou['HinhThuc']==1)
                                  
                                  
                                      @php
                                          $tong_giam =($tong*$cou['GiaTri'])/100;
                                      @endphp
                                      - {{number_format($tong_giam)}}
                                  
                                  @elseif($cou['HinhThuc']==2)
                                    <h3>Mã Giảm :<span>-{{number_format($cou['GiaTri'])}}</span></h3>
                                      @php
                                          $tong_giam =$cou['GiaTri'];
                                      @endphp
                                  @endif
                                @endforeach
                              @endif
                          </td>
                        </tr>
                        <tr>
                          <td>Tổng : </td>
                          <td>{{number_format($tong+$vat-$tong_giam)}}.VNĐ</td>
                        </tr>
                      </tbody>
                      @else
                        <h3 style="color: red"> Trống !</h3>
                      @endif
                    </table>
                  </div>
                  <footer>
                    <h3>Hình thức thanh toán</h3>
                    <div class="form-group cheque">
                      <div class="ps-radio">
                        <input class="form-control" type="radio" id="rdo01" name="HTTT" checked value="1">
                        <label for="rdo01">Thanh toán bằng tiền mặt</label>
                        <p></p>
                      </div>
                    </div>
                    <div class="form-group paypal">
                      <div class="ps-radio ps-radio--inline">
                        <input class="form-control" type="radio" name="HTTT" id="rdo02" value="2">
                        <label for="rdo02">Paypal</label>
                      </div>
                      <ul class="ps-payment-method">
                        <li><a href="#"><img src="images/payment/1.png" alt=""></a></li>
                        <li><a href="#"><img src="images/payment/2.png" alt=""></a></li>
                        <li><a href="#"><img src="images/payment/3.png" alt=""></a></li>
                      </ul>
                      <button class="ps-btn ps-btn--fullwidth" type="submit">Đặt Hàng<i class="ps-icon-next"></i></button>
                    </div>
                  </footer>
                </div>
                
              </div>
            </form>
        </div>
        </div>
    </div>
  </div>
</div>
@endsection