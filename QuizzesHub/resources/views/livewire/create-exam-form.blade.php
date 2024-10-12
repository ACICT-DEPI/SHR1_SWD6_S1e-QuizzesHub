<div>
    <div class="card-header">
        <strong class="card-title">Data Table</strong>
    </div>
    <div class="card-body">
        <div class="card-body card-block">
            {{-- detaill about exam --}}
            {{-- university_id --}}
            <div class="form-group">
                <label for="university_id" class="form-control-label">University</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="menu-icon fa fa-bank"></i></div>
                    <select wire:model.live="selectedUniversity" class="form-control">
                        <option>Choose University</option>
                        @foreach($universities as $university)
                            <option value="{{ $university->id }}">{{ $university->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div><x-input-error :messages="$errors->get('selectedUniversity')" class="mt-2" /></div>
            </div>
            {{-- faculty_id --}}
            <div class="form-group">
                <label for="faculty_id" class="form-control-label">Faculty</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="menu-icon fa fa-bank"></i></div>
                    @if(!is_null($faculties))
                        <select wire:model.live="selectedFaculty" class="form-control">
                            <option value="">Choose Faculty</option>
                            @foreach($faculties as $faculty)
                                <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <div><x-input-error :messages="$errors->get('selectedFaculty')" class="mt-2" /></div>
            </div>
            {{-- major_id --}}
            <div class="form-group">
                <label for="major_id" class="form-control-label">Major</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="menu-icon fa fa-laptop"></i></div>
                    @if(!is_null($majors))
                        <select wire:model.live="selectedMajor" class="form-control">
                            <option value="">Choose Major</option>
                            @foreach($majors as $major)
                                <option value="{{ $major->id }}">{{ $major->name }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <div><x-input-error :messages="$errors->get('selectedMajor')" class="mt-2" /></div>
            </div>
            {{-- course_id --}}
            <div class="form-group">
                <label for="course_id" class="form-control-label">Course</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                    @if(!is_null($courses))
                        <select wire:model.live="selectedCourse" class="form-control">
                            <option value="">Choose Course</option>
                            @foreach($courses as $course)
                                <option value="{{ $course->id }}">{{ $course->name }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
                <div><x-input-error :messages="$errors->get('selectedCourse')" class="mt-2" /></div>
                </div>
            {{-- type --}}
            <div class="form-group">
                <label for="type" class="form-control-label">Type</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="menu-icon fa fa-paperclip"></i></div>
                    <select wire:model.live="examType" class="form-control">
                        <option value="">Choose Type</option>
                        <option value="midterm">Midterm</option>
                        <option value="final">Final</option>
                        <option value="oral">Oral</option>
                        <option value="sheet">Sheet</option>
                    </select>
                </div>
                <div><x-input-error :messages="$errors->get('examType')" class="mt-2" /></div>
            </div>
            {{-- date --}}
            <div class="form-group">
                <label for="date">Date Of Examination</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="menu-icon fa fa-calendar"></i></div>
                    <input type="date" wire:model.live="examDate" class="form-control">
                </div>
                <div><x-input-error :messages="$errors->get('examDate')" class="mt-2" /></div>
            </div>
            {{-- duration --}}
            <div class="form-group">
                <label for="duration">Time Of Exam</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="menu-icon fa fa-clock-o"></i></div>
                    <input type="number" wire:model.live="examDuration" placeholder="Duration in minutes" class="form-control" min="1" max="300">
                </div>
                <div><x-input-error :messages="$errors->get('examDuration')" class="mt-2" /></div>

            </div>
        </div>
        <hr>
        <button class="btn btn-success" wire:click="createExam">Create Exam</button>
        <hr>
        <div class="card-body card-block">
            <!-- Only show the question form once the exam is created -->
            @if($examId)
                <label for=""><h3>Questions for the Exam</h3></label>



                <!-- Display questions dynamically -->
                @foreach($questions as $index => $question)
                    <div class="form-group">
                        <label for="question" class="form-control-label">Question {{ $index + 1 }}</label>
                        <div class="input-group">
                            <div class="input-group-addon">
                                <select wire:model.live="questions.{{ $index }}.type">
                                    <option value="">Choose Type</option>
                                    <option value="mcq">Multiple Choice</option>
                                    <option value="essay">Essay</option>
                                    <option value="true_false">True/False</option>
                                </select>
                            </div>
                            <input type="text" class="form-control" wire:model.live="questions.{{ $index }}.text" placeholder="Question Text">
                        </div>
                        <div class="input-group">
                            @if ($errors->has("questions.$index.type"))
                                <span class="alert alert-danger">{{ $errors->first("questions.$index.type") }}</span>
                            @endif
                            @if ($errors->has("questions.$index.text"))
                                <span class="alert alert-danger">{{ $errors->first("questions.$index.text") }}</span>
                            @endif
                        </div>

                        <label class="form-control-label">Answers</label>
                        @if($question['type'] === 'mcq')
                            @foreach($question['answers'] as $answerIndex => $answer)
                                <div class="input-group" wire:key="answer-{{ $index }}-{{ $answerIndex }}">
                                    <div class="input-group-addon">
                                        <select wire:model.live="questions.{{ $index }}.answers.{{ $answerIndex }}.type">
                                            <option value="normal_text">Text</option>
                                            <option value="image_path">Image</option>
                                        </select>
                                    </div>
                                    @if($answer['type'] === 'normal_text')
                                        <input type="text" class="form-control" wire:model.debounce="questions.{{ $index }}.answers.{{ $answerIndex }}.text" placeholder="Answer Text">
                                    @elseif($answer['type'] === 'image_path')
                                        <input type="file" class="form-control" wire:model.debounce="uploadedImages.{{ $index }}.{{ $answerIndex }}">
                                    @endif

                                    <label>
                                        <input type="checkbox" wire:model.debounce="questions.{{ $index }}.answers.{{ $answerIndex }}.is_correct">
                                        Correct
                                    </label>
                                </div>
                            @endforeach
                        @elseif($question['type'] === 'true_false')
                            <div class="input-group">
                                <label>True</label>
                                <input type="checkbox"
                                    wire:click="setCorrectAnswer({{ $index }}, 0)"
                                    {{ $question['answers'][0]['is_correct'] ? 'checked' : '' }}>
                            </div>
                            <div class="input-group">
                                <label>False</label>
                                <input type="checkbox"
                                    wire:click="setCorrectAnswer({{ $index }}, 1)"
                                    {{ $question['answers'][1]['is_correct'] ? 'checked' : '' }}>
                            </div>
                        @elseif($question['type'] === 'essay')
                            <div class="input-group">
                                <input type="text" class="form-control" wire:model.live="questions.{{ $index }}.answers.{{0}}.text" value="no answer yet">
                            </div>
                        @endif
                    </div>
                @endforeach

                <!-- Add a question button -->
                <button class="btn btn-info" wire:click="addQuestion">Add Question</button>
                <button class="btn btn-success" wire:click="saveQuestions">Save Questions and Answers</button>

                @if (session()->has('message'))
                    <div>{{ session('message') }}</div>
                @endif
            @endif
        </div>

    </div>

</div>
