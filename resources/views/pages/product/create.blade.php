@extends('layouts.app')

@section('title', 'Tambah Produk')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('library/codemirror/theme/duotone-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">

    <link rel="stylesheet" href="{{ asset('css/product/create-product.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Tambah Produk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Produk</a></div>
                    <div class="breadcrumb-item">Tambah Produk</div>
                </div>
            </div>

            <div class="section-body">
                <form action="{{ route('product.store') }}" enctype="multipart/form-data" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Masukkan data produk</h4>
                                </div>
                                <div class="card-body">
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-left font-weight-bold col-12 col-md-3 col-lg-3">Nama
                                            produk<br /><span class="font-weight-light">Masukkan judul produk<br /> anda
                                                disini</span></label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                                name="name" value="{{ old('name') }}">
                                            @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-left font-weight-bold col-12 col-md-3 col-lg-3">Kategori<br /><span
                                                class="font-weight-light">Pilih kategori yang sesuai <br /> dengan produk
                                                anda</span></label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control selectric" name="category" id="parent-category">
                                                <option value="">Pilih kategori</option>
                                                @foreach ($parentCategories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <label
                                            class="col-form-label text-md-left font-weight-bold col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7" id="child-category-div">
                                            <select class="form-control selectric" name="category" id="child-category">
                                                <option value="">Pilih sub kategori</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label
                                            class="col-form-label text-md-left font-weight-bold col-12 col-md-3 col-lg-3">Deskripsi<br /><span
                                                class="font-weight-light">Masukkan deskripsi produk<br /> anda
                                                disini</span></label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="form-control @error('description') @enderror" name="description" data-height="150"></textarea>
                                            @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Masukkan foto produk</h4>
                                </div>
                                <div class="card-body">
                                    <div class="upload-container" id="upload-container">
                                        <input id="file-upload" name="product_images[]" type="file" multiple
                                            accept="image/*">
                                        <div class="preview-container" id="preview-container">
                                            <label for="file-upload" class="upload-btn">
                                                Pilih Gambar
                                            </label>
                                        </div>
                                    </div>
                                    <p class="font-weight-light mt-4">Masukkan gambar produk maksimal 6 foto, pastikan
                                        menggunakan format jpg, jpeg, png,
                                        <br />disarankan gambar menggunakan ukuran 300x300 agar tidak terpotong
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Masukkan harga & varian produk</h4>
                                </div>
                                <div class="card-body">
                                    <ul class="list-unstyled list-unstyled-border list-unstyled-noborder" id="variant-form">
                                        <li>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-left font-weight-bold col-12 col-md-3 col-lg-3">Varian<br /><span
                                                        class="font-weight-light">Masukkan nama varian<br /> produk
                                                        anda disini</span></label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="text" class="form-control" name="variant[1][name]"
                                                        value="{{ old('variant[1][name]') }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-left font-weight-bold col-12 col-md-3 col-lg-3">Harga<br /><span
                                                        class="font-weight-light">Masukkan harga produk<br /> anda
                                                        disini</span></label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="number" class="form-control" name="variant[1][price]"
                                                        value="{{ old('variant[1][price]') }}" required>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-4">
                                                <label
                                                    class="col-form-label text-md-left font-weight-bold col-12 col-md-3 col-lg-3">Stok<br /><span
                                                        class="font-weight-light">Masukkan jumlah stok produk<br /> anda
                                                        disini</span></label>
                                                <div class="col-sm-12 col-md-7">
                                                    <input type="number" class="form-control" name="variant[1][stock]"
                                                        value="{{ old('variant[1][stock]') }}" required>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button class="btn btn-icon icon-left btn-outline-secondary mr-2"
                                                type="button"><i class="fa-solid fa-plus"></i> Tambah varian</button>
                                            <button class="btn btn-primary">Simpan produk</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>
    <script src="{{ asset('library/codemirror/lib/codemirror.js') }}"></script>
    <script src="{{ asset('library/codemirror/mode/javascript/javascript.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <script src="{{ asset('library/upload-preview/upload-preview.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/product/create-product.js') }}"></script>
@endpush
