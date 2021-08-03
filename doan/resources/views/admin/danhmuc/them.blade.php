@extends('admin.layout.index')
@section('title')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Danh Mục</h1>
      <p>Quản lý danh mục</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Danh Muc</li>
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
      <form method="POST" action="admin/danhmuc/them">
      <div class="row">
        <div class="col-lg-6"> 
            <div class="form-group">
                <label>ID * :</label>
                <input class="form-control" type="text" name="Id" placeholder="Enter text"/>
            </div> 
            <div class="form-group">
              <label for="exampleInputEmail1">Tên Danh Mục *</label>
              <input class="form-control"  type="text" name="TenDM"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
              <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ngày Tạo *</label>
                <input class="form-control" id="exampleInputEmail1" type="date" name="NgayTao">
            </div>
        </div>
      </div>
      <div class="tile-footer">
        <button class="btn btn-primary" type="sumbit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
        &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="admin/danhmuc/danhsach"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
      </div>
      </form>
    </div>
  </div>
@endsection