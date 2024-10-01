<div>


    <div class="form-group">
        <label class=" form-control-label" for="university_id">University</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-bank"></i></div>
            <select wire:model.live="selectedUniversity" class="form-control @error('university_id') is-invalid @enderror"
                name="university_id" id="university_id">
                <option value="">Select University</option>
                @foreach ($universities as $university)
                    <option value="{{ $university->id }}" @selected(old('university_id', $user->university->id) == $university->id)>
                        {{ $university->name }}</option>
                @endforeach
            </select>
            @error('university_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="form-group">
        <label class=" form-control-label" for="faculty_id">Faculty</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-bank"></i></div>
            <select wire:model.live="selectedFaculty" class="form-control @error('faculty_id') is-invalid @enderror"
                name="faculty_id" id="faculty_id">
                <option value="">Select Faculty</option>
                @foreach ($faculties as $faculty)
                    <option value="{{ $faculty->id }}" @selected(old('faculty_id', $user->faculty->id) == $faculty->id)>
                        {{ $faculty->name }}</option>
                @endforeach
            </select>
            @error('faculty_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>


    <div class="form-group">
        <label class=" form-control-label" for="major_id">Major</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-bank"></i></div>
            <select wire:model.live="selectedMajor" class="form-control @error('major_id') is-invalid @enderror"
                name="major_id" id="major_id">
                <option value="">Select major</option>
                @foreach ($majors as $major)
                    <option value="{{ $major->id }}" @selected(old('major_id', $user->major->id) == $major->id)>{{ $major->name }}</option>
                @endforeach
            </select>
            @error('major_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


    </div>
</div>
