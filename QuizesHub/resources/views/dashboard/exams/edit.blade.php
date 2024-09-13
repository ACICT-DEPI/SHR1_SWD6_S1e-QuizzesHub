<?php 
    // echo '<pre>';
    //     print_r($universities);
    // echo '</pre>';
    // echo '<pre>';
    //     print_r($faculties);
    // echo '</pre>';
    // echo '<pre>';
    //     print_r($courses);
    // echo '</pre>';


    // die();
?>


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

                    <form class="form-horizontal" action="{{ route('admin.exams.update', $exam['id']) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')
                        <div class="card-body card-block">
                            {{-- type --}}
                            <div class="form-group">
                                <label for="type" class="form-control-label">Type</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <select name="type" id="type" class="form-control">
                                        <option value="midterm" @if($exam['type']=='midterm' ) selected @endif>midterm
                                        </option>
                                        <option value="oral" @if($exam['type']=='oral' ) selected @endif>oral</option>
                                        <option value="final" @if($exam['type']=='final' ) selected @endif>final</option>
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
                                        value="{{ $exam['course_name'] }}"
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
                                        <option value="{{$course['id']}}" @if($exam['course_id'] == $course['id']) selected @endif>{{$course['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('course_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- faculty_id --}}
                            <div class="form-group">
                                <label for="faculty_id" class="form-control-label">Faculty Id</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <select name="faculty_id" id="faculty_id" class="form-control @error('course_name') is-invalid @enderror">
                                        @foreach ($faculties as $faculty)
                                        <option value="{{$faculty['id']}}" @if($exam['faculty_id'] == $course['id']) selected @endif>{{$faculty['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('faculty_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            {{-- university_id --}}
                            <div class="form-group">
                                <label for="university_id" class="form-control-label">Univerty Id</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <select name="university_id" id="university_id" class="form-control @error('course_name') is-invalid @enderror">
                                        @foreach ($universities as $university)
                                        <option value="{{$university['id']}}" @if($exam['university_id'] == $course['id']) selected @endif>{{$university['name']}}</option>
                                        @endforeach
                                    </select>
                                    @error('university_id')
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
                                        value="{{ $exam['date'] }}"
                                        class="form-control @error('course_name') is-invalid @enderror"
                                    >
                                    {{-- @error --}}
                                </div>
                            </div>
                            {{-- duration --}}
                            <div class="form-group">
                                <label for="duration">Time Of Exam</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <input 
                                        type="number"
                                        id="duration"
                                        name="duration"
                                        value="{{ $exam['duration'] }}"
                                        class="form-control @error('course_name') is-invalid @enderror"
                                        placeholder="Time In Minutes"
                                    >
                                    {{-- @error --}}
                                    @error('duration')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm" id="submit">
                                <i class="fa fa-dot-circle-o"></i> Update Exam
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection