@extends('admin.layout.index')
@section('title')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Nhà Cung Cấp</h1>
      <p>Quản lý thông tin nhà cung cấp</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Nha cung cap</li>
      <li class="breadcrumb-item active"><a href="#">Danh Sach</a></li>
    </ul>
  </div>   
@endsection
@section('conten')
<div class="row">
    <div class="col-md-12" style="text-align: right;padding-bottom: 20px;" >
        <a  href="admin/nhacc/them"><button class="btn btn-primary" type="button"> + Thêm Mới</button></a>
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
                    <th>Tên Nhà Cung Cấp</th>
                    <th>Quốc Gia</th>
                    <th>Ngày Tạo</th>
                    <th style="text-align:center">Tác Vụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nhacc as $nc)
                    <tr>
                        <td>{{$nc->NhaCC_Id}}</td>
                        <td>{{$nc->TenNhaCC}}</td>
                        <td>{{$nc->QuocGia}}</td>
                        <td>{{$nc->NgayTao}}</td>
                            <td>
                                <a  href="admin/nhacc/sua/{{$nc->NhaCC_Id}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-pencil-square-o" ></i></button></a>
                                <a  href="admin/nhacc/xoa/{{$nc->NhaCC_Id}}" onclick="return confirm('Bạn có muốn xóa ?')"><button class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash-o"></i></button></a>
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
@endsection