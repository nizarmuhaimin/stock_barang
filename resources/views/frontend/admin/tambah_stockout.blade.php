@extends('layouts.parent')

@if (Auth::user()->role == 'admin')
    @section('title', 'Admin')
@else
    @section('title', 'Staff')
@endif

@section('subtitle', 'Add Stock Out')
@section('main', 'Add Stock Out')

@section('location')
    <div class="breadcrumb-item"><a href="{{ route('admin.stockout') }}">Stock Out</a></div>
    <div class="breadcrumb-item">Add Stock Out</div>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        <form action="{{ route('admin.store_stockout') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="id_items">Item:</label>
                                <select name="id_items" id="id_items" class="form-control">
                                    @foreach ($items as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="id_supplier">Supplier:</label>
                                <select name="id_supplier" id="id_supplier" class="form-control">
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->nama_supplier }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="quantity">Quantity:</label>
                                <input type="number" name="quantity" id="quantity" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="received_at">Received At:</label>
                                <input type="datetime-local" name="received_at" id="received_at" class="form-control"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-md btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
