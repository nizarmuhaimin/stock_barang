@extends('layouts.parent')

@section('title', 'Admin')

@section('main', 'Manajemen Staff')

@section('location')
    <div class="breadcrumb-item">Data Staff</div>
@endsection

@section('content')
    {{-- <div class="container mt-5"> --}}
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">NO</th>
                                <th scope="col">NAMA</th>
                                <th scope="col">JABATAN</th>
                                <th scope="col">EMAIL</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staffUsers as $index => $user)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>{{ $user->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
@endsection
