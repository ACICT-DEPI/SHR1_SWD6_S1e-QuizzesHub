
@extends('site.layout.master')
@section('content')
@if(!empty($exams))
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Exams</h6>
            <h1 class="mb-5">{{ $course->name }} Exams</h1>
            
        </div>
        </div>

<!-- ------------------------------------------------------------------------------- -->
<style>
    .exam-card {
            border: none;
            border-radius: 10px;
            overflow: hidden;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .exam-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        }

        .exam-card .card-header {
            background-color: #06BBCC;
            color: white;
            font-weight: bold;
            font-size: 1.2rem;
            text-align: center;
        }

        .exam-card .card-body {
            padding: 1.5rem;
        }

        .exam-card .icon {
            font-size: 1.5rem;
            color: #06BBCC;
            margin-right: 0.5rem;
        }

        .exam-card .btn-primary {
            background-color: #06BBCC;
            border-color: #06BBCC;
            /* width: 100%; */
            margin-top: 1rem;
        }

        .exam-card .btn-primary:hover {
            background-color: #06BBCC;
        }

        .exam-info {
            margin-bottom: 0.75rem;
        }

        .exam-info .icon {
            margin-right: 0.5rem;
        }

        .container {
            margin: 1% auto;
        }

</style>
<?php $x = 1; ?>
{{-- @foreach($exams as $exam)
<div class="container my-5">
    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card exam-card">
                <div class="card-header">
                    {{ $exam->type }} 
                    @if($exam->ExamUser()->where('user_id', Auth::id())->count() > 0) 
                        <i class="bi bi-check white"></i>
                    @endif
                </div>
                <div class="card-body">
                    <div class="exam-info">
                        <i class="bi bi-calendar icon"></i> {{ $exam->date }}
                    </div>
                    <div class="exam-info">
                        <i class="bi bi-clock icon"></i> {{ $exam->duration }} m
                    </div>
                    <div class="exam-info">
                        <i class="bi bi-question-circle"></i> {{ count($exam->questions->toArray())}} <strong>Question</strong>
                    </div>
                    @if($exam->ExamUser()->where('user_id', Auth::id())->count() > 0) 
                        <div class="exam-info">
                            <i class="bi bi-arrow-up-circle"></i> Higher Score: {{ $exam->ExamUser()->where('user_id', Auth::id())->orderBy('score', 'desc')->first()->score }}/{{ count($exam->questions->toArray())}}
                        </div>
                        <div class="exam-info">
                            <i class="bi bi-arrow-repeat"></i> Attemp Number: {{ $exam->ExamUser()->where('user_id', Auth::id())->count() }}
                        </div>
                    @endif
                    <div class="exam-info">
                        <form action="{{ route('quiz.quiz', $exam->id) }}" method="POST" style="display: inline">
                            @csrf
                            <button class="btn btn-primary">Start Quiz</button>
                        </form>
                        <a href="{{ route('quiz.show', $exam->id) }}" class="btn btn-primary">Show Quiz</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach --}}

<div class="container my-5">
    <div class="row">
        @if(Session::has('message'))
            <div class="alert alert-danger">
                {{ Session::get('message') }}
            </div>
        @endif 
        @foreach($exams as $exam)
            <div class="col-md-4 mb-4"> 
                <div class="card exam-card">
                    <div class="card-header">
                        {{ $exam->type }} 
                        @if($exam->ExamUser()->where('user_id', Auth::id())->count() > 0) 
                            <i class="bi bi-check2-circle"></i>

                        @endif
                    </div>
                    <div class="card-body">
                        <div class="exam-info">
                            <i class="bi bi-calendar icon"></i> {{ $exam->date }}
                        </div>
                        <div class="exam-info">
                            <i class="bi bi-clock icon"></i> {{ $exam->duration }} m
                        </div>
                        <div class="exam-info">
                                {{ count($exam->questions->toArray()) }} <strong>Questions</strong>
                        </div>
                        @if($exam->ExamUser()->where('user_id', Auth::id())->count() > 0) 
                            <div class="exam-info">
                                <i class="bi bi-arrow-up-circle"></i> Highest Score: {{ $exam->ExamUser()->where('user_id', Auth::id())->orderBy('score', 'desc')->first()->score }}/{{ count($exam->questions->toArray()) }}
                            </div>
                            <div class="exam-info">
                                <i class="bi bi-arrow-repeat"></i> Attempt Number: {{ $exam->ExamUser()->where('user_id', Auth::id())->count() }}
                            </div>
                        @endif
                        <div class="exam-info">
                            <form action="{{ route('quiz.quiz', $exam->id) }}" method="POST" style="display: inline">
                                @csrf
                                <button class="btn btn-primary">Start Quiz</button>
                            </form>
                            <a href="{{ route('quiz.show', $exam->id) }}" class="btn btn-primary">Show Quiz</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>



@endif
<!-- ------------------------------------------------------------------------------- -->
                  
        
@endsection