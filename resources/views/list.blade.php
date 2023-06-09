<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/71b7145720.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>
<body>



<form action="{{ url('/storeList') }}" method="post">
@csrf
  <div class="mb-6">
    <label for="" class="form-label">size</label>
    <input type="text" class="form-control" id="size" name="size" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">type</label>
    <input type="text" class="form-control" id="type" name="type"aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">color</label>
    <input type="text" class="form-control" id="color" name="color"aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">owner</label>
    <input type="text" class="form-control" id="owner" name="owner"aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">count</label>
    <input type="text" class="form-control" id="count" name="count"aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">price</label>
    <input type="text" class="form-control" id="price" name="price"aria-describedby="emailHelp">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

  
@yield('scripts')
</body>
</html>