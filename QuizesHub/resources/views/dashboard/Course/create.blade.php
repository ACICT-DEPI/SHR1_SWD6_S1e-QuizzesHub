@extends('dashboard.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if (Session::has('messege'))
                        <alert class="alert alert-success">
                            {{ Session::get('messege') }}
                        </alert>
                    @endif


                    <form class="form-horizontal" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data"
                        method="post">
                        @csrf

                        <div class="card-body card-block">



                            <div class="form-group">
                                <label class=" form-control-label" for="name">Course_Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <input type="text" id="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" name="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @php
                                $majorId = request('major_id');
                            @endphp


                            <div class="form-group">
                                <label class=" form-control-label" for="major_id">Major_Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-laptop"></i></div>
                                    <select class="form-control @error('major_id') is-invalid @enderror" name="major_id"
                                        id="major_id">
                                        @foreach ($AllMajors as $major)
                                            <option value="{{ $major->id }}" @selected($majorId == $major->id)>
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
                                <label class=" form-control-label" for="faculty_id">Faculty_Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                    <select class="form-control @error('faculty_id') is-invalid @enderror" name="faculty_id"
                                        id="faculty_id">
                                        @foreach ($AllFaculties as $Faculty)
                                            <option value="{{ $Faculty->id }}">{{ $Faculty->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('faculty_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm" id="submit">
                                <i class="fa fa-dot-circle-o"></i> Add Course
                            </button>

                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
