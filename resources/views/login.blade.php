<!DOCTYPE html>
<html lang="en">

<head>
@include('include.head')
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="{{ url('/check')}}" method="post" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('post')}}
          <div class="form-group">
            <label>Username</label>
            <input class="form-control" name="username" type="text" placeholder="username" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input class="form-control" name="password" type="password" placeholder="password" required>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
@include('include.footer')
</body>

</html>
