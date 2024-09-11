{{-- @dd($exams) --}}
@extends('dashboard.layout.master')

@section('content')
  <div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Data Table</strong>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Type</th>
                                    <th>Course Name</th>
                                    <th>Course Code</th>
                                    <th>Date</th>
                                    <th>Operations</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach ($exams as $exam)
                                <tr>
                                  <td>{{ $exam->type }}</td>
                                  <td>{{ $exam->course->name }}</td>
                                  <td>{{ $exam->course->code }}</td>
                                  <td>{{ $exam->date }}</td>
                                  <td>
                                    <a href="{{ route('admin.exams.show', $exam->id) }}" class="btn btn-primary">Show</a>
                                    {{-- <a href="#" class="btn btn-primary">Show</a> --}}
                                    <a href="#" class="btn btn-success">Edit</a>
                                    <a href="#" class="btn btn-danger">Delete</a>
                                  </td>
                                </tr>
                              @endforeach
                            </tbody>
                            <tfoot>
                              <tr>
                                <th>Type</th>
                                <th>Course Name</th>
                                <th>Course Code</th>
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