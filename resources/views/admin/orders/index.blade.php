@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col">
			<h1 style="text-shadow: 1px 1px 10px rgba(0,0,0,0.5); text-align: center; color: white;">List Order</h1>
			<div>
				<a href="{{ route('admin.products.create') }}" class="btn btn-primary">Tambah Produk</a>
			</div>
			<br>

			<div class="table-reponsive">
				<table class="table table-striped table-sm">
					<thead>
						<tr class="text-center">
							<!-- <th>No</th> -->
							<th>Harga Total</th>
							<th>Status</th>
							<th>Kode Pos</th>
							<th>Alamat Pengiriman</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody class="text-center">
						@foreach($order as $o)
						<tr>
							<!-- <td>{{$o['user_id']}}</td> -->
							<td>$ {{$o['total_price']}}</td>
							<td>{{$o['status']}}</td>
							<td>{{$o['zip_code']}}</td>
							<td>{{$o['shipping_address']}}</td>
							<td>

								<form action="{{ route('admin.orders.destroy',$o->id) }}" method="POST">
									@csrf @method('DELETE')

									<a href="{{route('admin.orders.show', $o->id)}}" class="btn btn-success">Detail</a>

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
@endsection