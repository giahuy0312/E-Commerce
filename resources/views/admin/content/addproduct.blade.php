@EXTENDS('admin.main')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header text-center">Thêm Sản Phẩm</h3>
                    <div class="card-body">
                        <form action="{{ route('registerproduct.custom') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label for="name">Tên Sản Phẩm</label>
                                        <input type="text" placeholder="Name" id="name" class="form-control" name="name" required autofocus>
                                        @if ($errors->has('name'))
                                        <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description">Mô tả Sản Phẩm</label>
                                        <textarea class ="form-control" name="description" id="description" cols="30" rows="10" placeholder="Input description" ></textarea>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label for="category_id">Danh Mục Sản Phẩm</label>
                                        <select placeholder="ID Category" name="category_id" id="category_id" class="form-control custom-select">
                                            <option selected disabled>Select one</option>
                                            @foreach ($categories as $value)
                                                <option value="{{$value->id}}">{{$value->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <li><label for="material">Vật Liệu Sản Phẩm</label></li>
                                        <li> <select class ="form-control custom-select" name="material">
                                            <option selected disabled>Select one</option>
                                            <option value="14k">14k</option>
                                            <option value="18k">18k</option>
                                            <option value="Platinum">Platinum</option>
                                        </select></li>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="price">Giá Sản Phẩm</label>
                                        <input type="text" placeholder="Price" id="price" class="form-control" name="price" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label for="size">Kích thước Sản Phẩm</label>
                                        <input class ="form-control" name="size" id="size" placeholder="Input size">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="image">Ảnh Sản Phẩm</label>
                                        <input type="file" name="image" id="image" accept="image/*" class="form-control-file" required>
                                    </div>
                                </div>
                            </div>
                            
                          
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">THÊM SẢN PHẨM</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection