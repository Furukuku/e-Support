<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>e-Support</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ asset('css/business/business-layout.css') }}">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg nav-bg">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-white">e-Support</span>
      <div class="btn-group">
        <button type="button" class="btn btn-dark bg-transparent border-0 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="username">{{ auth()->user()->username }}</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li class="dropdown-item p-0">
            <form action="{{ route('business.logout') }}" method="POST">
              @csrf
              <button type="submit" class="bg-transparent border-0 w-100 logout-btn">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  @yield('content')

</body>
</html>