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
</head>
<body>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">QizzesHub</strong>
                        </div>
                        <div class="card-body" id="begin-screen">
                            <form class="form-horizontal" action="" enctype="" method="">
                                <div class="card-body card-block">
                                    {{-- university_id --}}
                                    <div class="form-group">
                                        <label for="university_id" class="form-control-label">Univerty</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                            <input type="text" id="university_id" class="form-control" value="{{ $exam->course->university->name }}" class="form-control" disabled>
                                        </div>
                                    </div>
                                    {{-- faculty_id --}}
                                    <div class="form-group">
                                        <label for="faculty_id" class="form-control-label">Faculty</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                            <input type="text" id="faculty_id" class="form-control" value="{{ $exam->course->faculty->name }}" disabled>
                                        </div>
                                    </div>
                                    {{-- major_id --}}
                                    <div class="form-group">
                                        <label for="major_id" class="form-control-label">Major</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                            <input type="text" id="major_id" class="form-control" value="{{ $exam->course->major->name }}" disabled>
                                        </div>
                                    </div>
                                    {{-- course_id --}}
                                    <div class="form-group">
                                        <label for="course_id" class="form-control-label">Course Name</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                            <input type="text" id="course_id" class="form-control" value="{{ $exam->course->course->name }}" disabled>
                                        </div>
                                    </div>
                                    {{-- course_name --}}
                                    <div class="form-group">
                                        <label for="course_name" class="form-control-label">Course Code</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                            <input type="text" id="course_name" class="form-control" value="{{ $exam->course->course->code }}" disabled>
                                        </div>
                                    </div>
                                    {{-- type --}}
                                    <div class="form-group">
                                        <label for="type" class="form-control-label">Type</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                            <input type="text" id="type" class="form-control" value="{{ $exam->type }}" disabled>
                                        </div>
                                    </div>
                                    {{-- date --}}
                                    <div class="form-group">
                                        <label for="date">Date Of Examination</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                            <input type="text" id="date" class="form-control" value="{{ $exam->date }}" disabled>
                                        </div>
                                    </div>
                                    {{-- no_of_questions --}}
                                    <div class="form-group">
                                        <label for="no_of_questions">Number Of Questions</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                            <input type="text" id="no_of_questions" class="form-control" value="{{ count($exam->questions->toArray()) }}" disabled>
                                        </div>
                                    </div>
                                    {{-- duration --}}
                                    <div class="form-group">
                                        <label for="duration">Time In Minutes</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                            <input type="text" id="duration" class="form-control" value="{{ $exam->duration }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group">
                                <button class="btn btn-primary" id="begin-btn">Begin</button>
                            </div>
                        </div>
                        <div class="card-body" id="quiz-screen" style="display: none">
                            <form id="submit-quiz-form" class="form-horizontal" action="{{ route('quiz.submit', $exam->id) }}" enctype="" method="POST">
                                @csrf
                                <div class="card-body card-block">
                                    <div id="timer">

                                    </div>
                                    <input type="number" id="timer-input" name="timer_input" value="">

                                    @foreach($exam->questions as $index => $question)
                                        <div class="question-container" style="display: none;" id="question-{{ $index }}">
                                            <label>{{ $index + 1 }}. {{ $question->text }}</label>

                                            <!-- If it's MCQ or true/false -->
                                            @if($question->type == 'mcq' || $question->type == 'true_false')
                                                @foreach($question->answers as $answer)
                                                    <div>
                                                        <input type="radio" name="question[{{ $question->id }}]" value="{{ $answer->id }}" id="answer-{{ $answer->id }}">
                                                        <label for="answer-{{ $answer->id }}">{{ $answer->text }}</label>
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

                                    <button type="button" id="prev-question" style="opacity: 0.5;">Previous</button>
                                    <button type="button" id="next-question">Next</button>
                                    <button type="submit" id="submit-quiz" style="display: none;">Submit Answers</button>
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
            // var totalTime = {{ $exam->duration * 60 }};
            var totalTime = 10;
            

            let currentQuestionIndex = 0;
            let totalQuestions = {{ count($exam->questions) }};
            let questionContainers = document.querySelectorAll('.question-container');
            
            document.getElementById('begin-btn').addEventListener('click', function() {
                const interval = setInterval(() => {
                // var totalTime = {{$exam->duration}};
                console.log(totalTime);
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
            });

            // Before submit the exam, display a confirm
            document.getElementById('submit-quiz-form').addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent form submission

                let confirmation = confirm("Are you sure you want to submit this form?");
                if (confirmation) {
                    this.submit(); // If the user confirms, submit the form
                }
            });
        });
    </script>
</body>
</html>



