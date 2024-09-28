<?php 

?>


@extends('dashboard.layout.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if (Session::has('msg'))
                    <alert class="alert alert-success">
                        {{ Session::get('msg') }}
                    </alert>
                    @endif

                    @livewire('CreateExam')
                </div>
            </div>
        </div>
    </div>
@endsection