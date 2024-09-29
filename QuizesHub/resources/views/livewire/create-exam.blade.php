<div>
    <form class="form-horizontal" wire:submit='save'>
        <div class="card-body card-block">
            {{-- university_id --}}
            <div class="form-group">
                <label for="university_id" class="form-control-label">Univerty Id</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                    <select wire:model="university_id" id="university_id" class="form-control @error('course_name') is-invalid @enderror">
                        @foreach ($universities as $university)
                        <option value="{{$university['id']}}">{{$university['name']}}</option>
                        @endforeach
                    </select>
                    @error('university_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- faculty_id --}}
            <div class="form-group">
                <label for="faculty_id" class="form-control-label">Faculty Id</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                    <select wire:model="faculty_id" id="faculty_id" class="form-control @error('course_name') is-invalid @enderror">
                        @foreach ($faculties as $faculty)
                        <option value="{{$faculty['id']}}">{{$faculty['name']}}</option>
                        @endforeach
                    </select>
                    @error('faculty_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- course_id --}}
            <div class="form-group">
                <label for="course_id" class="form-control-label">Course Id</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                    <select wire:model="course_id" id="course_id" class="form-control @error('course_name') is-invalid @enderror">
                        @foreach ($courses as $course)
                        <option value="{{$course['id']}}">{{$course['name']}}</option>
                        @endforeach
                    </select>
                    @error('course_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- course_name --}}
            <div class="form-group">
                <label for="course_name" class="form-control-label">Course Name</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                    <input 
                        type="text"
                        wire:model="course_name"
                        id="course_name"
                        value="{{old('course_name')}}"
                        placeholder="Enter Name Of Course Exam"
                        class="form-control @error('course_name') is-invalid @enderror"
                    >
                    @error('course_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- type --}}
            <div class="form-group">
                <label for="type" class="form-control-label">Type</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                    <select wire:model="type" id="type" class="form-control">
                        <option value="midterm" @if(old('type')=='midterm' ) selected @endif>midterm
                        </option>
                        <option value="oral" @if(old('type')=='oral' ) selected @endif>oral</option>
                        <option value="final" @if(old('type')=='fianl' ) selected @endif>final</option>
                        <option value="sheet" @if(old('type')=='sheet' ) selected @endif>sheet</option>
                    </select>
                </div>
            </div>
            {{-- date --}}
            <div class="form-group">
                <label for="date">Date Of Examination</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                    <input
                        type="date"
                        id="date"
                        wire:model="date"
                        value="{{old('date')}}"
                        class="form-control @error('course_name') is-invalid @enderror"
                    >
                    {{-- @error --}}
                </div>
            </div>
            {{-- duration --}}
            <div class="form-group">
                <label for="duration">Time Of Exam</label>
                <div class="input-group">
                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                    <input
                        type="number"
                        id="duration"
                        wire:model="duration"
                        value="{{old('duration')}}"
                        class="form-control @error('course_name') is-invalid @enderror"
                        placeholder="Time In Minutes"
                    >
                    {{-- @error --}}
                    @error('duration')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm" id="submit">
                <i class="fa fa-dot-circle-o"></i> Add Exam
            </button>
        </div>

    </form>

    <div class="form-horizontal">
        <div class="card-body card-block">
            <ol>
                @foreach ($questions as $index => $question)
                    <li>
                        {{ $question['type'] . ', ' . $question['text'] }}
                        <button wire:click='removeQuestion({{$index}})'>Remove</button>
                        <div>
                            <div class="mb-3">
                                <label for="">Answer Type</label>
                                <select wire:model="aType" id="">
                                    <option value="normal_text">normal_text</option>
                                    <option value="image_path">image_path</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="">Answer Text</label>
                                <input type="text" wire:model='aText'>
                            </div>
                            <div class="mb-3">
                                <label for="">Is Correct</label>
                                <select wire:model="aIsCorrect" id="">
                                    <option value="1">true</option>
                                    <option value="0">false</option>
                                </select>
                            </div>
                            <button wire:click='addAnswer({{$index}})'>Add Answer</button>
                        </div>
                    </li>
                    @foreach ($question['answers'] as $answer)
                        <li>{{ $answer['text'] }}</li>
                    @endforeach
                    <hr>
                @endforeach
            </ol>
        </div>
    </div>

    <form wire:submit='addQuestion' class="form-hrizontal">
        <div class="card-body card-block">
            <div class="mb-3">
                <label for="qType">Question Type</label>
                <select wire:model="qType" id="qType">
                    <option value="mcq" >mcq</option>
                    <option value="essay" selected>essay</option>
                    <option value="true_false">true_false</option>
                </select>
                @error('qType') <span>{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <label for="qText">Question Text</label>
                <textarea wire:model="qText" id="qText" cols="90" rows="3"></textarea>
                @error('qText') <span>{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
                <button type="submit">Add Question</button>
            </div>
        </div>
    </form>
</div>
