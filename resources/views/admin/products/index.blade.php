@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h1 style="text-shadow: 1px 1px 10px rgba(0,0,0,0.5); text-align: center; color: white;">Product</h1>
            <!-- <a href="{{ route('admin.products.create') }}" class="btn btn-primary">Tambah Produk</a> -->
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="form-group">
                        <select id="order_field2" class="form-control">
                            <option disabled selected hidden>Sort By</option>
                            <option value="best_seller">Best Seller</option>
                            <option value="terbaik">Terbaik</option>
                            <option value="termurah">Termurah</option>
                            <option value="termahal">Termahal</option>
                            <option value="terbaru">Terbaru</option>
                        </select>
                    </div>
                </div>
            </div>

            @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
            @endif

            <div class="row" id="product-list">
                <div class="table table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th style="text-align:center;">No</th>
                                <th style="text-align:center;">Judul Buku</th>
                                <th style="text-align:center;">Harga</th>
                                <th style="text-align:center;">Updated Date</th>
                                <th style="text-align:center;" colspan="3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td style="text-align:center;">{{ $product->id }}</td>
                                <td style="text-align:center;">{{ $product->name }}</td>
                                <td style="text-align:center;">$ {{ $product->price }}</td>
                                <td style="text-align:center;">{{ $product->updated_at }}</td>
                                <td style="text-align:center;">

                                    <form action="{{ route('admin.products.destroy',$product->id) }}" method="POST">
                                        @csrf @method('DELETE')
                                        
                                        <a class="btn btn-info" href="{{ route('admin.products.edit',$product->id) }}">Edit</a>

                                        <a class="btn btn-success" href="{{ route('admin.products.show',$product->id) }}">Detail</a>


                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure ?');">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- JQuery -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <script type="text/javascript">
    $(document).ready(function () {
        $('#order_field').change(function () {
            window.location.href = '/?order_by=' + $(this).val();
        });
    });
</script> -->
@endsection

@section('extra-js')
<script type="text/javascript">
  $(document).ready(function(){
      $('#order_field2').change(function(){
        // window.location.href='/admin/products?order_by=' + $(this).val();
        $.ajax({
            type: 'GET',
            url: '/admin/products',
            data: {
                order_by: $(this).val(),
            },
            dataType: 'json',
            success: function (data) {
                var products = ''; 
                products += '<div class="table table-responsive">' + '<table class="table table-striped table-sm">' +
                '<thead>' + '<tr>' + 
                '<th style="text-align:center;">No' + '</th>' +
                '<th style="text-align:center;">Judul Buku' + '</th>' +
                '<th style="text-align:center;">Harga' + '</th>' +
                '<th style="text-align:center;">Updated Date' + '</th>' +
                '<th style="text-align:center;" colspan="3">Actions' + '</th>' + '</tr>' +
                '</thead>' + '<tbody>';

                $.each(data, function (idx, product) {
                    if (idx == 0 || idx % 4 == 0) {
                        products += '<div class="row mt-4">';
                    }

                    products += '<tr>' +
                    '<td style="text-align:center;">' + product.id + '</td>' 
                    + '<td style="text-align:center;">' + product.name + '</td>'
                    + '<td style="text-align:center;">$ ' + product.price + '</td>' 
                    + '<td style="text-align:center;">' + product.updated_at + '</td>' 
                    + '<td style="text-align:center;">'
                    + '<form action="/destroy/' + product.id + '" method="POST">' 
                    + '@csrf' + '@method('GET')'
                    + '<a class="btn btn-info" href="/admin/products/'+ product.id +'/edit">Edit' + '</a>'
                    + '<a class="btn btn-success" href="/admin/products/'+ product.id +'">Detail' + '</a>'
                    + '<button type="submit" class="btn btn-danger">Delete' 
                    + '</button>' + '</form>' + '</td>'
                    + '</tr>';
                });
                
                products += '</tbody>' + '</table>' + '</div>';

                $('#product-list').html(products);
            },
            error: function (data) {
                alert('Unable to handle request');
            }
        });
      });
  });
</script>
@endsection
