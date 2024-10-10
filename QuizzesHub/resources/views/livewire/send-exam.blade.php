<div>
    {{-- university_id --}}
    <div class="form-group">
        <label for="selectedUniversity" class="form-control-label">University</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="menu-icon fa fa-bank"></i></div>
            <select wire:model.live="selectedUniversity" name="university_id" class="form-control">
                <option>Choose University</option>
                @foreach($universities as $university)
                    <option value="{{ $university->id }}">{{ $university->name }}</option>
                @endforeach
            </select>
        </div>
        <div><x-input-error :messages="$errors->get('university_id')" class="mt-2" /></div>
    </div>
    {{-- faculty_id --}}
    <div class="form-group">
        <label for="selectedFaculty" class="form-control-label">Faculty</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="menu-icon fa fa-bank"></i></div>
                <select wire:model.live="selectedFaculty" name="faculty_id" class="form-control">
                    <option value="">Choose Faculty</option>
                    @foreach($faculties as $faculty)
                        <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                    @endforeach
                </select>
        </div>
        <div><x-input-error :messages="$errors->get('faculty_id')" class="mt-2" /></div>
    </div>
    {{-- major_id --}}
    <div class="form-group">
        <label for="selectedMajor" class="form-control-label">Major</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="menu-icon fa fa-laptop"></i></div>
            <select wire:model.live="selectedMajor" name="major_id" class="form-control">
                <option value="">Choose Major</option>
                @foreach($majors as $major)
                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                @endforeach
            </select>
        </div>
        <div><x-input-error :messages="$errors->get('major_id')" class="mt-2" /></div>
    </div>
    {{-- course_id --}}
    <div class="form-group">
        <label for="selectedCourse" class="form-control-label">Course</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
            <select wire:model.live="selectedCourse" name="course_id" class="form-control">
                <option value="">Choose Course</option>
                @foreach($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <div><x-input-error :messages="$errors->get('course_id')" class="mt-2" /></div>

    </div>
    
</div>
