<!DOCTYPE html>
<html lang="en">

<head>
@include('include.head')
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    @include('include.slider2')
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <div class="row">
        <div class="col-12">
          <form action="{{ url('/order/store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('post')}}
            <div class="form-group">
              <label for="exampleInputPassword1">Order Name</label>
              <input value="{{ session('sessionOrder')->name}}" type="text" class="form-control" name="Your Name" placeholder="Information" required disabled>
            </div>
            <div class="form-group">
            <label for="exampleFormControlSelect1">Type</label>
              <select class="form-control" name="item">
                @foreach($item as $u)
                <option value="{{ $u->id }}">{{ $u->name }} || Rp. {{ $u->price}}</option>
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Amount</label>
              <input type="number" class="form-control" name="amount" placeholder="Amount" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>

      <br><br>

      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>  Order Name :  {{ session('sessionOrder')->name }} || Table : {{ session('sessionOrder')->num_table}} || Bill : Rp. {{$total}}</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Item Name</th>
                  <th>Amount</th>
                  <th>Total</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                @foreach($order as $u)
                <tr>
                  <td>{{ $u->item->name }}</td>
                  <td>{{ $u->amount }}</td>
                  <td>{{ $u->total }}</td>
                  <td>
                    <form action="{{ url('/order/del')}}/{{session('sessionOrder')->code_invoice}}/{{$u->id}}" method="post" enctype="multipart/form-data">
                      {{ csrf_field() }}
                      {{ method_field('DELETE')}}
                      <button type="submit" class="btn btn-danger">Cancel Order</button>
                    </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <form action="{{ url('/order/fix')}}/{{session('sessionOrder')->code_invoice}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT')}}
        <button type="submit" class="btn btn-primary">Fix Order</button>
      </form>
      <br>

      @if($check == 1)
      <form action="{{ url('/order/cancel')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('DELETE')}}
        <button type="submit" class="btn btn-danger">Cancel Order</button>
      </form>
      @endif

      <br><br>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    @include('include.foot2')
    @include('include.footer')
  </div>
</body>

</html>
