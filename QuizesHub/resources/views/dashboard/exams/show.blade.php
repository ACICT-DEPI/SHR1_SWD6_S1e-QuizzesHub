
{{-- @dd($exam) --}}


@extends('dashboard.layout.master')

@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <form class="form-horizontal" action="" enctype="" method="">
                            <div class="card-body card-block">
                                {{-- university_id --}}
                                <div class="form-group">
                                    <label for="university_id" class="form-control-label">Univerty Id</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                        <input type="text" class="form-control" value="{{ $exam->course->university->name }}" class="form-control" disabled>
                                    </div>
                                </div>
                                {{-- faculty_id --}}
                                <div class="form-group">
                                    <label for="faculty_id" class="form-control-label">Faculty Id</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                        <input type="text" class="form-control" value="{{ $exam->course->faculty->name }}" disabled>
                                    </div>
                                </div>
                                {{-- course_id --}}
                                <div class="form-group">
                                    <label for="course_id" class="form-control-label">Course Id</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                        <input type="text" class="form-control" value="{{ $exam->course->course->name }}" disabled>
                                    </div>
                                </div>
                                {{-- course_name --}}
                                <div class="form-group">
                                    <label for="course_name" class="form-control-label">Course Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                        <input type="text" class="form-control" value="{{ $exam->course->course->name }}" disabled>
                                    </div>
                                </div>
                                {{-- type --}}
                                <div class="form-group">
                                    <label for="type" class="form-control-label">Type</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                        <input type="text" class="form-control" value="{{ $exam->type }}" disabled>
                                    </div>
                                </div>
                                {{-- date --}}
                                <div class="form-group">
                                    <label for="date">Date Of Examination</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                        <input type="text" class="form-control" value="{{ $exam->date }}" disabled>
                                    </div>
                                </div>
                                {{-- duration --}}
                                <div class="form-group">
                                    <label for="duration">Time Of Exam</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                        <input type="text" class="form-control" value="{{ $exam->duration }}" disabled>
                                    </div>
                                </div>
                                {{-- created_at --}}
                                <div class="form-group">
                                    <label for="created_at">Created At</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                        <input type="text" class="form-control" value="{{ $exam->created_at }}" disabled>
                                    </div>
                                </div>
                                {{-- updated_at --}}
                                <div class="form-group">
                                    <label for="updated_at">Updated At</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                        <input type="text" class="form-control" value="{{ $exam->updated_at }}" disabled>
                                    </div>
                                </div>
                                {{-- deleted_at --}}
                                <div class="form-group">
                                    <label for="deleted_at">Deleted At</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                        <input type="text" class="form-control" value="{{ $exam->deleted_at }}" disabled>
                                    </div>
                                </div>
                            </div>
                        </form>
                        
                        <?php $it = 1; ?>
                        <form class="form-horizontal" action="" enctype="" method="">
                            <div class="card-body card-block">
                                {{-- question --}}
                                @foreach ($exam->questions as $question)
                                <div class="form-group">
                                    <label for="question" class="form-control-label">Question {{ $it++ }}</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">{{$question->type}}</div>
                                        <input type="text" class="form-control" value="{{ $question->text }}" class="form-control" disabled>
                                    </div>
                                    
                                    <label class="form-control-label">Answers</label>
                                    @foreach ($question->answers as $answer)
                                        <div class="input-group">
                                            <div class="input-group-addon">normal_text</div>
                                            <input type="text" class="form-control" value="{{ $answer->text }}" class="form-control" disabled>
                                            <input type="radio" name="{{$it}}" @if($answer->is_correct) checked @endif disabled>
                                        </div>
                                    @endforeach
                                </div>
                                <hr>
                                @endforeach
                            </div>
                        </form>
                        </form>
                    <a href="#" class="btn btn-success">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->
@endsection