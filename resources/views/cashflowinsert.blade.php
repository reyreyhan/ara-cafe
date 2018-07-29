<!DOCTYPE html>
<html lang="en">

<head>
@include('include.head')
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    @include('include.slider')
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <div class="row">
        <div class="col-12">
          <form action="{{ url('/cashflow/store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('post')}}
            <div class="form-group">
              <label for="exampleInputPassword1">Information</label>
              <input type="text" class="form-control" name="information" placeholder="Information" required>
            </div>
            <div class="form-group">
            <label for="exampleFormControlSelect1">Type</label>
              <select class="form-control" name="type">
                <option value="1">Income</option>
                <option value="0">Out</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Cash</label>
              <input type="number" class="form-control" name="cash" placeholder="Cash" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    @include('include.foot')
    @include('include.footer')
  </div>
</body>

</html>
