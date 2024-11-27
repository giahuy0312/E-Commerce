@extends('admin.main')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header text-center">Sửa Sản Phẩm</h3>
                    <div class="card-body">
                        <form action="{{ route('editproduct') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="hidden" placeholder="id" id="id" value="{{$getDataProductById[0]->id}}" class="form-control" name="id" required autofocus>

                            </div>
                            <div class="form-group mb-3">
                                <label for="name" class="form-label">Tên</label>
                                <input type="text" placeholder="Name" id="name" value="{{$getDataProductById[0]->name}}" class="form-control" name="name" required autofocus>
                                @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <label for="description" class="form-label">Thông tin</label>
                                <input type="text" placeholder="Description" id="description" value="{{$getDataProductById[0]->description}}" class="form-control" name="description" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <label for="category_id" class="form-label">Danh mục</label>
                                <select name="category_id" id="category_id" class="form-control custom-select">
                                    <option selected disabled>Select one</option>
                                    @foreach ($categories as $value)
                                    @if ($getDataProductById[0]->category_id == $value->id)
                                    <option selected value="{{$value->id}}">{{$value->category_name}}</option>
                                    @else
                                    <option value="{{$value->id}}">{{$value->category_name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="materiall">Vật liệu</label>
                                <select class ="form-control" name="material">
                                    <option style="background-color:blue; color: white" selected value="{{$getDataProductById[0]->material}}">{{$getDataProductById[0]->material}}</option>
                                    <option value="14k">14k</option>
                                    <option value="18k">18k</option>
                                    <option value="Platinum">Platinum</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="price" class="form-label">Giá</label>
                                <input type="text" placeholder="Price" value="{{$getDataProductById[0]->price}}" id="price" class="form-control" name="price" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <label for="size" class="form-label">Kích thước</label>
                                <input type="text" placeholder="Size" value="{{$getDataProductById[0]->size}}" id="size" class="form-control" name="size" required autofocus>
                            </div>
                            <div class="mb-3">
                                <label for="image" class="form-label">Hình ảnh</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <img src="{{URL::asset('uploads')}}/{{$getDataProductById[0]->image}}" alt="" width="50">
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block"> Lưu Thay Đổi </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection