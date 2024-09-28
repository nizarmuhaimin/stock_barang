@extends('layouts.parent')

@section('title', 'Admin')

@section('subtitle', 'Edit Stock In')
@section('main', 'Edit Stock In')

@section('location')
    <div class="breadcrumb-item"><a href="{{ route('admin.stockin') }}">Stock In</a></div>
    <div class="breadcrumb-item">Edit Stock In</div>
@endsection

@section('content')
    <div class=" mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        @if (!$stockIn)
                            <div class="alert alert-danger" role="alert">
                                Stock not found
                            </div>
                    </div>
                @else
                    <form action="{{ route('admin.edit_stockin.process', $stockIn->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="id_items">Item:</label>
                            <select name="id_items" id="id_items" class="form-control">
                                @foreach ($items as $item)
                                    <option value="{{ $item->id }}" @if ($item->id == $stockIn->id_items) selected @endif>
                                        {{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_supplier">Supplier:</label>
                            <select name="id_supplier" id="id_supplier" class="form-control">
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" @if ($supplier->id == $stockIn->id_supplier) selected @endif>
                                        {{ $supplier->nama_supplier }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control"
                                value="{{ $stockIn->quantity }}" required>
                        </div>
                        <div class="form-group">
                            <label for="received_at">Received At:</label>
                            <input type="datetime-local" name="received_at" id="received_at" class="form-control"
                                value="{{ date('Y-m-d\TH:i', strtotime($stockIn->received_at)) }}" required>
                        </div>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
