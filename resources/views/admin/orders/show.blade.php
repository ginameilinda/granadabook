@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<h1 style="text-shadow: 1px 1px 10px rgba(0,0,0,0.5); text-align: center; color: white;">Payment</h1>
			<div class="row">
				<div class="col">
					<p>Pembayaran dihitung tiga hari setelah klik simpan.</p>
				</div>	
			</div>

			<div class="row">
				<div class="col">
					<p><i class="far fa-credit-card"></i> Bank Mandiri
					</p>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<p>Granada Book Store <strong>1120302015032042</strong></p>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<p><i class="fas fa-user"></i>  {{ Auth::user()->name }}</p>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<p><i class="fas fa-address-card"></i> {{ $order->shipping_address }} Kota {{ $order->city }} RT{{ $order->rt }}/RW{{ $order->rw }} Provinsi {{ $order->provinsi }}</p>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<p>
						Kode Pos {{ $order->zip_code }}
					</p>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<p><i class="fas fa-money-bill-wave"></i> $ {{ $order->total_price }}</p>
				</div>
			</div>

			<div class="row">
				<div class="col">
					<p>
						<i class="fas fa-mobile-alt"></i> {{ $order->no_hp }}
					</p>
				</div>
			</div>
		</div>
	</div>

	<div>
		<a href="{{ url('/') }}" class="btn btn-warning"><i class="fas fa-shopping-basket"></i> Lanjut Belanja</a>
		<br><br>
	</div>


	<div class="row justify-content-center">
		<div class="col">
			<table id="cart" class="table table-hover table-condensed">
				<thead>
					<tr class="text-center">
						<th style="width: 50%">Product</th>
						<th style="width: 10%">Price</th>
						<th style="width: 8%">Quantity</th>
						<th style="width: 22%" class="text-center">Subtotal</th>
					</tr>
				</thead>

				<tbody>
					@foreach($order->orderItems as $orderItem)
					<tr>
						<td data-th="Product">
							<div class="row">
								<div class="col-sm-3 hidden-xs">
									<img src="{{ asset('/images/'. $orderItem->product->images->first()->image_src) }}" width="90" height="100" class="img-responsive"></div>

								<div class="col-sm-9">
									<div href="{{ route('products.show', ['id' => $orderItem->product->id]) }}">
										<h4 class="nonmargin">{{ $orderItem->product->name }}</h4>
									</div>
								</div>
							</div>
						</td>

						<td data-th="Price" class="text-center">
							$ {{ $orderItem->price }}
						</td>

						<td data-th="Quantity" class="text-center">
							{{ $orderItem->quantity }}
						</td>

						<td data-th="Subtotal" class="text-center" class="text-center">
							$ {{ $orderItem->price * $orderItem->quantity }}
						</td>
					</tr>
					@endforeach

				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection

@section('print')
<script>
	window.print();
</script>
@endsection