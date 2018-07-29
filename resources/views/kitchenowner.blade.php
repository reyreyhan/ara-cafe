<!DOCTYPE html>
<html lang="en">

<head>
@include('include.head')
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->

    @include('include.slider')

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Order Name : {{ $data2->name }} || Table : {{ $data2->num_table }} || Bill : Rp. {{ $data2->total }}</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $u)
                <tr>
                  <td>{{ $u->item->name}}</td>
                  <td>{{ $u->amount }}</td>
                  <td>{{ $u->total }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <br>


    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    @include('include.foot')
    @include('include.footer')
  </div>
</body>

</html>
