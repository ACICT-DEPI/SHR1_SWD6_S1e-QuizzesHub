<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                                                <p><strong>Number of Correct Answer:</strong> {{ $score }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center text-muted">
                                        Good Luck {{ Auth::user()->fname}} ^_^
                                    </div>
                                    @if($regard < 0)
                                    <alert class="alert alert-danger">
                                        You Have Lose {{ $regard }} points. Be carful, you should pass 60% of the exam. if u lost your points u will not able to take another exam
                                    </alert>
                                    @elseif($regard > 0)
                                    <alert class="alert alert-success">
                                        You Have Gain {{ $regard }} points.
                                    </alert>
                                    @else
                                    <alert class="alert alert-success">
                                        We don't have refernce answers now, but the number before the answer indicate that number of studnets that select this answer
                                    </alert>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body" id="quiz-screen">
                            <form class="form-horizontal" action="{{ route('quiz.submit', $exam->id) }}" enctype="" method="POST">
                                @csrf
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
                                                    <small class="badge bg-info">{{ count($answer->AnswerQuestionUser) }}</small>
                                                    <input
                                                        @if(in_array($answer->id, $user_answers)) checked @endif
                                                        type="radio" name="question[{{ $question->id }}]" value="{{ $answer->id }}" id="answer-{{ $answer->id }}">
                                                    <?php // echo $answer->is_correct; ?>
                                                    <label @if($regard!=0) @if($answer->is_correct === 1) class='correct_answer' @endif @if(in_array($answer->id, $user_answers)) class='wrong_answer' @endif @endif
                                                        for="answer-{{ $answer->id }}">{{ $answer->text }}</label>
                                                </div>
                                            @endforeach

                                        <!-- If it's an essay question -->
                                        @elseif($question->type == 'essay')
                                            @foreach ($question->answers as $answer)
                                            <div>
                                                <input
                                                    @if(in_array($answer->id, $user_answers)) checked @endif
                                                    type="radio" name="question[{{ $question->id }}]" value="{{ $answer->id }}"  id="answer-{{ $answer->id }}">
                                                <label @if($answer->is_correct === 1) class='correct_answer' @endif @if(in_array($answer->id, $user_answers)) class='wrong_answer' @endif
                                                    for="answer-{{ $answer->id }}">answer by your self</label>
                                            </div>

                                            @endforeach
                                        @endif
                                    </div>
                                @endforeach

                            </div>
                        </form>

                        <form action="">
                            {{-- feedback for exam --}}
                            <div class="form-group">
                                <div class="input-group">
                                    <a
                                        href="{{ route('quiz.feedback', $exam->id)}}"
                                        class="form-control btn btn-primary"
                                    >FeedBack</a>
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
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <script>
        // عندما يتم تحديث الصفحة، سيتم توجيه المستخدم إلى صفحة أخرى
        window.onload = function() {
            if (performance.navigation.type === performance.navigation.TYPE_RELOAD) {
                window.location.href = "/quiz/".$exam->id."/show"; // استبدل "/new-page" بالصفحة التي تريد تحويل المستخدم إليها
            }
        }
    </script>
</body>
</html>
