@extends('layouts.parent')

@section('title', 'Dashboard')

@section('main', 'Dashboard')

@section('location')
    <div class="breadcrumb-item">Dashboard Admin</div>
@endsection

@section('content')
    <div class="card-body">
        {{-- card --}}
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="card card-statistic-1">
                    <a href="{{ route('admin.tampil_supplier') }}" class="stretched-link"></a>
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Supplier</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalSuppliers }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="card card-statistic-1">
                    <a href="{{ route('admin.tampil_item') }}" class="stretched-link"></a>
                    <div class="card-icon bg-success">
                        <i class="fas fa-cube"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Item</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalItems }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-12">
                <div class="card card-statistic-1">
                    <a href="{{ route('admin.tampilkategori') }}" class="stretched-link"></a>
                    <div class="card-icon bg-warning">
                        <i class="fas fa-thumbtack"></i>
                    </div>
                    <div class="card-wrap">
                        <div class="card-header">
                            <h4>Total Category</h4>
                        </div>
                        <div class="card-body">
                            {{ $totalCategories }}
                        </div>
                    </div>
                </div>
            </div>
            @if (Auth::user()->role == 'admin')
                <div class="col-lg-3 col-12">
                    <div class="card card-statistic-1">
                        <a href="{{ route('admin.tampil_staff') }}" class="stretched-link"></a>
                        <div class="card-icon bg-danger">
                            <i class="far fa-id-badge"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Staff</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalStaff }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        {{-- card end --}}

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Stock Status</h4>
                    <div class="card-header-action">
                        <div class="btn-group">
                            <a href="#" class="btn btn-primary">Week</a>

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="myChart" height="182" data-statistic="[640, 387, 530, 302, 430, 270, 700]"
                        data-labels='["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jumat", "Sabtu"]'></canvas>
                    <div class="statistic-details mt-sm-4">
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-success"><i class="fas fa-caret-down"></i></span>
                                23%</span>
                            <div class="detail-value">100</div>
                            <div class="detail-name">Today's Stock In</div>
                        </div>
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-up"></i></span>
                                15%</span>
                            <div class="detail-value">50</div>
                            <div class="detail-name">Today's Stock Out</div>
                        </div>
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-success"><i class="fas fa-caret-down"></i></span>
                                9%</span>
                            <div class="detail-value">12,821</div>
                            <div class="detail-name">This Month's Stock In</div>
                        </div>
                        <div class="statistic-details-item">
                            <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-up"></i></span>
                                19%</span>
                            <div class="detail-value">92,142</div>
                            <div class="detail-name">This Month's Stock Out</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
