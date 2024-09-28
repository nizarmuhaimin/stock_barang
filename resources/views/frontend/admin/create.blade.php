@extends('layouts.parent')

@section('title', 'Admin')

@section('subtitle', 'Add Item')
@section('main', 'Add Item')

@section('location')
    <div class="breadcrumb-item"><a href="{{ route('admin.tampil_item') }}">Manage Items</a></div>
    <div class="breadcrumb-item">Add Item</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="container py-5">
                    <div class="d-flex align-items-center justify-content-center flex-column">
                        <h1>Add Item</h1>
                        <div class="row w-100 mt-5">
                            <div class="col-12 col-md-8 col-lg-6 mx-auto d-flex flex-column align-items-center">
                                <form action="{{ route('admin.crud-tambah.process') }}" method="POST"
                                    enctype="multipart/form-data" class="w-75">
                                    @csrf
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" placeholder="Item Name" name="nama"
                                        required>
                                    <label for="deskripsi">Description</label> <!-- Tambahkan label untuk deskripsi -->
                                    <textarea class="form-control" placeholder="Item Description" name="description" required></textarea> <!-- Tambahkan input untuk deskripsi -->
                                    <div class="form-outline" data-mdb-input-init>
                                        <label class="form-label" for="id_kategori">Category</label>
                                        <select class="form-control" name="id_kategori" required>
                                            <option value="" disabled selected>=== Select Category ===</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id_kategori }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-outline" data-mdb-input-init>
                                        <label class="form-label" for="sku">SKU</label>
                                        <input type="text" id="sku" class="form-control" placeholder="SKU code"
                                            name="sku" required>
                                    </div>
                                    <br>
                                    <label class="form-label" for="customFile">Choose Image</label>
                                    <input type="file" class="form-control" accept="image/*" name="gambar"
                                        id="gambar" required>
                                    <br>
                                    <button class="btn btn-success" type="submit">Submit</button>
                                    <a href="{{ route('admin.tampil_item') }}" class="btn btn-danger">Cancel</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
