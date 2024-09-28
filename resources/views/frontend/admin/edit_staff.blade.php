@extends('layouts.parent')

@section('title', 'Admin')

@section('subtitle', 'Edit Staff')
@section('main', 'Edit Staff')

@section('location')
    <div class="breadcrumb-item"><a href="{{ route('admin.tampil_staff') }}">Manage Staff</a></div>
    <div class="breadcrumb-item">Edit Staff</div>
@endsection

@section('content')
    <div class=" mt-5">
        <div class="alert-field">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow rounded">
                        @if (!$staffUser)
                            <div class="card-body">
                                <div class="alert alert-danger">User not found</div>
                            </div>
                        @else
                            <div class="card-body">
                                <form action="{{ route('admin.edit_staff.process', $staffUser->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ $staffUser->name }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ $staffUser->email }}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Jabatan</label>
                                        <input type="text" class="form-control" id="role" name="role"
                                            value="{{ $staffUser->role }}" readonly>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </form>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    @endsection
