@extends('layouts.app')

@section('title', 'Tambah Produk')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/codemirror/lib/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset('library/codemirror/theme/duotone-dark.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
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
                {{-- <h2 class="section-title">Editor</h2>
                <p class="section-lead">WYSIWYG editor and code editor.</p> --}}

                <div class="row">
                    <div class="col-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Masukkan data produk</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-left font-weight-bold col-12 col-md-3 col-lg-3">Judul<br /><span
                                            class="font-weight-light">Masukkan judul produk<br /> anda disini</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-left font-weight-bold col-12 col-md-3 col-lg-3">Kategori<br /><span
                                            class="font-weight-light">Pilih kategori yang sesuai<br /> dengan produk
                                            anda</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric">
                                            <option>Tech</option>
                                            <option>News</option>
                                            <option>Political</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-left font-weight-bold col-12 col-md-3 col-lg-3">Deskripsi<br /><span
                                            class="font-weight-light">Masukkan deskripsi produk<br /> anda
                                            disini</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote-simple"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Publish</button>
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
                                <h4>Masukkan harga produk</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-left font-weight-bold col-12 col-md-3 col-lg-3">Harga<br /><span
                                            class="font-weight-light">Masukkan judul produk<br /> anda disini</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-left font-weight-bold col-12 col-md-3 col-lg-3">Kategori<br /><span
                                            class="font-weight-light">Pilih kategori yang sesuai<br /> dengan produk
                                            anda</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric">
                                            <option>Tech</option>
                                            <option>News</option>
                                            <option>Political</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label
                                        class="col-form-label text-md-left font-weight-bold col-12 col-md-3 col-lg-3">Deskripsi<br /><span
                                            class="font-weight-light">Masukkan deskripsi produk<br /> anda
                                            disini</span></label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote-simple"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7">
                                        <button class="btn btn-primary">Publish</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

    <!-- Page Specific JS File -->
@endpush
