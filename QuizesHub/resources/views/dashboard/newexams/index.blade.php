{{-- @dd($exams) --}}
@extends('dashboard.layout.master')


@section('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet"
        href="{{ asset('dashboard/assets') }}/css/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('dashboard/assets') }}/css/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
        @livewireStyles
@endsection


@section('content')
  <div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                
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
                        {{-- <div>
                            <select wire:model="selectedUniversity">
                                <option value="">Filter University</option>
                                @foreach ($universities as $university)
                                    <option value="{{ $university->id }}">{{ $university->name }}</option>
                                @endforeach
                            </select>
                            <button wire:click='filterUniversity'>filter</button>
                        </div> --}}
                        {{-- selected_faculty --}}
                        {{-- <div>
                            <select wire:model="selectedFaculty">
                                <option value="">Filter Faculty</option>
                                @foreach ($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                                @endforeach
                            </select>
                            <button wire:click='filterFaculty'>filter</button>
                        </div> --}}
                        {{-- selected_major --}}
                        {{-- <div>
                            <select wire:model="selectedMajor">
                                <option value="">Filter Major</option>
                                @foreach ($majors as $major)
                                    <option value="{{ $major->id }}">{{ $major->name }}</option>
                                @endforeach
                            </select>
                            <button wire:click='filterMajor'>filter</button>
                        </div> --}}
                        {{-- selected_type --}}
                        {{-- <div>
                            <select wire:model="selectedType">
                                <option value="{{null}}">Filter Type</option>
                                @foreach ($types as $type)
                                    <option value="{{ $type }}">{{ $type }}</option>
                                @endforeach
                            </select>
                            <button wire:click='filterType'>filter</button>
                        </div> --}}
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Course Name</th>
                                    <th>Faculty</th>
                                    <th>University</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($new_exams as $exam)
                            {{-- @if(
                            (!isset($selectedUniversity) || $exam->course->university->id == $selectedUniversity) && 
                            (!isset($selectedFaculty) || $exam->course->faculty->id == $selectedFaculty) && 
                            (!isset($selectedMajor) || $exam->course->major->id == $selectedMajor) &&
                            (!isset($selectedType) || $exam->type == $selectedType) 
                            ) --}}
                                <tr>
                                    <td>{{ $exam->type }}</td>
                                    <td>{{ $exam->course->name }}</td>
                                    <td>{{ $exam->faculty->name }}</td>
                                    <td>{{ $exam->university->name }}</td>
                                    <td>
                                    <a href="{{ route('admin.newexams.show', $exam->id) }}" class="btn btn-primary">Show</a>
                                    <form style="display:inline" action="{{ route('admin.newexams.delete', $exam->id)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-danger" id="delete" onclick="return confirm('Are you sure?')" value="Delete">Delete</button>
                                    </form>
                                    {{-- <a href="#" class="btn btn-danger">Delete</a> --}}
                                    </td>
                                </tr>
                                {{-- @endif --}}
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Type</th>
                                <th>Course Name</th>
                                <th>Faculty</th>
                                <th>University</th>
                                <th>Operations</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

            </div>

        </div>
    </div><!-- .animated -->
  </div><!-- .content -->
@endsection

@section('scripts')
@livewireScripts

    <!-- DataTables JS -->
    <script src="{{ asset('dashboard/assets/js/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>

    <!-- Additional JS for DataTables functionality -->
    <script src="{{ asset('dashboard/assets/js/jszip.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/pdfmake/build/pdfmake.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/pdfmake/build/vfs_fonts.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('dashboard/assets/js/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>

    <!-- DataTables Initialization Script -->
    <script src="{{ asset('dashboard/assets/js/init-scripts/data-table/datatables-init.js') }}"></script>
@endsection
