@EXTENDS('admin.main')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
            <form action="{{ route('product.search.name') }}" method="GET">
    <div CLASS="input-group">
      @csrf
      <input type="text" name= "keyword" CLASS="form-control bg-light border-2 small " placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
      <div CLASS="input-group-append">
        <button CLASS="btn btn-primary" type="submit">
          <i CLASS="fas fa-search fa-sm"></i>
        </button>
      </div>
    </div>
    </form>
        </div>
        <div class="col-md-2">
            <form action="{{ route('product.search.category') }}" method="GET">
                <div CLASS="input-group">
                  @csrf
                  <select placeholder="" name="keyword" id="keyword" class="form-control custom-select">
                    <option selected disabled>Select one</option>
                    @foreach ($categories as $value)
                        <option value="{{$value->id}}">{{$value->category_name}}</option>
                    @endforeach
                </select>
                  <div CLASS="input-group-append">
                    <button CLASS="btn btn-primary" type="submit">
                      <i CLASS="fas fa-search fa-sm"></i>
                    </button>
                  </div>
                </div>
                </form>
        </div>
    </div>
</div>

    
<!-- DataTales Example -->
<div class="card shadow mb-12">
  <div class="card-header py-3">
    <h1 class="">Danh Sách Sản Phẩm</h1>
    <h6 ><a href="{{route('addproduct')}}" class="btn btn-primary">Thêm Sản Phẩm</a></h6>
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
           
            <th>Tên sản phẩm</th>
            <th>Ảnh sản phẩm</th>
            <th>Mô tả sản phẩm</th>
            <th>Giá sản phẩm</th>
            <th>Khích Thước Sản Phẩm</th>
            <th>Danh mục sản phẩm</th>
            <th>Chức Năng</th>
            
        </tr>
        </thead>

        <tbody>
          @foreach($products as $product)
          <tr>
           
            <td>{{$product->name}}</td>
            <td><img src="{{URL::asset('images/image-products')}}/{{$product->image}}" alt="" width="50px" height="50px"></td>
            <td>{{$product->description}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->size}}</td>
            @foreach($categories  as $category)
              @if ($product->category_id == $category->id)
              <td>{{$category->category_name}}</td>
              @endif
            
            @endforeach
            <td class="btncn">
              <a href="{{route('getdataedt',$product->id)}}" >Edit</a>
              <a href="{{route('deleteproduct',$product->id)}}">Delete</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
{{ $products->links() }}
@endsection