@extends('layouts.app')

@section('content')
<div class="container">
	@if($message = Session::get('success'))
	<div class="alert alert-success">
		<p>{{ $message }}</p>
	</div>
	@endif
	
	<table id="cart" class="table table-hover table-condensed">
		<thead>
			<tr>
				<th style="width: 50%" class="text-center">Product</th>
				<th style="width: 10%" class="text-center">Price</th>
				<th style="width: 8%" class="text-center">Quantity</th>
				<th style="width: 22%" class="text-center">Subtotal</th>
				<th style="width: 10%" class="text-center"></th>
			</tr>
		</thead>

		<tbody>
			<?php $total = 0 ?>

			@if(session('cart'))
			@foreach(session('cart') as $id => $product)

			<?php $total += $product['price'] * $product['quantity'] ?>

			<tr>
				<td data-th="Product">
					<div class="row">
						<div class="col-sm-3 hidden-xs">
							<img src="{{ asset('/images/'. $product['image_src']) }}" width="90" height="100">
						</div>
						<div class="col-sm-9">
							<h4 class="nomargin">{{ $product['name'] }}</h4>
						</div>
					</div>
				</td>

				<td data-th="Price" class="text-center">$ {{ $product['price'] }}</td>

				<td data-th="Quantity" class="text-center">
					<input type="number" value="{{ $product['quantity'] }}" class="form-control quantity">
				</td>

				<td data-th="Subtotal" class="text-center">$ {{ $product['price'] * $product['quantity'] }}</td>

				<td class="actions" data-th="">

					<button class="btn btn-info btn-sm update-cart" data-id="{{ $id }}">Update</button>
					<button class="btn btn-danger btn-sm mt-2 remove-from-cart" data-id="{{ $id }}">Remove</button>
				</td>
			</tr>
			@endforeach
			@endif
		</tbody>

		<tfoot>
			<tr class="visible-xs">
				<td>
					<a href="{{ url('public') }}" class="btn btn-warning"><i class="fas fa-shopping-basket"></i> Lanjut Belanja</a>

					<a href="{{ route('admin.orders.create') }}" class="btn btn-primary"><i class="fas fa-money-check-alt"></i> Bayar Sekarang</a>
				</td>

				<td colspan="" class="hidden-xs"></td>

				<td class="text-center"><strong>Total</strong></td>

				<td class="hidden-xs text-center"><strong>$ {{ $total }}</strong></td>
			</tr>
		</tfoot>
	</table>
</div>

<!-- jquery -->


@endsection