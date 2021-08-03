@extends('admin.layout.index')
@section('title')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i>Sản Phẩm</h1>
      <p>Quản lý thông tin sản phẩm</p>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
      <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
      <li class="breadcrumb-item">San Pham</li>
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
      <form method="POST" method="POST" action="admin/sanpham/them" enctype="multipart/form-data">
      <div class="row">
        <div class="col-lg-6">  
            <div class="form-group">
              <label >Mã Hàng *</label>
              <input class="form-control"  type="text" name="MaHang"><small class="form-text text-muted" id="emailHelp">We'll .</small>
              <input type="hidden" name="_token" value="{{csrf_token()}}"/>
            </div>
            <div class="form-group">
                <label >Tên Hàng *</label>
                <input class="form-control" id="exampleInputEmail1" type="text" name="TenHang">
            </div>
            <div class="form-group">
                <label>Giảm Giá * :</label>
                <div class="input-group">
                    <input class="form-control" id="exampleInputAmount" type="text" placeholder="" name="GiamGia">
                    <div class="input-group-append"><span class="input-group-text">%</span></div>
                </div>
            </div>
            <div class="form-group">
                <label>Giá SP * :</label>
                <div class="input-group">
                    <input class="form-control" id="exampleInputAmount" type="text" placeholder="Giá" name="GiaSP">
                    <div class="input-group-append"><span class="input-group-text">Đ</span></div>
                </div>
            </div> 
            <div class="form-group">
                <label>Ảnh :</label>
                <div class="file-upload" style="border: 1">
                    <button class="file-upload-btn" type="button" onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                    <div class="image-upload-wrap">
                      <input class="file-upload-input" type='file' onchange="readURL(this);" accept="image/*" name="Anh" />
                      <div class="drag-text">
                        <h3>CHON FIlE ANH</h3>
                      </div>
                    </div>
                    <div class="file-upload-content">
                      <img class="file-upload-image" src="#" alt="your image" />
                      <div class="image-title-wrap">
                        <button type="button" onclick="removeUpload()" class="remove-image">Remove <span class="image-title">Uploaded Image</span></button>
                      </div>
                    </div>
                </div>
            </div>       
        </div>
        <div class="col-lg-4 offset-lg-1">
            <div class="form-group">
                <label>Ngày Tạo * :</label>
                <input class="form-control" type="date" name="NgayTao"/>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Danh Mục *</label>
                <select class="form-control" name="DanhMuc_Id">
                    <option>------------Chọn Danh Mục------------</option>
                    @foreach ($danhmuc as $dm)
                    <option value="{{$dm->DanhMuc_Id}}">{{$dm->DanhMuc_Id}}-----{{$dm->TenDM}}</option>
                    @endforeach                                   
                </select>
            </div>
            <div class="form-group">
                <label class="col-form-label" for="inputDefault">Nhà Cung Cấp *</label>
                <select class="form-control" name="NhaCC_Id">
                    <option>------------Chọn Nhà Cung Cấp--------------</option>
                    @foreach ($nhacc as $cc)
                    <option value="{{$cc->NhaCC_Id}}">{{$cc->NhaCC_Id}}-----{{$cc->TenNhaCC}}</option>
                    @endforeach 
                </select>
            </div>
            
        </div>
        <div class="col-lg-12">
            <div class="form-group">
                <label>Mô Tả</label>
                <textarea  id="demon"class="form-control ckeditor" rows="3" name="MoTa"></textarea>
            </div>
        </div>
      </div>
      <div class="tile-footer">
        <button class="btn btn-primary" type="sumbit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Save</button>
        &nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="admin/sanpham/danhsach"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
      </div>
      </form>
    </div>
  </div>
@endsection