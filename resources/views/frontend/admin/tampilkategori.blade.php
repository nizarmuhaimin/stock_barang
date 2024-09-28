@extends('layouts.parent')

@section('title', 'Admin')

@section('subtitle', 'Manage Categories')
@section('main', 'Manage Categories')

@section('location')
    <div class="breadcrumb-item">Manage Categories</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    {{-- table --}}
                    <div class="table-responsive">
                        <div
                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h4>All Categories</h4>
                            @if (Auth::user()->role == 'admin')
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                    <a href="{{ route('admin.crud-tambah-kategori') }}"
                                        class="btn btn-success bi bi-file-earmark-plus-fill">New Category</a>
                                </div>
                            @endif
                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>CATEGORY</th>
                                    @if (Auth::user()->role == 'admin')
                                        <th>ACTION</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $index => $category)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        @if (Auth::user()->role == 'admin')
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <a href="{{ route('admin.crud-edit-kategori', ['id_kategori' => $category->id_kategori]) }}"
                                                        class="btn btn-success fa fa-edit"></a>

                                                    <form
                                                        action="{{ route('admin.crud-delete-kategori', ['id_kategori' => $category->id_kategori]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-danger fa fa-trash"
                                                            onclick="return confirm('Are you sure?')"></button>
                                                    </form>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- table end --}}
                </div>
            </div>
        </div>
    </div>
@endsection
