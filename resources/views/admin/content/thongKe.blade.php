@EXTENDS('admin.main')


@section('content')
<div id="content">
    <div class="status">
       <div class="panelWeb">
        Thông tin Website
       </div>
       <div class="panel-body">
        <dl class="horizontal">
            <p><b>Người dùng :</b> admin</p> 
            <p><span><b>Trạng thái :</b> Đang hoạt động</span></p>
        </dl>
       </div>
    </div>
     <div class="row">
      <div class="col-md-6">
        <div class="panel">
          <div class="panelTK">
            Thống kê thông tin
          </div>
          
            <li class="list-item">
              Tổng số bài viết
              <span>123</span>
            </li>
            <li class="list-item">
              Tổng số danh mục
              <span>123</span>
            </li>
            <li class="list-item">
              Tổng số menu
              <span>123</span>
            </li>
            <li class="list-item">
                -
              <span>-</span>
            </li>
        </div>
      </div>
      <div class="col-md-6">
        <div class="panel ">
          <div class="panelTK">
            Thống kê người dùng
          </div>
          
            <li class="list-item">
              Tổng số quản trị viên
              <span>123</span>
            </li>
            <li class="list-item">
              Tổng số nhân viên 
              <span>123</span>
            </li>
            <li class="list-item">
              Tổng số thành viên
              <span>123</span>
            </li>
            <li class="list-item">
              Tổng số khách hàng
              <span>123</span>
            </li>
         
        </div>
      </div>
     </div>
  </div>
@endsection