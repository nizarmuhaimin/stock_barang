@extends('layouts.parent')

@section('title', 'Admin')

@section('subtitle', 'Manage Items')
@section('main', 'Manage Items')

@section('location')
    <div class="breadcrumb-item">Manage Items</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    {{-- Hanya Tabel Data Item --}}
                    <div class="alert-field">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                    </div>
                    <div class="table-responsive">
                        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Search for..."
                                    aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                                        class="fas fa-search"></i></button>
                            </div>
                        </form>
                        {{-- table --}}
                        <div class="table-responsive">
                            <div
                                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h4>All Items</h4>
                                @if (Auth::user()->role == 'admin')
                                    <div class="d-grid d-md-flex justify-content-md-end" style="gap: 5px">
                                        <a href="{{ route('admin.crud-tambah') }}"
                                            class="btn btn-success bi bi-file-earmark-plus-fill">
                                            New Item</a>
                                        <a href="{{ route('admin.generate_pdf') }}"
                                            class="btn btn-primary bi bi-file-earmark-arrow-down position-relative">Download
                                            Data</a>
                                    </div>
                                @endif
                            </div>

                        </div>
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>NAME</th>
                                    <th>DESCRIPTION</th>
                                    <th>CATEGORY</th>
                                    <th>SKU</th>
                                    <th>IMAGE</th>
                                    <th>CREATED DATE</th>
                                    @if (Auth::user()->role == 'admin')
                                        <th>ACTION</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($items as $key => $item)
                                    <tr>
                                        <td>{{ $key + 1 }}</td> <!-- Menambahkan variabel iterasi dan menambah 1 -->
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->description }}</td>
                                        <td>{{ $item->kategori->name }}</td>
                                        <td>{{ $item->SKU}}</td>
                                        <td><img src="{{ asset('storage/' . $item->gambar) }}"
                                                alt="Gambar {{ $item->name }}" width="50"></td>
                                        <td>{{ $item->created_at }}</td>
                                        @if (Auth::user()->role == 'admin')
                                            <td>
                                                <div class="btn-group" role="group"
                                                    aria-label="Basic mixed styles example">
                                                    <a href="{{ route('admin.crud-edit-item', $item->id) }}"
                                                        class="btn btn-success fa fa-edit"></a>
                                                    <form action="{{ route('admin.hapus-item', $item->id) }}"
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
