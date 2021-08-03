@extends('admin.layout.index')
@section('title')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Slide</h1>
      <p>Quản lý slide</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Slide</li>
      <li class="breadcrumb-item active"><a href="#">Danh Sach</a></li>
    </ul>
  </div>   
@endsection
@section('conten')
<div class="row">
    <div class="col-md-12" style="text-align: right;padding-bottom: 20px;" >
        <a  href="admin/slide/them"><button class="btn btn-primary" type="button"> + Thêm Mới</button></a>
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
                    <th>Mô tả</th>
                    <th>Ảnh</th>
                    <th>Ngày Tạo</th>
                    <th style="text-align:center">Tác Vụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($slide as $ds)
                    <tr>
                        <td>{{$ds->ID}}</td>
                        <td>{{$ds->MoTa}}</td>
                        <td><img src="upload/slide/{{$ds->Anh}}" width="350px" height="150px"/></td>
                        <td>{{$ds->NgayCapNhat}}</td>
                            <td>
                                <a href="admin/slide/sua/{{$ds->ID}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-pencil-square-o" ></i></button></a>
                                <a href="admin/slide/xoa/{{$ds->ID}}" onclick="return confirm('Bạn có muốn xóa ?')"><button class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash-o"></i></button></a>
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