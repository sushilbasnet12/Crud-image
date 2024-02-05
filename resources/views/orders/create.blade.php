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
            <a class="nav-link text-light" href="{{ route('order.index') }}">Orders</a>
          </li>
          
        </ul>
      </nav>

      <h2 class="text-center">Add Order</h2>

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-8">
          <div class="card mt-3 p-3">
            <form method="POST" action="{{ route("order.store") }}">
              @csrf
              <div class="form-group">
                <label> Customer Name </label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}">

                {{-- form Validation for customer name --}}
                @if($errors->has('name'))
                    <span class="text-danger">{{  $errors->first('name')}}</span>
                @endif

              </div>
              <div class="form-group">
                <label> Customer Address </label>
                <input type="text" class="form-control" name="address" value="{{ old('address') }}">

                {{-- form validation for customer address --}}
                @if($errors->has('name'))
                    <span class="text-danger">{{  $errors->first('address')}}</span>
                @endif
              </div>

              {{-- <div class="form-group">
                <label>Product Type </label>
                <input type="text" class="form-control" name="" value="{{ old('description') }}">
                
              </div> --}}

              <div class="form-group">
                <label for="">Product Type </label>
                  <select style="width: 100%;padding: 8px;background:white;border: solid 1px grey;" name="cars" id="cars">
                    <option value="">Clothes</option>
                    <option value="">Shoes</option>
                    <option value="">Kitchen Items</option>
                 </select> 
              </div>
            

              <button type="submit" class="btn btn-dark">Submit</button>

              <a href="{{ route('order.index') }}" class="btn btn-danger">Cancel</a>
            </form>
          </div>

        </div>
      </div> 
    </div> 

</html>