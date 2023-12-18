@extends('layouts.master')
@section('content')
<div class="container">
    <h3>Dashboard</h3>
    <p>Sale Report</p>
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$todaySale}}</h5>
                    <p class="card-text">Today </p>                    
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$yesterdaySale}}</h5>
                    <p class="card-text">Yestarday </p>
                    
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$thisMonthSale}}</h5>
                    <p class="card-text">This Month </p>
                    
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$lastMonthSale}}</h5>
                    <p class="card-text">Last Month </p>
                    
                </div>
            </div>
        </div>
       
    </div>
</div>
@endsection