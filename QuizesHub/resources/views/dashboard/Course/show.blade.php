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
                                            <th>Course_Name</th>
                                            <td>{{$CourseData->name}}</td>
                                            </tr>
                                        <tr>
                                            <th>Course_Code</th>
                                            <td>{{$CourseData->code}}</td>
                                        </tr>
                                        <tr>
                                            <th>Major_Name</th>
                                            <td>{{ $CourseData->major->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Faculty_Name</th>
                                            <td>{{ $CourseData->major->faculty->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>University_Name</th>
                                            <td>{{ $CourseData->major->faculty->university->name}}</td>
                                        </tr>
                                      
                                       
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