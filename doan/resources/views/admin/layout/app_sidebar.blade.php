<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="upload/Avatar.jpg" style="width:40px" alt="Anh">
      <div>
        @if(Auth::check())
        <p class="app-sidebar__user-name"><i> Xin chào :</i><br>
          {{Auth::user()->Name}}
        </p>
        <p class="app-sidebar__user-designation"> </p>
        @endif
      </div>
    </div>
    <ul class="app-menu" >
      <li class="treeview"><a class="app-menu__item" href="admin/thongke/danhsach"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Thống Kê</span></a></li>
      <li  class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-secret"></i><span class="app-menu__label">Khách Hàng</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item " href="admin/khachhang/danhsach"><i class="icon fa fa-circle-o"></i> Danh Sách</a></li>
        </ul>
      </li>
      <li class="treeview "><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Hàng Hóa</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a id="menu" class="treeview-item" href="admin/sanpham/danhsach"><i class="icon fa fa-circle-o"></i> Sản Phẩm</a></li>
          <li><a class="treeview-item " href="admin/danhmuc/danhsach"><i class="icon fa fa-circle-o"></i> Danh Mục</a></li>
          <li><a class="treeview-item " href="admin/nhacc/danhsach"><i class="icon fa fa-circle-o"></i> Nhà Cung Cấp</a></li>
        
        </ul>
      </li>
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Hóa Đơn</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item"href="admin/hoadonmua/danhsach"><i class="icon fa fa-circle-o"></i> Hóa Đơn Nhập</a></li>
          <li><a class="treeview-item" href="admin/hoadonban/danhsach"><i class="icon fa fa-circle-o"></i> Hóa Đơn Xuất</a></li>
        </ul>
      </li>
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Giảm giá</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item"href="admin/giamgia/danhsach"><i class="icon fa fa-circle-o"></i> Danh Sách</a></li>
        </ul>
      </li>
      <li class="treeview "><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Tin Tức</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item "href="admin/loaitin/danhsach"><i class="icon fa fa-circle-o"></i> Loại Tin</a></li>
          <li><a class="treeview-item" href="admin/tin/danhsach"><i class="icon fa fa-circle-o"></i> Danh Sách</a></li>
        </ul>
      </li>
      
      <li class="treeview "><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-users"></i><span class="app-menu__label">User</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item "href="admin/user/danhsach"><i class="icon fa fa-circle-o"></i> Danh Sách</a></li>
        </ul>
      </li>
     
      <li class="treeview "><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-slideshare"></i><span class="app-menu__label">Slide</span><i class="treeview-indicator fa fa-angle-right"></i></a>
        <ul class="treeview-menu">
          <li><a class="treeview-item "href="admin/slide/danhsach"><i class="icon fa fa-circle-o"></i> Danh Sách</a></li>
        </ul>
      </li>
    </ul>
  </aside>
  <!---active-----is-expanded------->
  