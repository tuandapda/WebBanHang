@extends('admin.layout.index')
@section('title')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Hóa Đơn Xuất</h1>
      <p>Quản lý hóa đơn xuất</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Hoa Don</li>
      <li class="breadcrumb-item "><a href="#">Chi Tiet</a></li>
      <li class="breadcrumb-item "><a href="#">{{$hdb->MaHoaDon}}</a></li>
    </ul>
  </div>  
@endsection
@section('conten')
<div class="row">
    <div class="col-md-10">
        <div class="tile">
          <div class="tile-title-w-btn">
            <h4 class="title">Thông tin hóa đơn.</h4>
            <p><a class="btn btn-primary icon-btn" href="#" target="_blank"><i class="fa fa-file"></i>In</a></p>
          </div>
          <div class="tile-body">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Thông tin Hóa Đơn.
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> Mã Hóa Đơn</th>
                                <th> Tên Hóa Đơn</th>
                                <th>Ngày Mua</th>
                                
                            </tr>
                        </thead>
                        <tbody>                               
                        <tr>
                             <td>{{$hdb->MaHoaDon}}</td>
                             <td>{{$hdb->TenHoaDon}}</td>      
                             <td>{{$hdb->NgayBan}}</td>    
                        </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
            <div class="panel panel-green">
                <div class="panel-heading">
                    Danh  Sách Hàng Hóa
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th> Mã Hàng</th>
                                <th> Tên Hàng</th>
                                <th>Nhà cung cấp</th>
                                <th> Số Lượng</th>
                                <th> Giá Bán</th>
                                
                                <th> Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                               $tong=0; 
                            @endphp
                        @foreach ($chiTiet as $ds)
                        <tr>
                             <td>{{$ds->MaHang}}</td>
                             <td>{{$ds->TenHang}}</td>      
                             <td>{{$ds->NhaCC_Id}}</td>   
                             <td>{{$ds->SoLuong}}</td>   
                             <td>{{number_format($ds->GiaBan)}}</td>
                                
                             <td>
                                 @php
                                     $t1=($ds->SoLuong)*($ds->GiaBan);
                                     
                                     echo number_format($t1);
                                 @endphp 
                            </td> 
                             @php
                                 $tong=$tong+$t1;
                             @endphp  
                        </tr>
                        @endforeach
                        <tr>
                            <td colspan="5"> VAT(+10%)</td> 
                            <td>{{number_format($tong*0.1)}}</td>   
                       </tr>
                        <tr>
                            <td colspan="5"> Tổng Tiền</td> 
                            <td>{{number_format($tong+$tong*0.1)}}</td>   
                       </tr>
                        </tbody>
                    </table>
                </div>  
            </div>
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    Thông Tin Khách hàng
                </div>
                <div class="panel-body">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <td> Mã Khách Hàng</td>
                                <td>{{$chiTietKH->ID}}</td>
                            </tr>
                        </thead>
                        <tbody>                               
                        <tr>
                             <td>Tên Khách Hàng</td>
                             <td>{{$chiTietKH->HoTen}}</td>      
                        </tr>
                        <tr>
                            <td>Số Điện Thoại</td>
                            <td>{{$chiTietKH->DienThoai}}</td>      
                       </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$chiTietKH->Email}}</td>      
                       </tr>
                       <tr>
                        <td>Địa Chỉ</td>
                        <td>{{$chiTietKH->DiaChi}}</td>      
                   </tr>
                        </tbody>
                    </table>
                </div>
                
            </div>
          </div>
        </div>
      </div>
</div>
@endsection