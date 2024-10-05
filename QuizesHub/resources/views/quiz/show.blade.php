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
    <style>
        .correct_answer {
            background-color: lightgreen;
        }
        .wrong_answer {
            background-color: tomato;
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
                            <div class="container mt-5">
                                <div class="card shadow-lg">
                                    <div class="card-header text-center bg-primary text-white">
                                        <h3>{{ $exam->course->university->name }}</h3>
                                        <h5>{{ $exam->course->faculty->name }}</h5>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title text-center">Course: {{ $exam->course->course->name }} [{{ $exam->course->course->code }}]</h4>

                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <p><strong>Major:</strong> {{ $exam->course->major->name }}</p>
                                                <p><strong>Type:</strong> {{ $exam->type}}</p>
                                                <p><strong>Date:</strong> {{ $exam->date}}</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p><strong>Duration:</strong> {{ $exam->duration }}</p>
                                                <p><strong>Number of Questions:</strong> {{ count($exam->questions->toArray()) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center text-muted">
                                        Good Luck {{ Auth::user()->fname}}!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" id="quiz-screen">
                            {{-- <form class="form-horizontal" action="{{ route('quiz.submit', $exam->id) }}" enctype="" method="POST"> --}}
                                {{-- @csrf --}}
                                <div class="card-body card-block">

                                <!-- Loop through questions -->
                                @foreach($exam->questions as $index => $question)
                                <hr>
                                    <div class="question-container"  id="question-{{ $index }}">
                                        <label>[{{ $index + 1 }}] {{ $question->text }}</label>

                                        <!-- If it's MCQ or true/false -->
                                        @if($question->type == 'mcq' || $question->type == 'true_false')
                                            @foreach($question->answers as $answer)
                                                <div>
                                                    <input
                                                        type="radio" name="question[{{ $question->id }}]" value="{{ $answer->id }}" id="answer-{{ $answer->id }}">
                                                    <?php // echo $answer->is_correct; ?>
                                                    <label @if($answer->is_correct === 1) class='correct_answer' @endif
                                                        for="answer-{{ $answer->id }}">{{ $answer->text }}</label>
                                                </div>
                                            @endforeach

                                        <!-- If it's an essay question -->
                                        @elseif($question->type == 'essay')
                                            @foreach ($question->answers as $answer)
                                            <div>
                                                <input
                                                    type="radio" name="question[{{ $question->id }}]" value="{{ $answer->id }}"  id="answer-{{ $answer->id }}">
                                                <label @if($answer->is_correct === 1) class='correct_answer' @endif
                                                    for="answer-{{ $answer->id }}">answer by your self</label>
                                            </div>

                                            @endforeach
                                        @endif
                                    </div>
                                    <div class="comment">
                                        @if (Session::has('message'))
                                            <div class="alert alert-success">
                                                {{ Session::get('message') }}
                                            </div>
                                        @endif
                                        <form action="{{ route('comment.store') }}" method="post">
                                            @csrf
                                            <input type="text" name="question_id" value="{{$question->id}}">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <textarea name="comment" id="comment" cols="30" rows="2" class="form-control" placeholder="comment.."></textarea>
                                                    <button type="submit" class="btn btn-primary">Send</button>
                                                </div>
                                                <label for="comment">if u have any comments or issue let us to solve it</label>
                                                @error('comment')
                                                    <div class="alert alert-danger">
                                                        <span>{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="input-group">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endforeach

                            </div>
                        {{-- </form> --}}

                        <form action="">
                            {{-- feedback for exam --}}
                            <div class="form-group">
                                <div class="input-group">
                                    <button class="form-control" class="btn btn-primary">FeedBack</button>
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
