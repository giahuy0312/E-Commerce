@EXTENDS('admin.main')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header text-center">Chỉnh Sửa mã giảm giá</h3>
                    <div class="card-body">
                        <form action="{{ route('voucher.update', $voucher->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-3">
                            <input type="hidden"  id="id" value="{{$voucher->code}}"  name="id" >
                                <input type="text" placeholder="Code" id="code" value="{{$voucher->code}}" class="form-control" name="code" required autofocus>
                                <input type="text" placeholder="Destroy" id="destroy" value="{{$voucher->discount}}" class="form-control" name="discount" required autofocus>
                                <input type="date" placeholder="Expiration_date" id="expiration_date" value="{{$voucher->expiration_date}}" class="form-control" name="expiration_date" required autofocus>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Sửa mã giảm giá</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</main>
@endsection