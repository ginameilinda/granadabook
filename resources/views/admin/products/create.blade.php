@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <h1 class="text-center" style="text-shadow: 1px 1px 10px rgba(0,0,0,0.5); color: white;">Tambah Produk</h1>

                <div class="card-body">
                    <div class="col-md-12">
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
                        <form action="{{ route('admin.products.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label><b>Judul Buku</b></label>
                                <input type="text" class="form-control" placeholder="Judul Buku" name="name">
                            </div>
                            <div class="form-group">
                                <label><b>Harga</b></label>
                                <input type="number" class="form-control" placeholder="Harga Buku" name="price">
                            </div>
                            <div class="form-group">
                                <label for="images"><b>Gambar Sampul</b></label>
                                <input type="file" class="form-control-file" name="images[]" multiple>
                            </div>
                            <div class="form-group">
                                <label><b>Description</b></label>
                                <textarea type="number" class="form-control" rows="3" name="description" id="description"></textarea>
                            </div>
                            
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

@section('scripts')
    <script src="{{ url('plugins/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ url('plugins/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#description'
        });
    </script>
@endsection
