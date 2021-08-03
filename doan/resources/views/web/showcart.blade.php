@extends('web.layouts.index')
@section('title','Giỏ Hàng')  
@section('page')
<script type="text/javascript">
  function updateCart(quantity,id){
    $.get(
      'web/cart/update',
      {quantity:quantity,id:id},
      function(){
        location.reload();
      }
    );
  }
</script>
<div class="ps-content pt-80 pb-80">
    <div class="ps-container">
      <div class="ps-cart-listing">
        @if(Cart::getContent()->count()>=1)
        <table class="table ps-cart__table">
          <thead>
            <tr>
              <th>TÊN HÀNG</th>
              <th>ĐƠN GIÁ</th>
              <th>SỐ LƯỢNG</th>
              <th>TỔNG</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <form  method="POST">
            @foreach($sp as $ds)
            <tr>
              <td><a class="ps-product__preview" href="#"><img class="mr-15"  src="upload/sanpham/{{$ds->attributes->anh}}"style="width:100px;heigth:100px"alt="">{{$ds->name}}</a></td>
              <td>{{number_format($ds->price)}}</td>
              <td>
                <div class="form-group--number">
                  <input class="form-control" type="number" value="{{$ds->quantity}}" onchange="updateCart(this.value,'{{$ds->id}}')"  >
                </div>
              </td>
              <td>{{number_format(($ds->quantity)*($ds->price))}}</td>
              <td>
                <a href="{{asset('web/cart/xoa/'.$ds->id)}}"><div class="ps-remove"></div></a>
              </td>
            </tr>
            @endforeach
            </form>
          </tbody>
        </table>
        @else
        <h3 style="color: red"> Giỏ Hàng Trống !</h3>
        @endif
        <div class="ps-cart__actions">
          <div class="ps-cart__promotion">
            <div class="form-group">
              @if(session('thongbao'))
              <div class="alert alert-success">
                  {{session('thongbao')}}
              </div>
          @endif
              <form method="POST" action="/check-code">
                @csrf
              <div class="ps-form--icon"><i class="fa fa-angle-right"></i>
                <input class="form-control" type="text" placeholder="Promo Code" name="Ma">
              </div>
              <div class="form-group">
                <button class="ps-btn" type="submit"> OK</button>
              </div>
              </form>
            </div>
            <div class="form-group">
              <a  href="web/cart/xoa/all"><button class="ps-btn ps-btn--gray">Xóa Hết</button></a><br><br>
              <a  href="web/trangchu"><button class="ps-btn ps-btn--gray">Mua Tiếp</button></a>
            </div>
          </div>
          <div class="ps-cart__total">
            <h3>Thành Tiền : <span> {{number_format($tong)}} VNĐ</span></h3>
            <h3>VAT(+10%) : <span> {{number_format($vat=$tong*10/100)}} VNĐ</span></h3>
            
              @php
              $tong_giam=0;
              @endphp 
              @if(Session::get('code'))
              
                @foreach(Session::get('code') as $key=>$cou)
                  
                  @if($cou['HinhThuc']==1)
                  <h3> Mã Giảm : <span>{{$cou['GiaTri']}} %</span></h3>
                  <p>
                      @php
                          $tong_giam =($tong*$cou['GiaTri'])/100;
                      @endphp
                      <h3> Tổng Giảm :<span>- {{number_format($tong_giam)}}VNĐ</span></h3>
                  </p>
                  @elseif($cou['HinhThuc']==2)
                    <h3>Mã Giảm :<span>-{{number_format($cou['GiaTri'])}} VNĐ</span></h3>
                      @php
                          $tong_giam =$cou['GiaTri'];
                      @endphp
                  @endif
                @endforeach
              @endif
            <h3>Thanh Toán  :  <span> {{number_format($tong+$vat-$tong_giam)}} VNĐ</span></h3>
            <?php
             $id_khachhang=Session::get('id_khachhang');
              if ($id_khachhang!= NULL) { 
            ?>
            <a class="ps-btn" href="web/logincheckout/show_checkout">Tiếp Tục<i class="ps-icon-next"></i></a>
            <?php } else {?>
              <a class="ps-btn" href="web/logincheckout/checkout">Tiếp Tục<i class="ps-icon-next"></i></a>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>  
@endsection