@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if(!$product->images()->get()->isEmpty())
            <div class="mySlides">
                <div class="product-section-image">
                    <img src="{{ asset('/images/'.$product->images()->get()[0]->image_src) }}" class="card-img-top" id="currentImage" height="360">
                </div>

                <div class="product-section-images">
                    @foreach($product->images()->get() as $image)
                    <div class="product-thumbnail mt-3">
                        <img src="{{ asset('/images/'.$image->image_src) }}" class="card-img-top" height="70">
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


        <div class="col-md-6">
            <h3>
                {{ $product->name }}
            </h3>

            <br>

            <h4 style="color: grey;">
                $ {{ $product->price }}
            </h4>

            <div class="mt-4">
                <a href="{{ route('admin.products.index') }}" class="btn btn-warning text-white">Back</a>
                <a href="{{ route('carts.add', ['id' => $product['id']]) }}" class="btn btn-primary">Beli</a>
            </div><br>

            <br>
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Deskripsi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Review</a>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"><br>{!! $product->description !!}</div>
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">tab2</div>
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