<!DOCTYPE html>
<html>
<head>
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/71b7145720.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  
<div class="container mt-5">
    <h2 class="mb-3">Products</h2>
    <div class="col-12">
        <div class="dropdown" >
            <!-- <a class="btn btn-outline-dark" href="">
                <i class="fa-solid fa-cart-shopping"></i> Cart <span class="badge text-bg-danger">{{ count((array) session('cart')) }}</span>
            </a> -->
        </div>
    </div>
</div>


<form action="{{ url('/filterList') }}" method="post" >
@csrf
  <label for="fname">size:</label>
  <input type="text"  name="size"><br><br>
  <label for="lname">type:</label>
  <input type="text"  name="type"><br><br>
  <label for="lname">color:</label>
  <input type="text"  name="color"><br><br>
  <label for="lname">price:</label>
  <input type="text"  name="price"><br><br>
  <label for="lname">owner:</label>
  <input type="text"  name="owner"><br><br>
  <label for="lname">count:</label>
  <input type="text"  name="count"><br><br>
  <button type="submit" class="btn btn-primary">Filter</button>
</form>

<table id="cart" class="table table-bordered">
    <form id="listform" action="{{ url('/updateList') }}" method="post">
    @csrf
    <thead>
        <tr>
            <th>Size</th>
            <th>Type</th>
            <th>Color</th>
            <th>Owner</th>
            <th>Count</th>
            <th>Price</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @php $total = 0 @endphp
        @if($products)
            @foreach($products as $key=>$product)
                
                <tr rowId="{{ $key }}">
                    <td data-th="Size"><input type="text" name="size"value="{{ $product['size'] }}"></td>
                    <td data-th="Type"><input type="text" name="type"value="{{ $product['type'] }}"></td>
                    <td data-th="Color"><input type="text" name="color"value="{{ $product['color'] }}"></td>
                    <td data-th="Owner"><input type="text" name="owner"value="{{ $product['owner'] }}"></td>
                    <td data-th="Count"><input type="text" name="count"value="{{ $product['count'] }}"></td>
                    <td data-th="Price"><input type="text" name="price"value="{{ $product['price'] }}"></td>
        
                    <input type="hidden" name="id" value="{{ $product['id'] }}">
                    <td class="actions">
                        <a class="btn btn-outline-info btn-sm delete-product" id="updateList"><i class="fa-solid fa-edit"></i></a>
                        <a class="btn btn-outline-danger btn-sm delete-product" href="{{ url('/deleteList/'.$product['id']) }}"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
    <tfoot>
        <tr>
            <td colspan="5" class="text-right">
            <a  href="{{ url('/createList') }}"class="btn btn-primary"><i class="fa fa-angle-left"></i> Create</a>
            </td>
        </tr>
    </tfoot>
</form>

</table>
  

<script>
    $('#updateList').on('click',function(){
        $('#listform').submit();
    })

</script>
@yield('scripts')
</body>
</html>