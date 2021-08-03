@extends('admin.layout.index')
@section('title')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>User</h1>
      <p>Quản lý user</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">User</li>
      <li class="breadcrumb-item active"><a href="#">Them</a></li>
    </ul>
  </div>   
@endsection
@section('conten')
<div class="col-md-8">
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
      <form method="POST" method="POST" action="admin/user/them" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-12">  
            <div class="form-group">
              <label >Name *</label>
              <input class="form-control"  type="text" name="Name">
              <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            </div>
            <div class="form-group">
                <label >Email *</label>
                <input class="form-control"  type="email" name="Email">
            </div>
            <div class="form-group">
                <label >Password *</label>
                <input class="form-control"  type="password" name="password">
            </div>
            <div class="form-group">
                <label >Nhập Lại Password *</label>
                <input class="form-control"  type="password" name="password_confirmation">
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Level *</label>
                <select class="form-control" name="CapDoID">
                    <option>------------Chọn ------------</option> 
                    @foreach($capdo as $ds)
                    <option value="{{$ds->ID}}">{{$ds->Name}}</option>
                    @endforeach                                              
                </select>
            </div>
        </div>
      </div>
      <div class="tile-footer">
        <button class="btn btn-primary" type="sumbit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
        &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="admin/user/danhsach"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
      </div>
      </form>
    </div>
  </div>
@endsection