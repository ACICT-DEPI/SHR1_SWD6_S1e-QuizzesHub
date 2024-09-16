@extends('dashboard.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if (Session::has('msg'))
                        <alert class="alert alert-success">
                            {{ Session::get('msg') }}
                        </alert>
                    @endif


                    <form class="form-horizontal" action="{{ route('admin.users.update',$user->id) }}" enctype="multipart/form-data"
                        method="post">
                        @csrf
                        @method('put')
                        <div class="card-body card-block">



                            <div class="form-group">
                                <label class=" form-control-label" for="fname">fName</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <input type="text" id="fname" value="{{ $user->fname }}"
                                        class="form-control @error('fname') is-invalid @enderror" name="fname">
                                    @error('fname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label" for="lname">lName</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <input type="text" id="lname" value="{{ $user->lname }}"
                                        class="form-control @error('lname') is-invalid @enderror" name="lname">
                                    @error('lname')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label" for="username">Username</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <input type="text" id="username" value="{{ $user->username }}"
                                        class="form-control @error('username') is-invalid @enderror" name="username">
                                    @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label" for="email">Email</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <input type="email" id="email"  value="{{ $user->email }}"
                                        class="form-control @error('email') is-invalid @enderror" name="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label" for="phone">Phone</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <input type="text" id="phone" value="{{ $user->phone }}"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label" for="password">Password</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <input type="password" id="password" value=""
                                        class="form-control @error('password') is-invalid @enderror" name="password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label" for="image_path">Photo</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <input type="file" id="image_path"
                                        class="form-control @error('image_path') is-invalid @enderror" name="image_path">
                                    @error('image_path')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                @if(!empty($user->image_path) && file_exists(public_path('storage/' . $user->image_path)))
                                <img src="{{ asset('storage/' . $user->image_path) }}" width="100px" height="100px">
                                @endif
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label">Gender</label>
                                <div class="col-md-9">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input " id="male" name="gender"
                                            value="M" @if( $user->gender == 'M') checked @endif />
                                        <label class="form-check-label mb-0" for="male">Male</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="female" name="gender"
                                            value="F" @if ($user->gender == 'F') checked @endif />
                                        <label class="form-check-label mb-0" for="female">Female</label>
                                    </div>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="form-group row">
                                <label class="col-sm-3 text-end control-label col-form-label">Role</label>
                                <div class="col-md-9">
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input " id="user" name="role"
                                            value="user" @if ($user->role == 'user') checked @endif />
                                        <label class="form-check-label mb-0" for="user">User</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="radio" class="form-check-input" id="admin" name="role"
                                            value="admin" @if ($user->role == 'admin') checked @endif />
                                        <label class="form-check-label mb-0" for="admin">Admin</label>
                                    </div>
                                    @error('role')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <label class=" form-control-label" for="university_id">University</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                    <select class="form-control @error('university_id') is-invalid @enderror"
                                        name="university_id" id="university_id">
                                        <option value="">Select University</option>
                                        @foreach ($universities as $university)
                                            <option value="{{ $university->id }}" @selected($user->university_id == $university->id)>
                                                {{ $university->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('university_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" form-control-label" for="faculty_id">Faculty</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                    <select class="form-control @error('faculty_id') is-invalid @enderror"
                                        name="faculty_id" id="faculty_id">
                                        <option value="">Select Faculty</option>
                                        @foreach ($faculties as $faculty)
                                            <option value="{{ $faculty->id }}" @selected($user->faculty_id == $faculty->id)>
                                                {{ $faculty->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('faculty_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" form-control-label" for="major_id">Major</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-laptop"></i></div>
                                    <select class="form-control @error('major_id') is-invalid @enderror" name="major_id"
                                        id="major_id">
                                        <option value="">Select Major</option>
                                        @foreach ($majors as $major)
                                            <option value="{{ $major->id }}" @selected($user->major_id == $major->id)>
                                                {{ $major->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('major_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label class=" form-control-label" for="level_id">Levels</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-laptop"></i></div>
                                    <select class="form-control @error('level_id') is-invalid @enderror" name="level_id"
                                        id="level_id">
                                        <option value="">Select Level</option>
                                        @foreach ($levels as $level)
                                            <option value="{{ $level->id }}" @selected($user->level_id== $level->id)>
                                                {{ $level->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('level_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>




                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm" id="submit">
                                <i class="fa fa-dot-circle-o"></i> Update User
                            </button>

                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
