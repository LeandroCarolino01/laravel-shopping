<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <div class="container">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="#" class="nav-link">Shopping cart</a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/home')}}" class="nav-link">home</a>
                </li>
                <li class="nav-item">
                    <a href="" class="nav-link">about</a>
                </li>
            </ul>
            <a href="{{ route('shopping.cart')}}" class="btn btn-outline-dark">
                <i class="fa fa-shopping-cart" aria-hidden="true">Cart <span class="badge bg-danger">{{ count((array) session('cart'))}}</span></i>
            </a>
        </div>
    </nav>
    <div class="container mt-4">
        <h2 class="mb-3">
            Laravel Add to shopping cart
        </h2>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success')}}
            </div> 
        @endif
        @yield('content')
    </div>
    @yield('scripts')
</body>
</html>