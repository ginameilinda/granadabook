@extends('layouts.app')
<style>

.price {
  color: grey;
  font-size: 18px;
}

.card button {
  border: none;
  outline: 0;
  padding: 10px;
  color: white;
  background-color: #FF5733;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.card button:hover {
  opacity: 0.7;
}
</style>
@section('content')
<div class="container">
        <div class="row mt-4">
                <div class="col-md-4 offset-md-8">
                    <div class="form-group">
                    <select id="order_field" class="form-control">
                        <option disabled selected hidden>Sort By</option>
                        <option value="best_seller">Best Seller</option>
                        <option value="terbaik">Terbaik (Berdasarkan Rating)</option>
                        <option value="termurah">Termurah</option>
                        <option value="termahal">Termahal</option>
                        <option value="terbaru">Terbaru</option>
                    </select>
                    </div>
                </div>
            </div> 
    <div class="row" id="product-list">
        
@foreach($products as $idx=>$product)
    @if($idx == 0 || $idx % 4 == 0)
        <div class="row mt-4">
    @endif

    <div class="col">
        <a href="{{ route('products.show',$product->id) }}">
            <div class="card">

                <div class="text-center">
                    <?php $product=App\Models\Product::find($product->id) ?>
                    <image src="{{ asset('/images/'.$product->images()->get()[0]->image_src) }}" style="width: 100%; height: 300px;"></image>

                    <div class="card-body">
                        <h5 class="card-title">
                            <b>{{ $product->name }}</b>
                        </h5>
                        <hr>
                        <p class="price">
                            $ {{ $product->price }}
                        </p>
                        <div>
                            <a href="{{ route('carts.add', ['id' => $product['id']]) }}" class="btn btn-primary">Beli</a>
                        </div>
                    
                        <!-- <div class="beli">
                            <button>
                                <a href="{{ route('carts.add', ['id' => $product['id']]) }}"></a>Add to Cart
                        </div> -->
                        <!-- <a href="{{ url('show',$product->id) }}" class="btn btn-success">Detail</a> -->
                    </div>
                </div>
            </div>
        </a>
    </div>

    @if($idx > 0 && $idx % 4 == 3)
        </div>
    @endif
    @endforeach
</div>
<!-- Jquery -->
@endsection
@section('extra-js')
<script type="text/javascript">
  $(document).ready(function(){
      $('#order_field').change(function(){
        // window.location.href='/public?order_by=' + $(this).val();
        $.ajax({
            type: 'GET',
            url: '/public',
            data: {
                order_by: $(this).val(),
            },
            dataType: 'json',
            success: function (data) {
                var products = '';
                $.each(data, function (idx, product) {
                    if (idx == 0 || idx % 4 == 0) {
                        products += '<div class="row mt-4">';
                    }

                    products += '<div class="col">' + '<a href="/show/' +  product.id +'">' +
                    '<div class="card">' + '<div class="text-center">' +
                    '<image src="/images/' + product.image_url + '" style="width: 250px; height: 300px;">' + 
                    '</image>'+
                    '<div class="card-body">' +
                    '<h5 class="card-title">' +
                    '<a href="/products/' + product.id + '">' + product.name +
                    '</a>' +
                    '</h5>' + '<hr>' +
                    '<p class="price"> $ ' +
                    product.price +
                    '</p>' +
                    '<a href="/carts/add/' + product.id + '" class="btn btn-primary">Beli</a>' + 
                    '</div>' +
                    '</div>' +
                    '</div>' + '</div>' +'</a>';

                    if (idx > 0 && idx % 4 == 3) {
                        products += '</div>';
                    }
                });

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
