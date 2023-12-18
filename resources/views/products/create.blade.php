@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Create Product</h4>
            <a href="{{url('/')}}" class="btn btn-info">Dashboard</a>
            <a href="{{url('/products/index')}}" class="btn btn-dark">
                Back
            </a>
        </div>
        <div class="card-body">       
            <form action="{{route('product.store')}}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="name" class="col-sm-3 col-form-label text-end">
                        Product Name
                    </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" placeholder="Enter Product Name" name="name">
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror                        
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="qty" class="col-sm-3 col-form-label text-end">
                        Product Quantity
                    </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="qty" placeholder="Enter Product Quantity" name="qty">
                        @error('qty')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="price" class="col-sm-3 col-form-label text-end">
                        Product Price
                    </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="price" placeholder="Enter Product Price" name="price">
                        @error('price')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-3 col-form-label text-end">
                       
                    </label>
                    <div class="col-sm-8">
                        <button class="btn btn-primary"
                            type="submit">
                            Submit
                        </button>
                    </div>
                </div>

            </form>
            
        </div>
    </div>
</div>
@endsection