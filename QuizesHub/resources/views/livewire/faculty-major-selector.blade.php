<div>
    <!-- Faculty Selector -->
   <div>
        <label for="faculty">Select Faculty</label>
        <select wire:model="facultyId" id="faculty" class="d-inline  form-control">
            
            @foreach($faculties as $faculty)
                <option value="{{ $faculty->id }}">{{ $faculty->name }}</option> 
            @endforeach
       
        </select>
  
    </div>
    <!-- Major Selector (only if majors are available) -->
    
        <div>
            <label for="major">Select Major</label>
            <select wire:model="majorId" id="major" class="d-inline  form-control">
                @foreach($majors as $major)
                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                @endforeach
            </select>
       </div>
  
 
</div>





