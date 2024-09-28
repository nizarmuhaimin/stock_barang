@extends('layouts.parent')

@section('title', 'Admin')

@section('main', 'Dashboard')

@section('location')
    <div class="breadcrumb-item"><a href="/admin">Dashboard Admin</a></div>
    <div class="breadcrumb-item">Tambah Data Barang</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="container py-5">
                    <div class="d-flex align-items-center justify-content-center flex-column">
                        <h1>Tambah Kategori</h1>
                        <div class="row w-100 mt-5">
                            <div class="col-12 col-md-8 col-lg-6 mx-auto d-flex flex-column align-items-center">
                                <form action="#" method="POST" enctype="multipart/form-data" class="w-75">
                                    <label for="name">Nama Kategori</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Kategori"
                                        name="kategori">
                                    <button class="btn btn-success" type="submit">Submit</button>
                                    <a href="#" class="btn btn-primary">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
