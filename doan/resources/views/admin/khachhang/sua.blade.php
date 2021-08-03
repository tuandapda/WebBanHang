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
      <li class="breadcrumb-item active"><a href="#">Sua</a></li>
    </ul>
  </div>   
@endsection
@section('conten')
<div class="col-md-12">
    <div class="tile">
        <h3 class="tile-title">Thông Tin</h3>
              @if(count($errors)>0)
              <div class="alert alert-danger">
                  @foreach( $errors->all() as $err)
                  {{$err}}<br>
                  @endforeach
              </div>
          @endif
          @if(session('thongbao'))
              <div class="alert alert-success">
                  {{session('thongbao')}}
              </div>
          @endif
      <form method="POST" action="admin/khachhang/sua/{{$kh->ID}}">
      <div class="row">
        <div class="col-lg-6">  
            <div class="form-group">
              <label for="exampleInputEmail1">ID *</label>
              <input class="form-control" id="exampleInputEmail1" type="text" name="ID" value="{{$kh->ID}}" readonly><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
              <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Họ Tên *</label>
                <input class="form-control" id="exampleInputEmail1" type="text" name="HoTen" value="{{$kh->HoTen}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Điện Thoại *</label>
                <input class="form-control" id="exampleInputEmail1" type="text" name="Dienthoai" value="{{$kh->Dienthoai}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email *</label>
                <input class="form-control" id="exampleInputEmail1" type="email" name="Email" value="{{$kh->Email}}">
            </div>          
            <div class="form-group">
              <label for="exampleTextarea">Địa Chỉ</label>
              <textarea class="form-control" id="exampleTextarea" rows="5" name="DiaChi"> {{$kh->DiaChi}}</textarea>
            </div>
        </div>
        <div class="col-lg-4 offset-lg-1">
            <div class="form-group">
              <label class="col-form-label" for="inputDefault">Tài Khoản *</label>
              <input class="form-control" id="inputDefault" type="text" name="TaiKhoan" value="{{$kh->TaiKhoan}}">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Mật Khẩu *</label>
                <input class="form-control" id="inputDefault" type="password" name="MatKhau" value="{{$kh->password}}">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Nhập Lại Mật Khẩu</label>
                <input class="form-control" id="inputDefault" type="password" value="{{$kh->password}}">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Loại KH *</label>
                <select class="form-control" name="LoaiKH">
                  @foreach ($loai as $ds)
                  @if ($ds->ID==$kh->ID)
                  <option selected="selected" value="{{$ds->ID}}">{{$ds->TenLoai}}</option>  
                  @else
                  <option value="{{$ds->ID}}">{{$ds->TenLoai}}</option>
                  @endif
                  @endforeach                                   
              </select> 
            </div>
        </div>
      </div>
      <div class="tile-footer">
        <button class="btn btn-primary" type="sumbit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
        &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="admin/khachhang/danhsach"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
      </div>
      </form>
    </div>
  </div>
@endsection