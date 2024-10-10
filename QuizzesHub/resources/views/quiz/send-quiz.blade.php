@extends('site.layout.master')
@section('content')
    <form action="">
        contact
    </form>
    <hr>
    <form action="">
        {{-- university_id --}}
        <div class="form-group">
            <label for="university_id" class="form-control-label">University</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="menu-icon fa fa-bank"></i></div>
                <select wire:model.live="selectedUniversity" class="form-control">
                    <option>Choose University</option>
                    @foreach($universities as $university)
                        <option value="{{ $university->id }}">{{ $university->name }}</option>
                    @endforeach
                </select>
            </div>
            @error('selectedUniversity')
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </div>
            @enderror
        </div>
        {{-- faculty_id --}}
        <div class="form-group">
            <label for="faculty_id" class="form-control-label">Faculty</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="menu-icon fa fa-bank"></i></div>
                @if(!is_null($faculties))
                    <select wire:model.live="selectedFaculty" class="form-control">
                        <option value="">Choose Faculty</option>
                        @foreach($faculties as $faculty)
                            <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        </div>
        {{-- major_id --}}
        <div class="form-group">
            <label for="major_id" class="form-control-label">Major</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="menu-icon fa fa-laptop"></i></div>
                @if(!is_null($majors))
                    <select wire:model.live="selectedMajor" class="form-control">
                        <option value="">Choose Major</option>
                        @foreach($majors as $major)
                            <option value="{{ $major->id }}">{{ $major->name }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        </div>
        {{-- course_id --}}
        <div class="form-group">
            <label for="course_id" class="form-control-label">Course</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                @if(!is_null($courses))
                    <select wire:model.live="selectedCourse" class="form-control">
                        <option value="">Choose Course</option>
                        @foreach($courses as $course)
                            <option value="{{ $course->id }}">{{ $course->name }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        </div>
        {{-- type --}}
        <div class="form-group">
            <label for="type" class="form-control-label">Type</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="menu-icon fa fa-paperclip"></i></div>
                <select wire:model.live="examType" class="form-control">
                    <option value="midterm">Midterm</option>
                    <option value="final">Final</option>
                    <option value="oral">Oral</option>
                    <option value="sheet">Sheet</option>
                </select>
            </div>
        </div>
    </form>
@endsection