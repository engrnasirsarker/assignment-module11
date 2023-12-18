@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>All Products</h4>
        </div>
        <div class="card-body">
            <a href="{{url('/products/create')}}" class="btn btn-success">Add New Product</a>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->price}}</td>
                        <td>
                            <a href="{{url('/products/edit/'.$product->id)}}" 
                                class="btn btn-primary">
                                Update Price Or Quantity
                            </a>
                            <a class="btn btn-danger" href="{{url('/products/delete/'.$product->id)}}">
                                Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection