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
                    <th>TenHoaDon</th>
                    <th>NgayMua</th>
                    <th>Mã KH</th>
                    <th>Mô Tả</th>
                    <th style="text-align:center">Tác Vụ</th>
                </tr>
            </thead>
            <tbody>
                    @foreach($hdm as $hd)
                        <tr>
                            <td>{{$hd->MaHoaDon}}</td>
                            <td>{{$hd->TenHoaDon}}</td>
                            <td>{{$hd->NgayMua}}</td>
                            <td>{{$hd->KhachHang_Id}}</td>
                            <td>{{$hd->MoTa}}</td>
                            <td>
                                <a class="btn btn-warning btn-sm"  href="admin/hoadonmua/chitiet/{{$hd->MaHoaDon}}"><i class="fa fa-file-text-o"></i>
                                </a>
                                <a href="admin/hoadonmua/sua/{{$hd->MaHoaDon}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-pencil-square-o" ></i></button></a>
                                <a href="admin/hoadonmua/xoa/{{$hd->MaHoaDon}}" onclick="return confirm('Bạn có muốn xóa ?')"><button class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash-o"></i></button></a>
                                <a><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fa fa-binoculars" ></i>
                                </button></a> 
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
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection