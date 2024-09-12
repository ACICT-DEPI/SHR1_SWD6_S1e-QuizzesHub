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


                    <form class="form-horizontal" action="{{ route('admin.universities.store') }}" enctype="multipart/form-data"
                        method="post">
                        @csrf

                        <div class="card-body card-block">



                            <div class="form-group">
                                <label class=" form-control-label" for="name">University Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <input type="text" id="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" name="name" placeholder="University Name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            {{-- <div class="form-group">
                                <label class=" form-control-label" for="faculty_id">FacultyName</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                    <select class="form-control @error('faculty_id') is-invalid @enderror" name="faculty_id"
                                        id="faculty_id" multiple>
                                        @foreach ($faculties as $faculty)
                                            <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('faculty_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div> --}}

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm" id="submit" >
                                <i class="fa fa-dot-circle-o"></i> Add University
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
