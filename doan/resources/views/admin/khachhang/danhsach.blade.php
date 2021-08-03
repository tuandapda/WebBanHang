@extends('admin.layout.index')
@section('title')

<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Khách Hàng</h1>
      <p>Quản lý thông tin khách hàng</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Khach Hang</li>
      <li class="breadcrumb-item active"><a href="#">Danh Sach</a></li>
    </ul>
  </div>   
@endsection
@section('conten')
<div class="row">
    <div class="col-md-8">
      <div class="tile">
        <div class="tile-body">
          <form class="row" method="GET" action="admin/khachhang/danhsach">
            <div class="form-group col-md-5">
              <select class="form-control" name="cboLoaiKhachHang">
                <option>------------Loai khách hàng------------</option>
                @if(isset($loai))
                  @foreach ($loai as $ds)
                  @if($ds->ID==$cboLoaiKhachHang)
                  <option selected="selected" value="{{$ds->ID}}">{{$ds->TenLoai}}</option>
                  @else
                  <option  value="{{$ds->ID}}">{{$ds->TenLoai}}</option>
                  @endif
                  @endforeach
                @endif
              </select>
            </div>
            <div class="form-group col-md-4">           
              <input class="form-control" type="text"  placeholder="Nhập từ..." name="TuKhoa" value="{{$tuKhoa??''}}">
              <input  type="hidden"  name="_token" value="{{csrf_token()}}">
            </div>
            <div class="form-group col-md-3 align-self-end">
              <button class="btn btn-primary" type="sumbit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Seach</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-12"  >
        @if(session('thongbao'))
        <div class="alert alert-success">
            {{session('thongbao')}}
        </div>
        @endif    
    </div>  
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-title-w-btn">
          <h3 class="title">Danh Sách</h3>
          <p><a class="btn btn-primary icon-btn" href="admin/khachhang/them" ><i class="fa fa-file"></i>Thêm Mới</a></p>
        </div>
        <div class="tile-body">
          <table class="table table-hover table-bordered" id="sampleTable1">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ Tên</th>
                    <th>Điện Thoại</th>
                    <th >Email</th>                   
                    <th> Tên Tài Khoản</th>
                    <th> Loại Khách Hàng</th>
                    <th style="width:15%;"> Tác Vụ</th>
                </tr>
            </thead>
            <tbody>
              
                @foreach ($khachHang as $ds)
                <tr >
                    <td>{{$ds->ID}}</td>
                    <td>{{$ds->HoTen}}</td>
                    <td>{{$ds->Dienthoai}}</td>
                    <td>{{$ds->Email}}</td>
                    <td>{{$ds->TaiKhoan}}</td>                   
                    <td>
                        <select class="form-control" name="LoaiKH" >
                        @foreach ($loai as $dsl)
                        @if($dsl->ID==$ds->LoaiKH)
                        <option selected="selected" value="{{$ds->ID}}">{{$dsl->TenLoai}}</option>
                        @else
                        <option  value="{{$ds->ID}}">{{$dsl->TenLoai}}</option>
                        @endif
                        @endforeach                                   
                    </select> </td>
                    <td>
                        <a href="admin/khachhang/sua/{{$ds->ID}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-pencil-square-o" ></i></button></a>
                        <a href="admin/khachhang/xoa/{{$ds->ID}}" onclick="return confirm('Bạn có muốn xóa ?')"><button class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash-o"></i></button></a>
                        <a>
                          
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalThem">
                            <i class="fa fa-binoculars" ></i>
                          </button>
                          
                        </a>
                          
                    </td>
                </tr>
                @endforeach     
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>    
    <!-- Button trigger modal -->
  <!-- Modal -->
<form id="modalThem" action="admin/khachhang/them" method="post" class="modal fade" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mediumModalLabel">
                    Thêm mới Sách</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tile-body" id="tile-body">
                    <div class="form-group row">
                        <label class="col-md-3">
                            ID:
                        </label>
                        <div class="col-md-9">
                            <input type="text" id="ID" name="ID" class="form-control" placeholder="Nhập mã Sách"  value="" required/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button"  class="btn btn-primary" name="btnThemMoi">Thêm mới</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</form>
      </div>
    </div>
  </div>
@endsection