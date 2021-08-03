@extends('web.layouts.index')
@section('title','Tìm Kiếm Tin')  
@section('page')
<div class="ps-blog-grid pt-80 pb-80">
    <div class="ps-container">
        <div>
            <h3 style="color: red"> Kết quả tìm kiếm từ khóa : {{$tuKhoa}}<h3>
        </div>
      <div class="row">
        <div class="col-lg-9.col-md-9.col-sm-12.col-xs-12">
          @foreach ($tin_tk as $ds)
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
            <div class="ps-post mb-30">
              <div class="ps-post__thumbnail"><a class="ps-post__overlay" href="web/chitiettintuc/{{$ds->ID}}"></a><img src="upload/tintuc/{{$ds->Anh}}" alt=""></div>
              <div class="ps-post__content"><a class="ps-post__title" href="web/chitiettintuc/{{$ds->ID}}">{{$ds->TieuDe}}</a>
                <p class="ps-post__meta"><span>By:<a class="mr-5" href="blog.html">Admin</a></span> -<span class="ml-5">Date : {{date('d-m-Y', strtotime($ds->NgayCapNhat))}} </span></p>
                <p>{{substr( $ds->NoiDung,  0, 80 )}}...</p><a class="ps-morelink" href="web/chitiettintuc/{{$ds->ID}}">Read more<i class="fa fa-long-arrow-right"></i></a>
              </div>
            </div>
          </div>
         @endforeach 
      </div>
      
    </div>
    {{$tin_tk->links()}}
  </div>
@endsection