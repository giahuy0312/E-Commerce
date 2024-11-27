@EXTENDS('admin.main')
@section('content')
<main class="signup-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <h3 class="card-header text-center">ADD VOUCHER</h3>
                    <div class="card-body">
                        <form action="{{ route('voucher.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="code" id="code" class="form-control" name="code" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" placeholder="discount" id="discount" class="form-control" name="discount" required autofocus>
                            </div>
                            <div class="form-group mb-3">
                                <input type="date" placeholder="expiration_date" id="expiration_date" class="form-control" name="expiration_date" required autofocus>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">ADD VOUCHER</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection