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

                    {{-- @livewire('CreateExam') --}}
                    {{-- @livewire('create-user-form') --}}
                    @livewire('create-exam-form')
                </div>
            </div>
        </div>
    </div>
@endsection
