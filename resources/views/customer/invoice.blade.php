<!DOCTYPE html>
<html lang="en">

<head>
@include('include.head')
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">

  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <div class="row">
        <div class="col-12">
          <form action="{{ url('/order')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('post')}}
            <div class="form-group">
              <label for="exampleInputPassword1">Name</label>
              <input type="text" class="form-control" name="name" placeholder="Your Name" required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Table Number</label>
              <input type="text" class="form-control" name="num_table" placeholder="Your Table Number" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    @include('include.foot2')
    @include('include.footer')
  </div>
</body>

</html>
