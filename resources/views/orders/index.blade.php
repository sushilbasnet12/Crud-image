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
            <a href="{{ route("order.create") }}" class="btn btn-success mt-2">New Order </a>
        </div>

        <table class="table table-hover mt-3">
           <thead>
              <tr>
                 <th>S No.</th>
                 <th>Customer Name</th>
                 <th>Customer Address</th>
                 <th>Product Types</th>
                 <th> Product </th>
                 <th>Action</th>
              </tr>
          </thead>
         <tbody>

          @foreach ($order as $i=>$order )
          
          <tr>
                <td>{{ $i+1}}</td>

                <td>{{  $order->customer_name }}</td>
                <td>{{  $order->customer_address }}</td>
                <td>{{  $order->product_types }}</td>
                <td>{{ $order->product->name }}</td>
                <td class="d-flex">
                  <a class="btn btn-primary" href="{{ route("order.edit", $order->id) }}"> Edit </a>
                  <form action="{{ route('order.destroy',$order->id) }}" method="POST">
                    @method("DELETE")
                    @csrf 
                  <button type="submit" class="btn btn-danger">Delete</button>
                  </form>
                </td>
              </tr>
          @endforeach
    </div>
</body>
</html>