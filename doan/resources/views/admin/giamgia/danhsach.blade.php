@extends('admin.layout.index')
@section('title')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Mã giảm giá</h1>
      <p>Quản lý mã giảm giá</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Giảm giá</li>
      <li class="breadcrumb-item active"><a href="#">Danh Sach</a></li>
    </ul>
  </div>   
@endsection
@section('conten')
<div class="row">
    <div class="col-md-12" style="text-align: right;padding-bottom: 20px;" >
        <a  href="admin/giamgia/them"><button class="btn btn-primary" type="button"> + Thêm Mới</button></a>
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
                    <th>Tên</th>
                    <th>Mã</th>
                    <th>Số lượng</th>
                    <th>Giá Trị</th>
                    <th style="text-align:center">Tác Vụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($code as $ds)
                    <tr>
                        <td>{{$ds->Ten}}</td>
                        <td>{{$ds->Ma}}</td>
                        <td>{{$ds->SoLuong}}</td>
                        <td>
                            @if($ds->HinhThuc==1)
                            Giảm :{{$ds->GiaTri}}%
                            @else
                            Giảm  :{{$ds->GiaTri}}  VNĐ
                            @endif
                        </td>
                            <td>
                                <a href="admin/giamgia/xoa/{{$ds->ID}}" onclick="return confirm('Bạn có muốn xóa ?')"><button class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash-o"></i></button></a>
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