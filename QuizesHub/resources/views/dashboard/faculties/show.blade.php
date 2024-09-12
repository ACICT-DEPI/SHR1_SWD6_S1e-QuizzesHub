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
                                <th>University Name</th>
                                <td>{{ $faculty->university->name }}</td>
                            </tr>
                            <tr>
                                <th>Created at</th>
                                <td>{{ $faculty->created_at->format('y-m-d') }}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->

@endsection
