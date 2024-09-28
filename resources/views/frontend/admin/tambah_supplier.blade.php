@extends('layouts.parent')

@section('title', 'Admin')

@section('subtitle', 'Add Supplier')
@section('main', 'Add Supplier')

@section('location')
    <div class="breadcrumb-item"><a href="{{ route('admin.tampil_supplier') }}">Manage Suppliers</a></div>
    <div class="breadcrumb-item">Add Supplier</div>
@endsection

@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('admin.tambah_supplier.process') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nama_supplier" class="form-label">Supplier</label>
                            <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" required>
                        </div>
                        <div class="mb-3">
                            <label for="kontak" class="form-label">Contact</label>
                            <input type="text" class="form-control" id="kontak" name="kontak" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Address</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Submit</button>
                        <a href="{{ route('admin.tampil_supplier') }}" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
