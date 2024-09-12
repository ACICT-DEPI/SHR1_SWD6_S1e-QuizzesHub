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

                    <form class="form-horizontal" action="{{ route('admin.exams.store') }}" enctype="multipart/form-data"
                        method="post">
                        @csrf
                        <div class="card-body card-block">
                            {{-- type --}}
                            <div class="form-group">
                                <label for="type" class="form-control-label">Type</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <select name="type" id="type" class="form-control">
                                        <option value="midterm" @if(old('type')=='midterm' ) selected @endif>midterm
                                        </option>
                                        <option value="oral" @if(old('type')=='midterm' ) selected @endif>oral</option>
                                        <option value="final" @if(old('type')=='midterm' ) selected @endif>final</option>
                                    </select>
                                </div>
                            </div>
                            {{-- course_name --}}
                            <div class="form-group">
                                <label for="course_name" class="form-control-label">Course Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <input 
                                        type="text" 
                                        name="course_name" 
                                        id="course_name"
                                        value="{{old('course_name')}}"
                                        placeholder="Enter Name Of Course Exam"
                                        class="form-control @error('course_name') is-invalid @enderror"
                                    >
                                    @error('course_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- course_id --}}
                            <div class="form-group">
                                <label for="course_id" class="form-control-label">Course Id</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <select name="course_id" id="course_id" class="form-control @error('course_name') is-invalid @enderror">
                                        @foreach ($courses as $course)
                                        <option value="{{$course['id']}}">{{$course['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- date --}}
                            <div class="form-group">
                                <label for="date">Date Of Examination</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <input 
                                        type="date"
                                        id="date"
                                        name="date"
                                        value="{{old('date')}}"
                                        class="form-control @error('course_name') is-invalid @enderror"
                                    >
                                    {{-- @error --}}
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm" id="submit">
                                <i class="fa fa-dot-circle-o"></i> Add Exam
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection