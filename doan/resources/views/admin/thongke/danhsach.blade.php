@extends('admin.layout.index')
@section('title')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Thống Kê</h1>
      <p>Quản lý thông tin thống kê</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Thong Ke</li>
      
    </ul>
  </div>   
@endsection
@section('conten')
<div class="row">
    <div class="col-md-6 col-lg-3">
      <div class="widget-small primary coloured-icon"><a href="admin/khachhang/danhsach"><i class="icon fa fa-users fa-3x"></i></a>
        <div class="info">
          <h4>Khách Hàng</h4>
          <p><b>{{$soLuongKH}}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small info coloured-icon"><a href="admin/sanpham/danhsach"><i class="icon fa fa-cubes fa-3x"></i></a>
        <div class="info">
          <h4>Sản Phẩm</h4>
          <p><b>{{$soLuongSP}}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small warning coloured-icon"><a href="admin/hoadonban/danhsach"><i class="icon fa fa-files-o fa-3x"></i></a>
        <div class="info">
          <h4>Đơn Hàng</h4>
          <p><b>{{$soLuongHDB}}</b></p>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-lg-3">
      <div class="widget-small danger coloured-icon"><a href="admin/danhmuc/danhsach"><i class="icon fa fa-star fa-3x"></i></a>
        <div class="info">
          <h4>Danh Mục</h4>
          <p><b>{{$soLuongDM}}</b></p>
        </div>
      </div>
    </div>
</div>
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Thống Kê Tồn Kho</h3>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>STT</th>
            <th>Mã Hàng</th>
            <th>Tên Hàng</th>
            <th>Tổng Mua</th>
            <th>Tổng Bán</th>
            <th>Tồn Kho</th>
          </tr>
        </thead>
        <tbody>
          @php 
          $i=1;
          @endphp
          @foreach($ojbThongKe as $ds)
          <tr>
            <td>{{$i++}}</td>
            <td>{{$ds->MaHang}}</td>
            <td>{{$ds->TenHang}}</td>
            <td>{{$ds->TongMua}}</td>
            <td>{{$ds->TongBan}}</td>
            <td>{{$ds->TonKho}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{$ojbThongKe->links()}}
    </div>
  </div>
</div>  
@endsection