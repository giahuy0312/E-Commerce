@EXTENDS('admin.main')


@section('content')
  <!-- DataTales Example -->
  <div CLASS="card shadow mb-12">
    <div CLASS="card-header py-3">
      <h6 CLASS="m-0 font-weight-bold text-primary">Danh Mục</h6>
      <h6><a href="{{route('addcategory')}}" class="btn btn-primary">Thêm Danh Mục</a></h6>
    </div>
    <div CLASS="card-body">
      <div CLASS="table-responsive">
        <table CLASS="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          
          <thead>
            <tr>
              <th>Tên danh mục</th>
              <th>Chức Năng</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
            <tr>
              <td>{{$category->category_name}}</td>
              <td>
                <a href="{{route('getdataedtcategory',$category->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{route('deletecategory',$category->id)}}" class="btn btn-primary">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  {{ $categories->links() }}
  @endsection