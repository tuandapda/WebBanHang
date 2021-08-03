@extends('admin.layout.index')
@section('title')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Slide</h1>
      <p>Quản lý slide</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Giam Gia</li>
      <li class="breadcrumb-item active"><a href="#">Them</a></li>
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
      <form method="POST" action="admin/giamgia/them" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-6">  
            <div class="form-group">
              <label >Tên mã giảm giá *</label>
              <input class="form-control"  type="text" name="Ten">
              <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            </div>
            <div class="form-group">
                <label > Mã giảm giá *</label>
                <input class="form-control"  type="text" name="Ma">
            </div>
            <div class="form-group">
                <label > Số lượng *</label>
                <input class="form-control"  type="text" name="SoLuong">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Hình Thức *</label>
                <select class="form-control" name="HinhThuc">
                  <option>------------Chọn ------------</option>
                  <option value="1">giảm theo %</option>
                  <option value="2">giảm theo tiền</option>
              </select> 
            </div>
            <div class="form-group">
                <label > Nhâp số % hoặc tiền *</label>
                <input class="form-control"  type="text" name="GiaTri">
            </div>
        </div>
      </div>
      <div class="tile-footer">
        <button class="btn btn-primary" type="sumbit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
        &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="admin/giamgia/danhsach"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
      </div>
      </form>
    </div>
  </div>
@endsection