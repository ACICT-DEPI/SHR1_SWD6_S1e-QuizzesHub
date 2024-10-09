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
        #timer {
            margin: 5% auto;
            padding: 5px;
            border: 5px solid white;
            border-radius: 20%;
        }
        .question-container {
            /* height: 300px; */
        }
        #control-btns {
            margin: 1% auto;
        }
    </style>
</head>
<body>
    <?php 
        if(session('submited') && session('submited')=='yes') {
            session(['submited' => 'no']);
            header('Location: /');
            exit();
        }
        ?>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">QizzesHub</strong>
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
                                        
                                        <div class="d-flex justify-content-center mt-5">
                                            <button class="btn btn-success btn-lg" id="begin-btn">Begin</button>
                                        </div>
                                    </div>
                                    <div class="card-footer text-center text-muted">
                                        Good Luck {{ Auth::user()->fname}}!
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" id="quiz-screen" style="display: none">
                            <form id="submit-quiz-form" class="form-horizontal" action="{{ route('quiz.submit', $exam->id) }}" enctype="" method="POST" name="form">
                                @csrf
                                <div class="card-body card-block">
                                    <div id="timer" class="btn btn-primary">

                                    </div>
                                    <input type="hidden" id="timer-input" name="timer_input" value="">

                                    @foreach($exam->questions as $index => $question)
                                        <div class="question-container" style="display: none;" id="question-{{ $index }}">
                                            <label>[{{ $index + 1 }}] {{ $question->text }}</label>

                                            <!-- If it's MCQ or true/false -->
                                            @if($question->type == 'mcq' || $question->type == 'true_false')
                                                @foreach($question->answers as $answer)
                                                    <div>
                                                        <input type="radio" name="question[{{ $question->id }}]" value="{{ $answer->id }}" id="answer-{{ $answer->id }}">
                                                        @if($answer->type == 'normal_text')
                                                            <label for="answer-{{ $answer->id }}">{{ $answer->text }}</label>
                                                        @elseif($answer->type == 'image_path')
                                                            <label for="answer-{{ $answer->id }}"><img src="{{asset('storage/'. $answer->text)}}" alt="" width="100" height="100"></label>
                                                        @endif
                                                    </div>
                                                @endforeach

                                            <!-- If it's an essay question -->
                                            @elseif($question->type == 'essay')
                                                @foreach ($question->answers as $answer)
                                                    <div>
                                                        <input type="radio" name="question[{{ $question->id }}]" value="{{ $answer->id }}"  id="answer-{{ $answer->id }}">
                                                        <label for="answer-{{ $answer->id }}">{{ $answer->text }}</label>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    @endforeach
                                    <input type="range" class="form-range" id="range" step="1" value="1" min="1" max="{{ count($exam->questions->toArray()) }}">

                                </div>
                                
                                {{-- buttons --}}
                                <div id="control-btns">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <button class="page-link" type="button" id="prev-question" style="opacity: 0.5;">&laquo;</button>
                                            {{-- <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                                <span class="sr-only">Previous</span>
                                            </a> --}}
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#"><span id="currentQuestion"></span>/{{ count($exam->questions->toArray()) }}</a></li>
                                        <li class="page-item">
                                            <button class="page-link" type="button" class="btn btn-primary" id="next-question">&raquo;</button>
                                            <button class="page-link" type="submit" class="btn btn-success" id="submit-quiz" style="display: none;">Submit Answers</button>
                                        </li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
    </div><!-- .content -->

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var totalTime = {{ $exam->duration * 60 }};
            // var totalTime = 10;

            let currentQuestionIndex = 0;
            let totalQuestions = {{ count($exam->questions) }};
            let questionContainers = document.querySelectorAll('.question-container');
            
            document.getElementById('begin-btn').addEventListener('click', function() {
                const interval = setInterval(() => {
                const minutes = Math.floor(totalTime / 60);
                const seconds = totalTime % 60;
                document.getElementById('timer').textContent = `${String(minutes).padStart(2, '0')}:${String(seconds).padStart(2, '0')}`;
                document.getElementById('timer-input').value = totalTime;
                totalTime--;

                if (totalTime < 0) {
                    clearInterval(interval);
                    document.getElementById('submit-quiz-form').submit();
                }
            }, 1000);

                document.getElementById('begin-screen').style.display = 'none';
                document.getElementById('quiz-screen').style.display = 'block';
            });

            document.getElementById('question-0').style.display = 'block';
            document.getElementById('currentQuestion').textContent = `${currentQuestionIndex+1}`;
            document.getElementById('range').value = `${currentQuestionIndex+1}`;

            // Show the next question
            document.getElementById('next-question').addEventListener('click', function() {
                if(currentQuestionIndex == 0) {
                    document.getElementById('prev-question').style.opacity = 1;
                }
                if(currentQuestionIndex < totalQuestions-1) {
                    questionContainers[currentQuestionIndex++].style.display = 'none';
                    questionContainers[currentQuestionIndex].style.display = 'block';
                }
                if (currentQuestionIndex == totalQuestions - 1) {
                    document.getElementById('next-question').style.display = 'none';
                    document.getElementById('submit-quiz').style.display = 'inline-block';
                }
                document.getElementById('currentQuestion').textContent = currentQuestionIndex+1;
                document.getElementById('range').value = `${currentQuestionIndex+1}`;
            });

            // Show the previous question
            document.getElementById('prev-question').addEventListener('click', function() {
                if(currentQuestionIndex == totalQuestions-1) {
                    document.getElementById('next-question').style.display = 'inline-block';
                    document.getElementById('submit-quiz').style.display = 'none';
                }
                if(currentQuestionIndex > 0) {
                    questionContainers[currentQuestionIndex--].style.display = 'none';
                    questionContainers[currentQuestionIndex].style.display = 'block';
                }
                if (currentQuestionIndex == 0) {
                    document.getElementById('prev-question').style.opacity = 0.5;
                }
                document.getElementById('currentQuestion').textContent = currentQuestionIndex+1;
                document.getElementById('range').value = `${currentQuestionIndex+1}`;
            });

            // Before submit the exam, display a confirm
            document.getElementById('submit-quiz-form').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent form submission

                let confirmation = confirm("Are you sure you want to submit this form?");
                if (confirmation) {
                    this.submit(); // If the user confirms, submit the form
                }
                document.form.reset();
            });
        });
    </script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
</body>
</html>



