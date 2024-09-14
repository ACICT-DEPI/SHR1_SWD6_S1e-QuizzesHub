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
                                            <th>Code</th>
                                            <td>{{$CourseData->code}}</td>
                                        </tr>
                                        <tr>
                                            <th>MajorsOfCourse</th>
                                            <td>
                                                @foreach($CourseInfo as $course)
                                                    <li>{{$course->major->name.' - '. $course->faculty->name }}</li>
                                                    @endforeach
                                              
                                            </td>
                                         </tr>                                
                                                                       
                                       
                                    </thead>
                                   
                                </table>
                                <style>
                                    th{
                                        background-color: rgb(231, 76, 60);
                                        color: white;
                                    }
                                </style>
                                <a href="" class="btn btn-primary">Add to another major and faculty</a>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
@endsection