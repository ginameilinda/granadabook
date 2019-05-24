@extends('layouts.app')

<style type="text/css">
	
</style>

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col">

			@if(count($errors))
			<div class="form-group">
				<div class="alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
						<li>({$error})</li>
						@endforeach
					</ul>
				</div>
			</div>
			@endif
			<br>

			<form action="{{ route('admin.orders.store') }}" method="POST">
				<div class="row">
					<div class="col-sm-9 col-md-6">
						
						@csrf
						<div class="control-group">
							<div class="form-group floating-label-form-group controls">
								<label for="text" class="col-md-8 col-form-label"><i class="fas fa-user"></i> Penerima</label><br>
								<input type="text" name="" readonly="" id="kodepos" placeholder="{{ Auth::user()->name }}" style="width: 100%"> </input>
							</div>

							<div class="form-group floating-label-form-group controls">
								<label for="text" class="col-md-8 col-form-label"><i class="fas fa-address-card"></i> Alamat</label> <br>
								<input id="address" name="shipping_address" type="text" id="kodepos" placeholder="Jalan Sudirman No 3" style="width: 100%"></input>
							</div>

							<div class="form-group floating-label-form-group controls">
								<label for="text" class="col-md-8 col-form-label"><i class="fas fa-university"></i> Kota</label> <br>
								<input id="address" name="city" type="text" id="kodepos" placeholder="Jakarta" style="width: 100%"></input>
							</div>

							<div class="row">
								<div class="col-50">
									<label for="text" class="col-md-2 col-form-label">RT</label> <br>
									<input type="text" id="code" name="rt" placeholder="0001" id="kodepos">
								</div>
								<div class="col-50">
									<label for="text" class="col-md-2 col-form-label">RW</label> <br>
									<input type="text" id="code" name="rw" placeholder="0001" id="kodepos">
								</div>
							</div>
						</div>
						
						<label>
							<input type="checkbox" name="sameadr"> Shipping address same as billing
						</label>

						<div class="mt-4">
							<a href="{{ route('carts.index') }}" class="btn btn-warning text-white">Back</a>
							<button type="submit" class="btn btn-primary">Simpan</button>
						</div>
					</div>

					<div class="col-sm-3 col-md-6">
						<div class="form-group floating-label-form-group controls">
								<label for="text" class="col-md-8 col-form-label"><i class="fas fa-map-marked-alt"></i> Provinsi</label> <br>
								<input id="address" name="provinsi" type="text" id="kodepos" placeholder="Jakarta" style="width: 100%"></input>
							</div>
														
							<div class="row">
								<div class="col-50">
									<label for="text" class="col-md-5 col-form-label">Kode Pos</label> <br>
									<input type="text" id="code" name="zip_code" placeholder="10001" id="kodepos">
								</div>

								<div class="col-50">
									<label for="text" class="col-md-7 col-form-label">No Handphone</label><br>
									<input type="text" id="code" name="no_hp" placeholder="0811-1222-3333" id="kodepos">
								</div>
							</div>

							<br>

						<div class="col-50">
							<h3>Payment</h3>
							<div class="form-group floating-label-form-group controls">
								<label for="fname">Accepted Cards</label>
								<div class="icon-container">
									<i class="fab fa-cc-visa" style="color:navy;"></i>
									<i class="fab fa-cc-amex" style="color:blue;"></i>
									<i class="fab fa-cc-mastercard" style="color:red;"></i>
									<i class="fab fa-cc-discover" style="color:orange;"></i>
									<i class="fab fa-paypal" style="color:blue;"></i>
								</div>
							</div>
						</div>
					</div>
				</div>				
			</form>
		</div>
	</div>
</div>
@endsection