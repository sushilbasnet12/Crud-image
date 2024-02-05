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
            <a class="nav-link text-light" href="{{ route('product.index') }}">Products</a>
          </li>
          
        </ul>
      </nav>

       @if ($message = Session::get('success'))
       <div class="alert alert-success alert-block">
        <strong> {{  $message }}</strong>
       </div>
    @endif

    <div class="container">

        <div class="text-right">
            <a href="{{ route("product.create") }}" class="btn btn-success mt-2">New product </a>
        </div>

        <table class="table table-hover mt-3">
           <thead>
              <tr>
                 <th>S No.</th>
                 <th>Name</th>
                 <th>Description</th>
                 <th>Image</th>
                 <th>Action</th>
              </tr>
          </thead>
         <tbody>

          {{-- Display dynamic data  --}}
          @foreach ($products as $i=>$product )
          
          <tr>
                <td>{{ $i+1}}</td>

                <td>{{  $product->name }}</td>
                <td>{{  $product->description }}</td>
                <td>
                  <img src="{{ asset('products/' . $product->image ) }}" class="rounded-circle"
                  width="50" height="40" /> 
    
                </td>
                <td class="d-flex">
                  <a class="btn btn-primary" href="{{ route("product.edit", $product->id) }}"> Edit </a>
                  <form action="{{ route('product.destroy',$product->id) }}" method="POST">
                    @method("DELETE")
                    @csrf 
                  <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
          @endforeach
         </tbody>
      </table>
        
    </div>
</body>
</html>