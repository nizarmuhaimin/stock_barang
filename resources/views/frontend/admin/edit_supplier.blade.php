@extends('layouts.parent')

@section('title', 'Admin')

@section('subtitle', 'Edit Supplier')
@section('main', 'Edit Supplier')

@section('location')
    <div class="breadcrumb-item"><a href="{{ route('admin.tampil_supplier') }}">Manage Supplier</a></div>
    <div class="breadcrumb-item">Edit Supplier</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow rounded">
                @if (!$supplier)
                    <div class="card-body"></div>
                    <div class="alert alert-danger" role="alert">
                        Supplier not found
                    </div>
                @else
                    <div class="card-body">
                        <form action="{{ route('admin.edit_supplier.process', $supplier->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="nama_supplier" class="form-label">Nama Supplier</label>
                                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier"
                                    value="{{ $supplier->nama_supplier }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="kontak" class="form-label">Kontak</label>
                                <input type="text" class="form-control" id="kontak" name="kontak"
                                    value="{{ $supplier->kontak }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $supplier->alamat }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Supplier</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
