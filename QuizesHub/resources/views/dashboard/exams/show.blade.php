
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
                  {{-- <div class="card-body">
                      <!-- Assuming $exam is the array you've provided -->
                    <h1>Exam Type: {{ $exam['type'] }}</h1>
                    <p>Course ID: {{ $exam['course_id'] }}</p>
                    <p>Exam Date: {{ $exam['date'] }}</p>
                    <p>Duration: {{ $exam['duration'] }} minutes</p>

                    <!-- Loop through questions -->
                    <ol>
                      @foreach($exam['questions'] as $question)
                        <li><h3>Question: {{ $question['text'] }}</h3></li>
                        <p>Question Type: {{ $question['type'] }}</p>

                        <!-- Loop through answers for each question -->
                        <ul>
                          @foreach($question['answers'] as $answer)
                            <li>{{ $answer['text'] }} 
                              @if($answer['is_correct'])
                                (Correct Answer)
                              @endif
                            </li>
                          @endforeach
                        </ul>
                      @endforeach
                    </ol>
                  </div> --}}
                  <div class="card-body">
                    {{-- <form action="{{ route('exams.update', $exam->id) }}" method="POST"> --}}
                    <form action="" method="">
                      <!-- Exam Details -->
                      <div class="exam-details">
                          <h2>Edit Exam</h2>
                  
                          <div>
                              <label for="type">Exam Type</label>
                              <input type="text" id="type" name="type" value="{{ $exam->type }}" required disabled>
                          </div>
                  
                          <div>
                              <label for="course_name">Course Name</label>
                              <input type="text" id="course_name" name="course_name" value="{{ $exam->course->name }}" required disabled>
                              <input type="text" id="coures_code" name="course_code" value="{{ $exam->course->code }}" required disabled>
                          </div>
                  
                          <div>
                              <label for="date">Exam Date</label>
                              <input type="date" id="date" name="date" value="{{ $exam->date }}" required disabled>
                          </div>
                  
                          <div>
                              <label for="duration">Duration (minutes)</label>
                              <input type="number" id="duration" name="duration" value="{{ $exam->duration }}" required disabled>
                          </div>

                          <div>
                            <label for="created_at">Created At</label>
                            <input type="text" id="created_at" name="created_at" value="{{ $exam->created_at }}" required disabled>
                          </div>

                          <div>
                            <label for="updated_at">Updated At</label>
                            <input type="text" id="updated_at" name="updated_at" value="{{ $exam->updated_at }}" required disabled>
                          </div>

                          <div>
                            <label for="deleted_at">Deleted At</label>
                            <input type="text" id="deleted_at" name="deleted_at" value="{{ $exam->deleted_at }}" required disabled>
                          </div>
                      </div>
                  
                      <!-- Questions and Answers -->
                      <div class="exam-questions">
                        <hr><hr>
                          <h3>Edit Questions:</h3>
                          @foreach($exam->questions as $question)
                            <hr><hr>
                              <div class="question-block">
                                <div>
                                    <label for="type_{{ $question->id }}">Question Type:</label>
                                    <input type="text" id="type_{{ $question->id }}" name="questions[{{ $question->id }}][type]" value="{{ $question->type }}" required disabled>
                                </div>

                                  <div>
                                      <label for="question_{{ $question->id }}">Question:</label>

                                      <textarea disabled name="questions[{{ $question->id }}][text]" id="question_{{ $question->id }}" cols="60" rows="2" required>{{ $question->text }}</textarea>
                                  </div>
                  
                  
                                  <ol type="a">
                                      @foreach($question->answers as $answer)
                                          <li>
                                              <div>
                                                  <label for="answer_{{ $answer->id }}"></label>
                                                    
                                                  <input type="text" class="col-8" id="answer_{{ $answer->id }}" name="answers[{{ $answer->id }}][text]" value="{{ $answer->text }}" required disabled>
                                                  
                                                  <label for="is_correct_{{ $answer->id }}">
                                                      <input type="checkbox" id="is_correct_{{ $answer->id }}" name="answers[{{ $answer->id }}][is_correct]" value="1" @if($answer->is_correct) checked @endif disabled>
                                                      Correct Answer
                                                  </label>
                                              </div>
                                          </li>
                                      @endforeach
                                      
                                  </ol>
                              </div>
                          @endforeach
                      </div>
                      <!-- Submit Button -->
                      {{-- <button type="submit" class="btn btn-primary">Save Changes</button> --}}
                  </form>
                  <a href="#" class="btn btn-success">Edit</a>
                  </div>
              </div>
          </div>


      </div>
  </div><!-- .animated -->
</div><!-- .content -->

@endsection