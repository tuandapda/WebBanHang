@extends('admin.layout.index')
@section('title')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Hóa Đơn Nhập</h1>
      <p>Quản lý hóa đơn nhập</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Hoa Don</li>
      <li class="breadcrumb-item "><a href="#">Chi Tiet</a></li>
      <li class="breadcrumb-item "><a href="#">{{$hdm->MaHoaDon}}</a></li>
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
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
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
                                     <td>{{$hdm->MaHoaDon}}</td>
                                     <td>{{$hdm->TenHoaDon}}</td>      
                                     <td>{{$hdm->NgayMua}}</td>    
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                           <h4> Danh  sách hàng hóa</h4>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> Mã Hàng</th>
                                        <th> Tên Hàng</th>
                                        <th>Nhà cung cấp</th>
                                        <th> Số Lượng</th>
                                        <th> Giá Mua</th>
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
                                     <td>{{$ds->GiaMua}}</td>   
                                     <td>{{$t=($ds->SoLuong)*($ds->GiaMua)}}</td> 
                                     @php
                                         $tong=$tong+$t;
                                     @endphp  
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="5"> Tổng Tiền</td> 
                                    <td>{{$tong}}</td>   
                               </tr>
                                </tbody>
                            </table>
                        </div>  
                    </div>
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <h4>Thông tin khách hàng</h4>
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
                <div class="panel-footer">
                </div>
            </div>
          </div>
        </div>
      </div>
</div>
@endsection