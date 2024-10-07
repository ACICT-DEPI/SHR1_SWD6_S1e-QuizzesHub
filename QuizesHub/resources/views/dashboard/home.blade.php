@extends('dashboard.layout.master')

@section('styles')
<meta name="csrf-token" content="{{ csrf_token() }}">

@endsection

@section('content')

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">Universities With Most Students </h4>
                        <canvas id="universitiesChart"></canvas>
                    </div>
                </div>
            </div><!-- /# column -->

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">Top Users </h4>
                        <canvas id="topUsersBarChart"></canvas>
                    </div>
                </div>
            </div><!-- /# column -->

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mb-3">Popular Courses</h4>
                        <canvas id="popularCoursesBarChart"></canvas>
                    </div>
                </div>
            </div><!-- /# column -->
        </div>

    </div><!-- .animated -->
</div><!-- .content -->
@endsection

@section('scripts')
    <script src="{{ asset('dashboard/assets/js/') }}/chart.js/dist/Chart.bundle.min.js"></script>
    <script src="{{ asset('dashboard/assets/js/') }}/chart.js/chartjs-init.js"></script>
@endsection
