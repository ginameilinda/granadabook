@extends('layouts.app')

<style>
.star-rating {
  font-size: 0;
  white-space: nowrap;
  display: inline-block;
  /* width: 250px; remove this */
  height: 50px;
  overflow: hidden;
  position: relative;
  background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
  background-size: contain;
}
.star-rating i {
  opacity: 0;
  position: absolute;
  left: 0;
  top: 0;
  height: 100%;
  /* width: 20%; remove this */
  z-index: 1;
  background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
  background-size: contain;
}
.star-rating input {
  -moz-appearance: none;
  -webkit-appearance: none;
  opacity: 0;
  display: inline-block;
  /* width: 20%; remove this */
  height: 100%;
  margin: 0;
  padding: 0;
  z-index: 2;
  position: relative;
}
.star-rating input:hover + i,
.star-rating input:checked + i {
  opacity: 1;
}
.star-rating i ~ i {
  width: 40%;
}
.star-rating i ~ i ~ i {
  width: 60%;
}
.star-rating i ~ i ~ i ~ i {
  width: 80%;
}
.star-rating i ~ i ~ i ~ i ~ i {
  width: 100%;
}
::after,
::before {
  height: 100%;
  padding: 0;
  margin: 0;
  box-sizing: border-box;
  text-align: center;
  vertical-align: middle;
}

.star-rating.star-5 {width: 250px;}
.star-rating.star-5 input,
.star-rating.star-5 i {width: 20%;}
.star-rating.star-5 i ~ i {width: 40%;}
.star-rating.star-5 i ~ i ~ i {width: 60%;}
.star-rating.star-5 i ~ i ~ i ~ i {width: 80%;}
.star-rating.star-5 i ~ i ~ i ~ i ~i {width: 100%;}

.star-rating.star-3 {width: 150px;}
.star-rating.star-3 input,
.star-rating.star-3 i {width: 33.33%;}
.star-rating.star-3 i ~ i {width: 66.66%;}
.star-rating.star-3 i ~ i ~ i {width: 100%;}

</style>

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-3">

			@if(!$product->images()->get()->isEmpty())
			<div class="mySlides">
				<div class="product-section-image">
					<img src="{{ asset('/images/'.$product->images()->get()[0]->image_src) }}" class="card-img-top" id="currentImage" id="myimage" height="360">
				</div>

				<div class="product-section-images">
					@foreach($product->images()->get() as $image)
					<div class="column">
						<div class="product-thumbnail mt-3">
							<img src="{{ asset('/images/'.$image->image_src) }}" class="card-img-top" height="70">
						</div>
					</div>
					@endforeach
				</div>
			</div>
        @endif		
	        <!-- Share Social Media -->
	        <div class="mt-2 text-center"><br>
	        	<p style="font-size: 13px">Bagikan: </p>
	        	<a href="https://www.facebook.com/sharer/sharer.php??u={{ route('products.show', ['id' => $product['id']]) }}&display=popup" class="social-button" target="_blank">
	        		<i class="fab fa-2x fa-facebook mb-4"></i>
	        	</a>

	        	<a href="https://www.twitter.com/intent/tweet?text=my share text&amp;url={{ route('products.show', ['id' => $product['id']]) }}" class="social-button" target="_blank"> 
	        		<i class="fab fa-2x fa-twitter mb-4"></i>
	        	</a>

	        	<a href="https://wa.me/?text={{ route('products.show', ['id' => $product['id']]) }}" class="social-button" target="_blank"> 
	        		<i class="fab fa-2x fa-whatsapp mb-4"></i>
	        	</a>
	        </div>
	        <!-- end share social media -->	
        </div>
       

		<div class="col-md-9">
			<h3>
				{{ $product->name }}
			</h3>
			<br>
			<h4 style="color: grey;">
				$ {{ $product->price }}
			</h4>
			<br>
			<h5 style="color: orange;">
				<!-- @for($x = 0; $x < $rating; $x++) 
                    @if(floor($rating) - $x>= 1)
                        <i class="fa fa-star"></i>
                    @elseif($rating - $x > 0)
                        <i class="fa fa-star-half-o"></i>
                    @else
                        <i class="fa fa-star-o"></i>
                    @endif
                @endfor  -->
                <!-- <div style="color: orange;">
                
            	</div> -->
            	<?php
                $total = 0;
                $jumlah = 0;
                $avg = 0;

                foreach ($reviews as $id => $review) {
                	$total += $review->rating;
                }

                $jumlah = count($reviews->all());

                $star = 1;
                if ($jumlah<>0) {
                	$avg = $total/$jumlah;
                	while ($star <= 5) {
                		while ($star <= $avg) {
                			echo '<i class="fas fa-star fa-1x"></i>';
                			$star++;
                		}
                		while ($star <= 5) {
                			echo '<i class="far fa-star fa-1x"></i>';
                			$star++;
                		}
                	}
                }

                else {
                	while ($star <= 5) {
                		echo '<i class="far fa-star fa-1x"></i>';
                		$star++;
                	}
                }

                ?>

				<p style="font-size: 13px">( {{ floatval($rating) }} )</p>
			</h5>

			<div class="mt-4">
				<a href="{{ url('public') }}" class="btn btn-warning text-white">Back</a>
				<a href="{{ route('carts.add', ['id' => $product['id']]) }}" class="btn btn-primary">Beli</a>
			</div>

			<br>
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item"><a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a></li>

				<li class="nav-item"><a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Review</a></li>
			</ul>

			<div class="tab-content py-3 px-3 px-sm-0" id="myTabContent">
				<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">{!! $product->description !!}</div>
				<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					@if (Auth::check())
					<form action="{{ route('posts.review') }}" method="POST" enctype="multipart/form-data">
						
						@csrf

						<input type="text" name="product_id" value="{{ $product['id'] }}" hidden>
						<div class="form-group">
							<label>Rating</label>
							<br>
							<span class="star-rating star-5">
								<input type="radio" name="rating" value="1"><i></i>
								<input type="radio" name="rating" value="2"><i></i>
								<input type="radio" name="rating" value="3"><i></i>
								<input type="radio" name="rating" value="4"><i></i>
								<input type="radio" name="rating" value="5"><i></i>
							</span>
						</div>
						<div class="form-group">
							<label for="desc">Ulasan</label>
							<input class="form-control" type="text" name="description" placeholder="Deskripsi Produk" id="ckview">
						</div>

						<script src="{{ url('plugins/tinymce/jquery.tinymce.min.js') }}"></script>
						<script src="{{ url('plugins/tinymce/tinymce.min.js') }}"></script>
						<script type="text/javascript"> tinymce.init({ selector: '#ckview' }); </script>


						<div class="form-group">
							<label for="desc">Pengiriman</label>
							<input class="form-control" type="text" name="comen" placeholder="Deskripsi Pengiriman" id="">
						</div>

						<button type="submit" class="btn btn-primary"><a href="{{ route('products.show',$product->id) }}"></a> Submit</button>
					</form>
					@endif
					<br>

					@foreach ($description as $komentar)
					<div class="container">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-2">
										<img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
										<p class="text-secondary text-center">{{ Carbon\Carbon::parse($komentar->created_at)->diffForHumans() }}</p>
										<p>
									</div>
									<div class="col-md-10">

										<p>
											<strong class="text-primary">
												{{ $komentar->name }}
											</strong>
										</p>
										<div class="clearfix"></div>
										<p>{!! $komentar->description !!}</p>
										<p>Pengiriman : {{ $komentar->comen }}</p>
										
											<a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>
											<a class="float-right btn text-white btn-primary"> <i class="fa fa-heart"></i> Like</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<br>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@section('extra-js')
<script>
    (function() {
        const currentImage = document.querySelector('#currentImage');
        const images = document.querySelectorAll('.product-thumbnail');

        images.forEach((element) => element.addEventListener('click', thumbnailClick));

        function thumbnailClick(e) {
            currentImage.src = this.querySelector('img').src;
        }
    })();
</script>
@endsection