@extends('admin.layout.index')
@section('title')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Bài Viết</h1>
      <p>Quản lý bài viết</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">Bai Viet</li>
      <li class="breadcrumb-item">Tin</li>
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
      <form method="POST"  action="admin/tin/sua/{{$tin->ID}}" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-6">  
            <div class="form-group">
              <label >Tiêu Đề *</label>
              <input class="form-control"  type="text" name="TieuDe" value="{{$tin->TieuDe}}"><small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone else.</small>
              <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            </div>
            <div class="form-group">
                <label>Anh * :</label>
                <input class="form-control"  type="file" name="Anh" placeholder="Enter text"/>
            </div>
        </div>
        <div class="col-lg-4 offset-lg-1">
            <div class="form-group">
                <label>Ngày Tạo * :</label>
                <input class="form-control" type="date" name="NgayCapNhat"  value="{{$tin->NgayCapNhat}}"/>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Loại Tin *</label>
                <select class="form-control" name="LoaiTin_ID">
                    <option>------------Chọn ------------</option>                   
                    @foreach ($loaitin as $dm)
                    @if ($dm->ID==$tin->LoaiTin_ID)
                    <option selected="selected" value="{{$dm->ID}}">{{$dm->Ten}}</option>
                    @else
                    <option value="{{$dm->ID}}">{{$dm->Ten}}</option>
                    @endif           
                    @endforeach                               
                </select>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Nôi Dung</label>
                <textarea  id="ND_Sua" class="form-control " rows="10" name="NoiDung">{{$tin->NoiDung}}</textarea>
            </div>
        </div>
      </div>
      <div class="tile-footer">
        <button class="btn btn-primary" type="sumbit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
        &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="admin/tin/danhsach"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
      </div>
      </form>
    </div>
  </div>
@endsection