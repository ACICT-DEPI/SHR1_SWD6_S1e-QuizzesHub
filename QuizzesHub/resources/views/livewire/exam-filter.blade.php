<div>
    <div class="card">
        @if (Session::has('msg'))
            <alert class="alert alert-success">
                {{ Session::get('msg') }}
            </alert>
        @endif
        <div class="card-header">
            <strong class="card-title">Data Table</strong>
        </div>
        <div class="card-body">
            {{-- selected_university --}}
            <div class="mb-3">
                <div class="input-group">
                    <select wire:model="selectedUniversity" class="form-control">
                        <option value="">Filter University</option>
                        @foreach ($universities as $university)
                            <option value="{{ $university->id }}">{{ $university->name }}</option>
                        @endforeach
                    </select>
                    <button wire:click='filterUniversity' class="btn btn-primary">apply</button>

                </div>
            </div>
            {{-- selected_faculty --}}
            <div class="mb-3">
                <div class="input-group">
                    <select wire:model="selectedFaculty" class="form-control">
                        <option value="">Filter Faculty</option>
                        @foreach ($faculties as $faculty)
                            <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                        @endforeach
                    </select>
                    <button wire:click='filterFaculty' class="btn btn-primary">apply</button>
                </div>
            </div>
            {{-- selected_major --}}
            <div class="mb-3">
                <div class="input-group">
                    <select wire:model="selectedMajor" class="form-control">
                        <option value="">Filter Major</option>
                        @foreach ($majors as $major)
                            <option value="{{ $major->id }}">{{ $major->name }}</option>
                        @endforeach
                    </select>
                    <button wire:click='filterMajor' class="btn btn-primary">apply</button>
                </div>
            </div>
            {{-- selected_type --}}
            <div class="mb-3">
                <div class="input-group">
                    <select wire:model="selectedType" class="form-control">
                        <option value="{{null}}">Filter Type</option>
                        @foreach ($types as $type)
                            <option value="{{ $type }}">{{ $type }}</option>
                        @endforeach
                    </select>
                    <button wire:click='filterType' class="btn btn-primary">apply</button>
                </div>
            </div>
            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Type</th>
                        <th>Course Name</th>
                        <th>Faculty</th>
                        <th>University</th>
                        <th>Date</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($exams as $exam)
                @if(
                (!isset($selectedUniversity) || $exam->course->university->id == $selectedUniversity) && 
                (!isset($selectedFaculty) || $exam->course->faculty->id == $selectedFaculty) && 
                (!isset($selectedMajor) || $exam->course->major->id == $selectedMajor) &&
                (!isset($selectedType) || $exam->type == $selectedType) 
                )
                    <tr>
                        <td>{{ $exam->type }}</td>
                        <td>{{ $exam->course->course->name }}</td>
                        <td>{{ $exam->course->faculty->name }}</td>
                        <td>{{ $exam->course->university->name }}</td>
                        <td>{{ $exam->date }}</td>
                        <td>
                        <a href="{{ route('admin.exams.show', $exam->id) }}" class="btn btn-primary">Show</a>
                        {{-- <a href="#" class="btn btn-primary">Show</a> --}}
                        <a href="{{ route('admin.exams.edit', $exam->id)}}" class="btn btn-success">Edit</a>
                        <form style="display:inline" action="{{route('admin.exams.destroy', $exam->id)}}" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" id="delete" onclick="return confirm('Are you sure?')" value="Delete">Delete</button>
                        </form>
                        {{-- <a href="#" class="btn btn-danger">Delete</a> --}}
                        </td>
                    </tr>
                    @endif
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>Type</th>
                    <th>Course Name</th>
                    <th>Faculty</th>
                    <th>University</th>
                    <th>Date</th>
                    <th>Operations</th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
