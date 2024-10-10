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
                                    @if(!empty($user->image_path) && file_exists(public_path('storage/' . $user->image_path)))
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
                                    <th>Score</th>
                                    <td>{{ $user->score }}</td>
                                </tr>
                                <tr>
                                    <th>University</th>
                                    @if(!empty($user->University))
                                    <td>{{ $user->University->name }}</td>
                                    @else
                                    <td>Not Set</td>
                                    @endif

                                </tr>
                                <tr>
                                    <th>faculty</th>
                                    @if(!empty($user->faculty))
                                    <td>{{ $user->faculty->name }}</td>
                                    @else
                                    <td>Not Set</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Major</th>
                                    @if(!empty($user->major))
                                    <td>{{ $user->major->name }}</td>
                                    @else
                                    <td>Not Set</td>
                                    @endif
                                </tr>
                                <tr>
                                    <th>Level</th>
                                    @if(!empty($user->level))
                                    <td>{{ $user->level->name }}</td>
                                    @else
                                    <td>Not Set</td>
                                    @endif
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
@endsection
