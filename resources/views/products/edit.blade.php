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

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-sm-8">
          <div class="card mt-3 p-3">
            <h3>Product Edit #{{ $product->name }}</h3>
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label> Name </label>
                <input type="text" name="name" class="form-control" value="{{ old('name',$product->name) }}">

                {{-- form Validation for name --}}
                @if($errors->has('name'))
                    <span class="text-danger">{{  $errors->first('name')}}</span>
                @endif

              </div>
              <div class="form-group">
                <label> Description </label>
                <input type="text" class="form-control" rows="4" name="description" value="{{ old('description',$product->description) }}">

                {{-- form validation for description --}}
                @if($errors->has('description'))
                    <span class="text-danger">{{  $errors->first('description')}}</span>
                @endif
              </div>

              <div class="form-group">
                <label>Image</label>
                <input type="file" name="image" class="form-control" value="{{ old('image') }}">

                {{-- form validation for image --}}
                @if($errors->has('image'))
                <span class="text-danger">{{  $errors->first('image')}}</span>
                @endif
              </div>

              <button type="submit" class="btn btn-dark">Update</button>

              <a href="{{ route('product.index') }}" class="btn btn-danger">Cancel</a>
            </form>
          </div>
        </div>
      </div> 
    </div> 
</body>
</html>