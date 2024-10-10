@extends('dashboard.layout.master')

@section('content')

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

                                            <th>User_Name</th>
                                            <th>Course</th>
                                            <th>Exam_Type</th>
                                            <th>Exam_Date</th>
                                            <th>Rating</th>
                                            <th>Comments</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                         @foreach($UserData as $feedback)
                     <tr>
                     <td>{{ $feedback->user->fname . " " . $feedback->user->lname}}</td>
<<<<<<< HEAD
                    
                          
=======


>>>>>>> a37e1360803d7f99bb67c687fd9afeb75f71fef3
                          <td>{{ $feedback->exam->course->course->name }}</td>
                          <td>{{$feedback->exam->type }}</td>
                          <td>{{ $feedback->exam->date}}</td>
                          <td>{{ $feedback->rating}}</td>
                          <td>{{ $feedback->comments}}</td>
                          <td>
                            <a href="{{route('admin.feedbacks.show',$feedback->id)}}" class="btn btn-primary" id="show">Show</a>


<<<<<<< HEAD
                           
=======

>>>>>>> a37e1360803d7f99bb67c687fd9afeb75f71fef3
                          </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
            @section('styles')
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet"
        href="{{ asset('dashboard/assets') }}/css/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet"
        href="{{ asset('dashboard/assets') }}/css/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
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
@endsection
