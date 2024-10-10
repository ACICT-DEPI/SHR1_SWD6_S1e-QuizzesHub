@extends('dashboard.layout.master')

@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                        <strong class="card-title" >{{ $faculty->name }} </strong>
                    </div>
                    <div class="card-body">

                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <tr>
                                <th>Faculty Name</th>
                                <td>{{ $faculty->name }}</td>
                            </tr>
                            <tr>
                                <th>Universities</th>
                                <td>
                                    @if ($faculty->universities->count() == 0)
                                        <span class="badge badge-danger">No Universities</span>
                                    @else
                                        <ul style="padding-left:10px">
                                            @foreach ($faculty->universities as $university)
                                                <li>{{ $university->name }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th>Majors</th>
                                <td>
                                    @if ($faculty->majors->count() == 0)
                                        <span class="badge badge-danger">No Majors</span>
                                    @else
                                        <ul style="padding-left:10px">
                                            @foreach ($faculty->majors as $major)
                                                <li>{{ $major->name }}</li>
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
