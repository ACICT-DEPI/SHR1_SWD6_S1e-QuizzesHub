@extends('dashboard.layout.master')

@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12 table-responsive">
                <div class="card table-responsive">
                    <div class="card-header" style="text-align: center;">
                        <strong class="card-title">{{ $major->name }} </strong>
                    </div>
                    <div class="card-body table-responsive">

                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <tr>
                                <th>Major Name</th>
                                <td>{{ $major->name }}</td>
                            </tr>

                            <tr>
                                <th>Faculties</th>
                                <td>
                                    @if ($major->faculties->count() == 0)
                                        <span class="badge badge-danger">No Faculties</span>
                                    @else
                                        <ul style="padding-left:10px">
                                            @foreach ($major->faculties as $faculty)
                                                <li>{{ $faculty->name }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Courses</th>
                                <td>
                                    @if ($major->courses->count() == 0)
                                        <span class="badge badge-danger">No Courses</span>
                                    @else
                                        <ul style="padding-left:10px">
                                            @foreach ($major->courses as $course)
                                                <li>{{ $course->name }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                            </tr>



                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->

@endsection
