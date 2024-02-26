@extends('layouts.app')

@section('title', 'Daftar Produk')

@push('style')
    <!-- CSS Libraries -->
    <style>
        .table-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        td {
            vertical-align: middle;
        }
    </style>
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Produk</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Produk</a></div>
                    <div class="breadcrumb-item">Daftar Produk</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Simple Table</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table-bordered table-md table">
                                        <tr>
                                            <th class="col-1">Image</th>
                                            <th class="col-2">Nama Produk</th>
                                            <th class="col-3">Kategori</th>
                                            <th class="col-2">Varian</th>
                                            <th class="col-1">Stok</th>
                                            <th class="col-1">Harga</th>
                                            <th class="col-1">Status</th>
                                            <th class="col-1">Action</th>
                                        </tr>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>
                                                    <img class="table-img"
                                                        src="{{ asset('storage/' . $product->images->first()->path) }}">
                                                </td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->category }}</td>
                                                @if ($product->variants->isNotEmpty())
                                                    @php
                                                        $variantNames = $product->variants->pluck('variant_name')->implode(' - ');
                                                        $totalStock = $product->variants->sum('stock');
                                                    @endphp
                                                    <td>{{ $variantNames }}</td>
                                                    <td>{{ $totalStock }}</td>
                                                    <td>{{ $product->variants->first()->price }}</td>
                                                @endif
                                                <td>
                                                    <div class="badge badge-success">Active</div>
                                                </td>
                                                <td><a href="#" class="btn btn-secondary">Detail</a></td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <nav class="d-inline-block">
                                    <ul class="pagination mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1"><i
                                                    class="fas fa-chevron-left"></i></a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1 <span
                                                    class="sr-only">(current)</span></a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#"><i class="fas fa-chevron-right"></i></a>
                                        </li>
                                    </ul>
                                </nav>
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

    <!-- Page Specific JS File -->
@endpush
