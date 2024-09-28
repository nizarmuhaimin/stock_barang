@extends('layouts.parent')

@section('title', 'Admin')

@section('subtitle', 'Edit Category')
@section('main', 'Edit Category')

@section('location')
    <div class="breadcrumb-item"><a href="{{ route('admin.tampilkategori') }}">Manage Categories</a></div>
    <div class="breadcrumb-item">Edit Category</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    @if (!$category)
                        <div class="alert alert-danger" role="alert">
                            Category not found
                        </div>
                    @else
                        <form
                            action="{{ route('admin.crud-update-kategori.process', ['id_kategori' => $category->id_kategori]) }}"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Kategori</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $category->name }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Kategori</button>
                        </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
