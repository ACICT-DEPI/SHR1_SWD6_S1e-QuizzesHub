{{-- @dd($exams) --}}
@extends('dashboard.layout.master')


@section('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet"
        href="{{ asset('dashboard/assets') }}/css/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('dashboard/assets') }}/css/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
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
                                <tr>
                                  <td>{{ $exam->type }}</td>
                                  <td>{{ $exam->course->course->name }}</td>
                                  <td>{{ $exam->course->faculty->name }}</td>
                                  <td>{{ $exam->course->university->name }}</td>
                                  <td>{{ $exam->date }}</td>
                                  <td>
                                    <a href="{{ route('admin.exams.show', $exam->id) }}" class="btn btn-primary">Show</a>
                                    {{-- <a href="#" class="btn btn-primary">Show</a> --}}
                                    <a href="{{ route('admin.exams.edit', $exam->id)}}" class="btn btn-success" >Edit</a>
                                    <form style="display:inline" action="{{route('admin.exams.destroy', $exam->id)}}" method="POST">
                                      @csrf
                                      @method('delete')
                                      <button class="btn btn-danger" id="delete" onclick="return confirm('Are you sure?')" value="Delete" >Delete</button>
                                    </form>
                                    {{-- <a href="#" class="btn btn-danger">Delete</a> --}}
                                  </td>
                                </tr>
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


        </div>
    </div><!-- .animated -->
  </div><!-- .content -->
@endsection

@section('scripts')

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
