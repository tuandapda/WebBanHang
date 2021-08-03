@extends('admin.layout.index')
@section('title')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Hóa Đơn Xuất</h1>
      <p>Quản lý hóa đơn bán</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Hoa Don</li>
      <li class="breadcrumb-item active"><a href="#">Danh Sach</a></li>
    </ul>
  </div>   
@endsection
@section('conten')
<div class="row">
    <div class="col-md-12" style="text-align: right;padding-bottom: 20px;" >
        <a   href="admin/sanpham/them"><button class="btn btn-primary" type="button"> + Thêm Mới</button></a>
    </div>
    <div class="col-md-12"  >
        @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
        @endif    
    </div>
    </div>
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <table class="table table-hover table-bordered" id="sampleTable">
            <thead>
            <tr>
              <th>ID</th>
              <th>Tên Hóa Đơn</th>
              <th>Ngày Bán</th>
              <th>Mã KH</th>
              <th>Mô Tả</th>
              <th>Trạng Thái</th>
              <th>HTTT</th>
              <th style="text-align:center">Tác Vụ</th>
            </tr>
            </thead>
            <tbody>
                    @foreach($hdb as $hd)
                        <tr>
                            <td>{{$hd->MaHoaDon}}</td>
                            <td>{{$hd->TenHoaDon}}</td>
                            <td>{{$hd->NgayBan}}</td>
                            <td>{{$hd->KhachHang_Id}}</td>
                            <td>
                              {{$hd->MoTa}}
                            </td>
                            <th>
                              <select class="form-control" name="TrangThai">
                                @if($hd->TrangThai=='DXL')
                                <option selected="selected" value="DXL"><p style="color: red">Đang Xử Lý<p></option>
                                <option  value="DG">Đã Giao</option>
                                @else
                                <option  value="DXL">Đang Xử Lý</option>
                                <option  selected="selected" value="DG">Đã Giao</option>
                                @endif
                            </th>
                            <th>
                              @if($hd->HinhThucThanhToan=='1')
                               Tiền Mặt
                              @else
                               Thẻ
                              @endif
                            </th>
                            <td>
                                <a class="btn btn-warning btn-sm"  href="admin/hoadonban/chitiet/{{$hd->MaHoaDon}}"><i class="fa fa-file-text-o"></i>
                                </a>
                                <a href="admin/hoadonban/xoa/{{$hd->MaHoaDon}}" onclick="return confirm('Bạn có muốn xóa ?')"><button class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash-o"></i></button></a>
                            </td> 
                        </tr>
                   @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- Button trigger modal -->
  <!-- Modal -->

@endsection