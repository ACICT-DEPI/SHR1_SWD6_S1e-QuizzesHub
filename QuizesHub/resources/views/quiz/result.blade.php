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
                        <div class="card-body" id="begin-screen">
                            <form class="form-horizontal" action="" enctype="" method="">
                                <div class="card-body card-block">
                                    {{-- university_id --}}
                                    <div class="form-group">
                                        <label for="university_id" class="form-control-label">University</label>
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
                                    {{-- no_of_correct_answer --}}
                                    <div class="form-group">
                                        <label for="no_of_correct_answer">Number Of Correct Answer</label>
                                        <div class="input-group">
                                            <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                            <input type="text" id="no_of_correct_answer" class="form-control" value="{{ $score }}" disabled>
                                        </div>
                                    </div>
                                </div>
                            </form>
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
                                                    <input 
                                                        @if(in_array($answer->id, $user_answers)) checked @endif
                                                        type="radio" name="question[{{ $question->id }}]" value="{{ $answer->id }}" id="answer-{{ $answer->id }}">
                                                    <?php // echo $answer->is_correct; ?>
                                                    <label @if($answer->is_correct === 1) class='correct_answer' @endif @if(in_array($answer->id, $user_answers)) class='wrong_answer' @endif
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