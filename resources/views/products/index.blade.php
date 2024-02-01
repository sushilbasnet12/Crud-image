<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel CRUD</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
    <nav class="navbar navbar-expand-sm bg-dark">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link text-light" href="/">Products</a>
          </li>
          
        </ul>
      </nav>

    <div class="container">

        <div class="text-right">
            <a href="{{ route("product.create") }}" class="btn btn-dark mt-2">New product </a>
        </div>

        <table class="table table-hover mt-3">
           <thead>
              <tr>
                 <th>S No.</th>
                 <th>Name</th>
                 <th>Image</th>
                 <th>Action</th>
              </tr>
          </thead>
         <tbody>

          {{-- Display dynamic data  --}}
          @foreach ($products as $product )
          <tr>
                <td>{{ $loop->index+1}}</td>
                <td>{{  $product->name }}</td>
                <td>
                  <img src="products/{{  $product->image }}" class="rounded-circle"
                  width="50" height="40" />
                </td>
                <td>
                  <a href="" class="btn btn-dark btn-small"> Edit </a>
                </td>
            </tr>
            
          @endforeach
           
         </tbody>
      </table>
        
    </div>
    
</body>
</html>