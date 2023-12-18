@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>Create Sale</h4>
            
            <a href="{{url('/sale/index')}}" class="btn btn-dark">
                Back
            </a>
        </div>
        <div class="card-body">       
            <form action="{{route('sale.store')}}" method="POST">
                @csrf
                <div class="mb-3 row">
                    <label for="date" class="col-sm-3 col-form-label text-end">
                        Date
                    </label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="date"  name="date">
                        @error('date')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="name" class="col-sm-3 col-form-label text-end">
                        Product Name
                    </label>
                    <div class="col-sm-8">
                        <select name="product_id" id="name" class="form-control">
                            <option value="">Select Product</option>
                            @foreach($products as $product)
                                <option value="{{$product->id}}">
                                    {{$product->name}} - Price {{$product->price}}
                                </option>
                            @endforeach
                        </select>
                        @error('product_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror                        
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="qty" class="col-sm-3 col-form-label text-end">
                        Sale Quantity
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
                        Product Unit Price
                    </label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="price" placeholder="Enter Product Price" name="unit_price">
                        @error('unit_price')
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