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
      <li class="breadcrumb-item active"><a href="#">Danh Sach</a></li>
    </ul>
  </div>   
@endsection
@section('conten')
<div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <form class="row" method="GET" action="admin/sanpham/danhsach">
          
            <div class="form-group col-md-4">
              <select class="form-control" name="cboDanhMuc">
                <option>------------Chọn Danh Mục------------</option>
                @if(isset($danhmuc))
                  @foreach ($danhmuc as $dm)
                    @if ($danhMucId==$dm->DanhMuc_Id)
                    <option  selected="selcted" value="{{$dm->DanhMuc_Id}}">{{$dm->DanhMuc_Id}}-----{{$dm->TenDM}}</option>
                    @else
                    <option value="{{$dm->DanhMuc_Id}}">{{$dm->DanhMuc_Id}}-----{{$dm->TenDM}}</option>
                    @endif 
                  @endforeach
                @endif
            </select>
            </div>
            <div class="form-group col-md-3">
              <select class="form-control" name="cboNhaCungCap" >
                  <option>------Chọn Nhà Cung Cấp-------</option>
                  @if(isset($nhacc))
                  @foreach ($nhacc as $cc)
                  @if ($nhaCungCap==$cc->NhaCC_Id)
                  <option  selected="selcted" value="{{$cc->NhaCC_Id}}">{{$cc->NhaCC_Id}}-----{{$cc->TenNhaCC}}</option> 
                  @else
                  <option  value="{{$cc->NhaCC_Id}}">{{$cc->NhaCC_Id}}-----{{$cc->TenNhaCC}}</option>  
                  @endif
                  @endforeach
                  @endif 
              </select>
            </div>
            <div class="form-group col-md-3">           
              <input class="form-control" type="text"  placeholder="Nhập từ..." name="TuKhoa" value="{{$tuKhoa??''}}">
              <input  type="hidden"  name="_token" value="{{csrf_token()}}">
            </div>
            <div class="form-group col-md-2 align-self-end">
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
          <p><a class="btn btn-primary icon-btn" href="admin/sanpham/them" ><i class="fa fa-file"></i>Thêm Mới</a></p>
        </div>
        <div class="tile-body">
          <table class="table table-hover table-bordered" id="sampleTable1">
            <thead>
                <tr>
                    <th></th>
                    <th>Ảnh</th>
                    <th style="width:30px ">Mã Hàng</th>
                    <th style="width:40px ">Tên Hàng</th>
                    <th style="width:150px ">Mô tả</th>
                    <th >Mã Nhà CC</th>
                    <th >Mã DM</th>
                    <th>Giá</th>
                    <th>Giảm Giá</th>
                    <th>Ngày Tạo</th>
                     <th style="text-align:center;width:175px">Tác Vụ</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sanpham as $sp)
                <tr>
                    <th> <input type="checkbox"></th>
                    <td><img src="upload/sanpham/{{$sp->Anh}}" style="width:100px;heigth:200px"/></td>
                    <td>{{$sp->MaHang}}</td>
                    <td>{{$sp->TenHang}}</td>
                    <td>{!!$sp->MoTa!!}</td>
                    <td>{{$sp->NhaCC_Id}}</td>
                    <td>{{$sp->DanhMuc_Id}}</td>
                    <td>{{number_format($sp->GiaSP)}}</td>
                    <td>{{$sp->GiamGia}}%</td>
                    <td> {{$sp->NgayTao}}</td> 
                    <td>
                        <a href="admin/sanpham/sua/{{$sp->MaHang}}"><button class="btn btn-primary btn-sm" type="button"><i class="fa fa-pencil-square-o" ></i></button></a>
                        <a href="admin/sanpham/xoa/{{$sp->MaHang}}" onclick="return confirm('Bạn có muốn xóa ?')"><button class="btn btn-danger btn-sm" type="button"><i class="fa fa-trash-o"></i></button></a>
                        <a><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-binoculars" ></i>
                        </button></a>
                    </td>         
                </tr>
                 @endforeach
            </tbody>
          </table>
        </div>
        {{$sanpham->links()}}
      </div>
    </div>
</div>
    <!-- Button trigger modal -->
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
@endsection