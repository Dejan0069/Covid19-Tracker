@extends('layouts.main')

@section('content')
<div class="container-fluid mt-5 mb-5 ">
    <!-- Global -->
    <div class="row m-3">
        <div class="col-md-3">
            <div class="card shadow" style="width: 18rem;">
                <div class="card-body">
                    <h4 class="card-title text-info">Active</h4>
                    <h3 class="card-text">{{$active}}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow" style="width: 18rem;">
                <div class="card-body">
                    <h4 class="card-title text-secondary">Deaths</h4>
                    <h3 class="card-text">{{$deaths}}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow" style="width: 18rem;">
                <div class="card-body ">
                    <h4 class="card-title text-success">Recovered</h4>
                    <h3 class="card-text">{{$recovered}}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow" style="width: 18rem;">
                <div class="card-body">
                    <h4 class="card-title text-danger">Confirmed</h4>
                    <h3 class="card-text">{{$confirmed}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="container-fluid mt-5 mb-5 ">
    <div class="row">
        <!-- Daily -->
        <div class="col-md-3">

            <div class="col border-right border-danger mt-5">
                <h3 class="text-danger">Daily Confirmed:</h3>
                <span class="display-4">{{$dailyConfirmed}}</span>
            </div>

            <div class="col border-right border-success mt-5">
                <h3 class="text-success">Daily Recovered:</h3>
                <span class="display-4">{{$dailyRecovered}}</span>
            </div>

            <div class="col border-right border-secondary mt-5">
                <h3 class="text-secondary">Daily Deaths:</h3>
                <span class="display-4">{{$dailyDeaths}}</span>
            </div>

        </div>
        <!-- Chart -->
        <div class="col-md-9">
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>
    </div>

</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-5 mt-5">
            <canvas id="monthChart" ></canvas>
        </div>

        <div class="col-md-5 offset-1 mt-5">
            <canvas id="threeMonthsChart" ></canvas>
        </div>
    </div>


</div>

@endsection