@EXTENDS('admin.main')


@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <form action="{{ route('voucher.search.discount') }}" method="GET">
                <label for="keyword">Discount</label>
                <div CLASS="input-group">
                  @csrf
                  <select placeholder="" name="keyword" id="keyword" class="form-control custom-select">
                    <option selected disabled>Select one</option>
                    @foreach ($vouchers as $voucher)
                        <option value="{{$voucher->discount}}">{{$voucher->discount}}</option>
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
        <div class="col-md-2">
            <form action="{{ route('voucher.search.date') }}" method="GET">
                <label for="keyword">Expiration_date</label>
                <div CLASS="input-group">
                  @csrf
                  <select placeholder="" name="keyword" id="keyword" class="form-control custom-select">
                    <option selected disabled>Select one</option>
                    @foreach ($vouchers as $voucher)
                        <option value="{{$voucher->expiration_date}}">{{$voucher->expiration_date}}</option>
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
  <div CLASS="card shadow mb-12">
    <div CLASS="card-header py-3">
      <h6 CLASS="m-0 font-weight-bold text-primary">Mã giảm giá</h6>
      <h6><a href="{{route('voucher.create')}}" class="btn btn-primary">Thêm Mã giảm giá</a></h6>
    </div>
    <div CLASS="card-body">
      <div CLASS="table-responsive">
        <table CLASS="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          
          <thead>
            <tr>
              <th>Code</th>
              <th>Discount</th>
              <th>Expiration_date</th>
            </tr>
          </thead>
          <tbody>
            @foreach($vouchers as $voucher)
            <tr>
              <td>{{$voucher->code}}</td>
              <td>{{$voucher->discount}}</td>
              <td>{{$voucher->expiration_date}}</td>
              <td>
                <a href="{{route('voucher.edit',$voucher->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{route('voucher.dele',$voucher->id)}}" class="btn btn-primary">Delete</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
  {{ $vouchers->links() }}
  @endsection