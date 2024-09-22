 <div>
    <!-- Faculty Selector -->
   <div  >
        <label for="faculty" class="inline control-label col-form-label">Select Faculty</label>
        <select wire:model.live="facultyId" id="faculty" class="d-inline  form-control @error('faculty') is-invalid @enderror" name="faculty"  >
            <option value="">Select faculty</option>
            @foreach($faculties as $faculty)
                <option value="{{ $faculty->id }}">{{ $faculty->name }}</option> 
            @endforeach
       
        </select>
        @error('faculty')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
    </div>
    <!-- Major Selector (only if majors are available) -->
    
        <div>
            <label for="major" class="inline control-label col-form-label">Select Major</label>
            <select wire:model.live="majorId" id="major" class="d-inline  form-control @error('major') is-invalid @enderror" name="major">
                @foreach($majors as $major)
                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                @endforeach
            </select>
            @error('major')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
       </div>
       </div>
  
 






