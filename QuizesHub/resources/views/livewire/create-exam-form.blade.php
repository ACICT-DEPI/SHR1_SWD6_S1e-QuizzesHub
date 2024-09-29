<div>
    <div>
        <!-- University Select -->
        <select wire:model.live="selectedUniversity">
            <option value="">Choose University</option>
            @foreach($universities as $university)
                <option value="{{ $university->id }}">{{ $university->name }}</option>
            @endforeach
        </select>

        <!-- Faculty Select -->
        @if(!is_null($faculties))
            <select wire:model.live="selectedFaculty">
                <option value="">Choose Faculty</option>
                @foreach($faculties as $faculty)
                    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                @endforeach
            </select>
        @endif

        <!-- Major Select -->
        @if(!is_null($majors))
            <select wire:model.live="selectedMajor">
                <option value="">Choose Major</option>
                @foreach($majors as $major)
                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                @endforeach
            </select>
        @endif

        <!-- Course Select -->
        @if(!is_null($courses))
            <select wire:model.live="selectedCourse">
                <option value="">Choose Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        @endif
    </div>

    <!-- Additional inputs for exam type, date, and duration -->
    <div>
        <select wire:model.live="examType">
            <option value="midterm">Midterm</option>
            <option value="final">Final</option>
            <option value="oral">Oral</option>
            <option value="sheet">Sheet</option>
        </select>

        <input type="date" wire:model.live="examDate">
        <input type="text" wire:model.live="examDuration" placeholder="Duration in minutes">
    </div>

     <!-- Button to create the exam -->
     <button wire:click="createExam">Create Exam</button>

     <!-- Only show the question form once the exam is created -->
     @if($examId)
         <h3>Questions for the Exam</h3>

         <!-- Add a question button -->
        <button wire:click="addQuestion">Add Question</button>

        <!-- Display questions dynamically -->
        @foreach($questions as $index => $question)
            <div>
                <label>Question Type:</label>
                <select wire:model.live="questions.{{ $index }}.type">
                    <option value="">Choose Type</option>
                    <option value="mcq">Multiple Choice</option>
                    <option value="essay">Essay</option>
                    <option value="true_false">True/False</option>
                </select>

                <label>Question Text:</label>
                <input type="text" wire:model.live="questions.{{ $index }}.text" placeholder="Question Text">

                @if($question['type'] === 'mcq')
                    <h4>Answers (MCQ)</h4>
                    @foreach($question['answers'] as $answerIndex => $answer)
                        <div>
                            <select wire:model.live="questions.{{ $index }}.answers.{{ $answerIndex }}.type">
                                <option value="normal_text">Text</option>
                                <option value="image_path">Image</option>
                            </select>

                            @if($answer['type'] === 'normal_text')
                                <input type="text" wire:model.live="questions.{{ $index }}.answers.{{ $answerIndex }}.text" placeholder="Answer Text">
                            @elseif($answer['type'] === 'image_path')
                                <input type="file" wire:model.live="uploadedImages.{{ $index }}.{{ $answerIndex }}">
                            @endif

                            <label>
                                <input type="checkbox" wire:model.live="questions.{{ $index }}.answers.{{ $answerIndex }}.is_correct">
                                Correct
                            </label>
                        </div>
                    @endforeach
                @elseif($question['type'] === 'true_false')
                    <h4>True/False Answers</h4>
                    <div>
                        <label>True</label>
                        <input type="checkbox"
                            wire:click="setCorrectAnswer({{ $index }}, 0)"
                            {{ $question['answers'][0]['is_correct'] ? 'checked' : '' }}>
                    </div>
                    <div>
                        <label>False</label>
                        <input type="checkbox"
                            wire:click="setCorrectAnswer({{ $index }}, 1)"
                            {{ $question['answers'][1]['is_correct'] ? 'checked' : '' }}>
                    </div>
                @elseif($question['type'] === 'essay')
                    <p>Essay questions do not require predefined answers.</p>
                @endif
            </div>
        @endforeach

        <button wire:click="saveQuestions">Save Questions and Answers</button>

        @if (session()->has('message'))
            <div>{{ session('message') }}</div>
        @endif
     @endif

</div>
