@extends('dashboard.layout.master')

@section('content')

<div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Level</th>
                                            <td>{{$LevelData->name}}</td>
                                            </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td>{{ $LevelData->description}}</td>
                                        </tr>
                                        <tr>
                                       
                                       
                                    </thead>
                                   
                                </table>
                                <style>
                                    th{
                                        background-color: rgb(231, 76, 60);
                                        color: white;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
@endsection