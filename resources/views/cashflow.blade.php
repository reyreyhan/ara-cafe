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
          <i class="fa fa-table"></i> Cashflow View</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>User</th>
                  <th>Information</th>
                  <th>Type</th>
                  <th>Cash</th>
                  <th>Date</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $u)
                <tr>
                  <td>{{ $u->user->name}}</td>

                  @if($u->code == 0)
                    <td>{{ $u->information }}</td>
                  @else
                    <td><a href="{{url('owner/')}}/{{$u->code}}">{{ $u->information }}</a></td>
                  @endif

                  <td>@if( $u->cash > 0) In @elseif($u->cash < 0) Out @endif</td>
                  <td>{{ $u->cash }}</td>
                  <td>{{ $u->date }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    @include('include.foot')
    @include('include.footer')
  </div>
</body>

</html>
