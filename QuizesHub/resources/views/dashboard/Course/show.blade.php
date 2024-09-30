@extends('dashboard.layout.master')

@section('content')


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
                                <td>{{ $CourseData->name }}</td>
                            </tr>
                            <tr>
                                <th>Code</th>
                                <td>{{ $CourseData->code }}</td>
                            </tr>

                            <tr>
                                <th>Majors Of Course</th>
                                <td>
                                    @if (count($CourseData->majors) > 0)
                                        <ul style="padding-left:10px">
                                            @foreach ($CourseData->majors as $major)
                                                <li>{{ $faculties[$CourseData->id . '-' . $major->id . '-' . $major->pivot->faculty_id] . ' - ' . $major->name . ' - ' . $major->pivot->degree }}
                                                </li>
                                            @endforeach
                                        @else
                                            <span class="badge badge-danger">No majors Or faculties</span>
                                    @endif
                                    </ul>

                                </td>
                            </tr>


                        </thead>

                    </table>
                    <style>
                        th {
                            background-color: rgb(231, 76, 60);
                            color: white;
                        }
                    </style>
                </div>
            </div>
        </div>
    </div>
@endsection
