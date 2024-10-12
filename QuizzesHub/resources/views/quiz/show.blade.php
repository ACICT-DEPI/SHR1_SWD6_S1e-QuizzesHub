<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>show quiz</title>
    <link rel="shortcut icon" href="{{ asset('exam.ico') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- Icon Font Stylesheet -->
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <style>
        .correct_answer {
            background-color: lightgreen;
        }
        .wrong_answer {
            background-color: tomato;
        }
        .select5 {
            appearance: none;
            padding: 10px 15px;
            border: 2px solid #ccc;
            border-radius: 8px;
            background-color: #f9f9f9;
            font-size: 16px;
            color: #333;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-left: 10rem;
        }

        .select5:focus {
            outline: none;
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
        }

        .select5:hover {
            border-color: #007bff;
        }

        .option5 {
            padding: 10px;
        }

    </style>
</head>
<body>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('site.index') }}"><strong class="card-title">QuizzesHub</strong></a>
                        </div>

                        <div class="catd-body" id="begin-screen">
                            <div class="container mt-5 d-flex justify-content-center">
                                <div class="card shadow-lg w-100 w-md-75">
                                    <div class="card-header text-center bg-primary text-white">
                                        <h3 style="font-size: 1.75rem !important; font-weight: 500 !important;">{{ $exam->course->university->name }}</h3>
                                        <h5 style="font-size: 1.25rem !important; font-weight: 500 !important;">{{ $exam->course->faculty->name }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <h4 style="font-size: 1.5rem !important; font-weight: 500 !important;" class="card-title text-center">Course: {{ $exam->course->course->name }} [{{ $exam->course->course->code }}]</h4>

                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <p><i class="bi bi-code-square"></i> <strong>Major:</strong> {{ $exam->course->major->name }}</p>
                                                <p><i class="bi bi-code-square"></i> <strong>Type:</strong> {{ $exam->type}}</p>
                                                <p><i class="bi bi-calendar icon"></i> <strong>Date:</strong> {{ $exam->date}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><i class="bi bi-clock icon"></i> <strong>Duration:</strong> {{ $exam->duration }}</p>
                                                <p><i class="bi bi-question-circle"></i> <strong>Number of Questions:</strong> {{ count($exam->questions->toArray()) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center text-muted">
                                        Good Luck {{ Auth::user()->fname}} ^_^
                                    </div>
                                    <div class="card-footer text-center text-muted">
                                        - note that, the number before answer indicate for the number of students that select this answer
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" id="quiz-screen">
                            {{-- <form class="form-horizontal" action="{{ route('quiz.submit', $exam->id) }}" enctype="" method="POST"> --}}
                                {{-- @csrf --}}
                                <div class="card-body card-block">

                                    @error('comment_text')
                                        <div class="alert alert-danger">
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                    @if (Session::has('message'))
                                        <div class="alert alert-success">
                                            {{ Session::get('message') }}
                                        </div>
                                    @endif
                                <!-- Loop through questions -->
                                @foreach($exam->questions as $index => $question)
                                <hr>
                                    <div class="question-container"  id="question-{{ $index }}">
                                        <label>[{{ $index + 1 }}] {{ $question->text }}</label>

                                        <!-- If it's MCQ or true/false -->
                                        @if($question->type == 'mcq' || $question->type == 'true_false')
                                            @foreach($question->answers as $answer)
                                                <div>
                                                    <small class="badge bg-info">{{ count($answer->AnswerQuestionUser) }}</small>
                                                    <input
                                                        type="radio" name="question[{{ $question->id }}]" value="{{ $answer->id }}" id="answer-{{ $answer->id }}">
                                                    <?php // echo $answer->is_correct; ?>
                                                    <label @if($answer->is_correct === 1) class='correct_answer' @endif
                                                        for="answer-{{ $answer->id }}">
                                                        @if($answer->type == 'normal_text') {{ $answer->text }} 
                                                        @else <img src="{{asset('storage/'. $answer->text)}}" alt="" width="100" height="100">
                                                        @endif 
                                                    </label> 

                                                </div>
                                            @endforeach

                                        <!-- If it's an essay question -->
                                        @elseif($question->type == 'essay')
                                            @foreach ($question->answers as $answer)
                                            <div>
                                                <small class="badge bg-info">{{ count($answer->AnswerQuestionUser) }}</small>
                                                <input
                                                    type="radio" name="question[{{ $question->id }}]" value="{{ $answer->id }}"  id="answer-{{ $answer->id }}">
                                                <label @if($answer->is_correct === 1) class='correct_answer' @endif
                                                    for="answer-{{ $answer->id }}">{{ $answer->text }}</label>
                                            </div>

                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="comment">
                                        {{-- <form action="{{ route('comment.store') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="question_id" value="{{$question->id}}">
                                            <input type="hidden" name="parent_id" value=''>
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <textarea name="comment_text" id="comment" cols="30" rows="2" class="form-control" placeholder="if u have any comments or issue let us to solve it.."></textarea>
                                                    <button type="submit" class="btn btn-primary">Send</button>
                                                </div>

                                            </div>
                                        </form> --}}


                                            <livewire:comments :model="$question"/>



                                    </div>
                                @endforeach

                            </div>
                        {{-- </form> --}}

                        <form action="">
                            {{-- feedback for exam --}}
                            <div class="form-group">
                                <div class="input-group">
                                    <a href="{{ route('quiz.feedback', $exam->id) }}" class="btn btn-primary">FeedBack</a>
                                    {{-- <button class="form-control" class="btn btn-primary">FeedBack</button> --}}
                                </div>
                                <p>this feedback help us to solve the issues in exams</p>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

</body>
</html>

<script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
<script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
