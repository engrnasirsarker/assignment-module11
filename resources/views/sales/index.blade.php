@extends('layouts.master')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h4>All Sale Transaction</h4>
        </div>
        <div class="card-body">
            <a href="{{url('/sale/create')}}" 
                class="btn btn-success">
                Add New Sale
            </a>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Product</th>
                        <th>Sale Quantity</th>
                        <th>Unit Price</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transactions as $sale)
                    <tr>
                        <td>{{$sale->date}}</td>
                        <td>{{$sale->name}}</td>
                        <td>{{$sale->quantity}}</td>
                        <td>{{$sale->unit_price}}</td>
                        <td>{{$sale->total}}</td>
                        <td>
                            
                            <a class="btn btn-danger" href="{{url('/sale/delete/'.$sale->id)}}">
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