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
                                            <th>User_Name</th>
                                            <td>{{ $UserData->user->fname." ".$UserData->user->lname}}</td>
                                            </tr>
                                        <tr>
                                            <th>University</th>
                                            <td>{{ $UserData->user->University->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>faculty</th>
                                            <td>{{ $UserData->user->faculty->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Course</th>
                                            <td>{{ $UserData->exam->course->name}}</td>
                                        </tr>
                                        <tr>
                                            <th>Level</th>
                                            <td>{{ $UserData->user->level->name}}</td>
                                        </tr>
                                        <tr>

                                            <th>Exam_Type</th>
                                            <td>{{ $UserData->exam->type }}</td>
                                        </tr>
                                        <tr>
                                            <th>Exam_Date</th>
                                            <td>{{ $UserData->exam->date}}</td>
                                        </tr>
                                        <tr>
                                            <th>Rating</th>
                                            <td>{{ $UserData->rating}}</td>
                                        </tr>
                                        <tr>
                                            <th>Comments</th>
                                            <td>{{ $UserData->comments}}</td>
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