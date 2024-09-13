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
                                    <th>Name</th>
                                    <td>{{ $user->fname . ' ' . $user->lname }}</td>
                                </tr>
                                <tr>
                                    <th>Username</th>
                                    <td>{{ $user->username }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Phone</th>
                                    <td>{{ $user->phone }}</td>
                                </tr>
                                <tr>
                                    <th>Image</th>
                                    <td>
                                    @if(!empty($user->image_path))
                                    <img src="{{ asset('storage/' . $user->image_path) }}" width="100px" height="100px">
                                    @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>Gender</th>
                                    <td>{{ $user->gender }}</td>
                                </tr>
                                <tr>
                                    <th>Role</th>
                                    <td>{{ $user->role }}</td>
                                </tr>
                                <tr>
                                    <th>University</th>
                                    <td>{{ $user->University->name }}</td>
                                </tr>
                                <tr>
                                    <th>faculty</th>
                                    <td>{{ $user->faculty->name }}</td>
                                </tr>
                                <tr>
                                    <th>Major</th>
                                    <td>{{ $user->major->name }}</td>
                                </tr>
                                <tr>
                                    <th>Level</th>
                                    <td>{{ $user->level->name }}</td>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
@endsection
