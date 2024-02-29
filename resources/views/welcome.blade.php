<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link href="{{ asset('assets/css/home.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title></title>

    <nav class="navbar navbar-expand-sm bg-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-light" text-left href="{{ route('product.index') }}">Home</a>
            </li>
        </ul>
    </nav>
</head>

<body>
    <div class="container">
        <div class="cards d-flex">
            <div class="card">
                <img src="{{ asset('media/3/Jacket.jpg') }}" alt="" width="300" height="300">
                <h1>The North Face Jacket</h1>
                <p class="price">Rs. 5000</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae, dolorem fuga earum impedit
                    quidem
                    soluta.</p>
            </div>

            <div class="card">
                <img src="{{ asset('media/4/shoes.jpg') }}" alt="" width="300" height="300">
                <h1>Gucci Shoes</h1>
                <p class="price">Rs. 15000</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae, dolorem fuga earum impedit
                    quidem
                    soluta.</p>
            </div>

            <div class="card">
                <img src="{{ asset('media/12/plates.jpg') }}" alt="" width="300" height="300">
                <h1>Plates</h1>
                <p class="price">Rs. 5000</p>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Molestiae, dolorem fuga earum impedit
                    quidem
                    soluta.</p>
            </div>
        </div>
    </div>

</body>

</html>
