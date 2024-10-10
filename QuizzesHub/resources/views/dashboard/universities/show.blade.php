@extends('dashboard.layout.master')

@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    @if (Session::has('msg'))
                        <alert class="alert alert-success">
                            {{ Session::get('msg') }}
                        </alert>
                    @endif
                    <div class="card-header" style="text-align: center;">
                        <strong class="card-title" >{{ $university->name }} </strong>
                    </div>
                    <div class="card-body">

                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <tr>
                                <th>University Name</th>
                                <td>{{ $university->name }}</td>
                            </tr>
                            <tr>
                                <th>Faculties</th>
                                <td>
                                    @if ($university->faculties->count() == 0)
                                        <span class="badge badge-danger">No Faculties</span>
                                    @else
                                        <ul style="padding-left:10px">
                                            @foreach ($university->faculties as $faculty)
                                                <li>{{ $faculty->name }}</li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
@endsection
