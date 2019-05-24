@extends('layouts.app')
@section('content')
<div class="container col-md-8">
    <div class="row justify-content-center">
        <div class="col">
            <h1 style="text-shadow: 1px 1px 10px rgba(0,0,0,0.5); text-align: center; color: white;">Edit Produk</h1>
            <br />

                <div class="row">
                    <div class="col">
                        @if(count($errors))
                        <div class="form-group">
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        @endif
                        <form action="{{ route('admin.products.update',$product->id) }}" enctype="multipart/form-data" method="POST">
                            @csrf @method('PATCH')
                            <div class="form-group">
                                <label><b>Judul Buku</b></label>
                                <input type="text" class="form-control" placeholder="Judul Buku" name="name" value={{ $product->name}}>
                            </div>
                            <div class="form-group">
                                <label><b>Harga</b></label>
                                <input type="number" class="form-control" placeholder="Harga Buku" name="price" value={{ $product->price}}>
                            </div>
                            <div class="form-group">
                                <label><b>Deskripsi</b></label>
                                <textarea type="number" class="form-control" rows="3" name="description" id="description">{!! $product->description !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="images"><b>Gambar Sampul</b></label>
                                <input type="file" class="form-control-file" name="images[]" id="images" multiple>
                            </div>
                            <br>
                            <div class="form-group">
                                <a href="{{ route('admin.products.index') }}" class="btn btn-warning text-white">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="{{ url('plugins/tinymce/jquery.tinymce.min.js') }}"></script>
<script src="{{ url('plugins/tinymce/tinymce.min.js') }}"></script>
<script type="text/javascript"> tinymce.init({ selector: '#description' }); </script>