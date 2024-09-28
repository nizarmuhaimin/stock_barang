@extends('layouts.parent')

@section('title', 'Admin')

@section('subtitle', 'Edit Item')
@section('main', 'Edit Item')

@section('location')
    <div class="breadcrumb-item"><a href="{{ route('admin.tampil_item') }}">Manage Items</a></div>
    <div class="breadcrumb-item">Edit Item</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="container py-5">
                    <div class="d-flex align-items-center justify-content-center flex-column">
                        <h1>Edit Item</h1>
                        <div class="row w-100 mt-5">
                            <div class="col-12  mx-auto d-flex flex-column align-items-center">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                @if (!$item)
                                    <div class="alert alert-danger">Item not found</div>
                                @else
                                    <form action="{{ route('admin.crud-update-item', $item->id) }}" method="POST"
                                        enctype="multipart/form-data" class="w-75">
                                        @csrf
                                        @method('PUT')
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" placeholder="Item Name" name="nama"
                                            value="{{ $item->name }}">
                                        <div class="form-outline" data-mdb-input-init>
                                            <label class="form-label" for="form12">Category</label>
                                            <select class="form-control" name="id_kategori">
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id_kategori }}"
                                                        {{ $item->id_kategori == $category->id_kategori ? 'selected' : '' }}>
                                                        {{ $category->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-outline" data-mdb-input-init>
                                            <label class="form-label" for="form12">SKU</label>
                                            <input type="text" id="form12" class="form-control"
                                                placeholder="Masukkan kode SKU" name="SKU" value="{{ $item->SKU }}">
                                        </div>
                                        <div class="form-outline" data-mdb-input-init>
                                            <label class="form-label" for="form12">Description</label>
                                            <input type="text" id="form12" class="form-control"
                                                placeholder="Item Description" name="description"
                                                value="{{ $item->description }}">
                                        </div>
                                        <br>
                                        <label class="form-label" for="customFile">Choose Image</label>
                                        <input type="file" class="form-control" accept="image/*" name="gambar"
                                            id="gambar">
                                        <br>
                                        @if ($item->gambar)
                                            <label for="existing-image">Current Image:</label><br>
                                            <img src="{{ asset('storage/' . $item->gambar) }}"
                                                alt="Gambar {{ $item->name }}" width="150">
                                            <br><br>
                                        @endif
                                        <button class="btn btn-success" type="submit">Save Changes</button>
                                        <a href="{{ route('admin.tampil_item') }}" class="btn btn-danger">Batal</a>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
