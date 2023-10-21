@extends('layouts.admin')
@section('title','Dashboard')
@section('content')
    <div class="row">
        <div class="col-lg-3 col-xs-6">

            <div class="small-box bg-yellow-gradient">
                <div class="inner">
                    <h3>{{ number_format($todayVisitor) }}</h3>
                    <p>Today Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-xs-6">

            <div class="small-box bg-green-gradient">
                <div class="inner">
                    <h3>{{ number_format($todayVisitor) }}</h3>
                    <p>Total Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
