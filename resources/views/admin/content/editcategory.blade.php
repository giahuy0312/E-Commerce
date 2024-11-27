@EXTENDS('admin.main')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header text-center">Chỉnh Sửa Danh Mục</h3>
                    <div class="card-body">
                        <form action="{{route('editcategory') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                            <input type="hidden"  id="id" value="{{$getDataCategoryById[0]->id}}"  name="id" >
                                <input type="text" placeholder="Ten category" id="category_name" value="{{$getDataCategoryById[0]->category_name}}" class="form-control" name="cate_name" required autofocus>
                                @if ($errors->has('category_name'))
                                <span class="text-danger">{{ $errors->first('category_name') }}</span>
                                @endif
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Sửa Danh Mục</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</main>
@endsection