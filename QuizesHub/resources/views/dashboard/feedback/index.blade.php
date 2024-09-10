@extends('dashboard.layout.master')
@section('styles')
<link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/flag-icon-css/css/flag-icon.min.css">
<link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{asset('dashboard/assets')}}/vendors/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css">
@endsection
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
                                            <th>Id</th>
                                            <th>User_id</th>
                                            <th>Exam_id</th>
                                            <th>Rating</th>
                                            <th>Comments</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($feedbackData as $feedback)
                                        <td>{{$feedback->id}}</td>
                          <td>{{ $feedback->user_id}}</td>
                          <td>{{$feedback->exam_id }}</td>
                          <td>{{ $feedback->rating}}</td>
                          <td>{{ $feedback->comments}}</td>
                          <td>
                            <a href="{{route('admin.feedbacks.show',$feedback->id)}}" class="btn btn-success">Show</a>
                            <a href="{{route('admin.feedbacks.edit',$feedback->id)}}" class="btn btn-info">Edit</a>
                            <form method="POST" action="{{route('admin.feedbacks.destroy',$feedback->id)}}" style="display:inline">
                              @csrf
                              @method('delete')
                              <input type="submit" id="delete"  class="btn btn-danger" onclick="return confirm('Are you sure?')" value="Delete">
                              <style>
                                #delete{
                                  background-color:red;
                                }
                              </style>
                            </form>
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
@endsection

@section('scripts')
   <script src="{{asset('dashboard/assets')}}/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('dashboard/assets')}}/vendors/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{asset('dashboard/assets')}}/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('dashboard/assets')}}/vendors/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="{{asset('dashboard/assets')}}/vendors/jszip/dist/jszip.min.js"></script>
    <script src="{{asset('dashboard/assets')}}/vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{asset('dashboard/assets')}}/vendors/pdfmake/build/vfs_fonts.js"></script>
    <script src="{{asset('dashboard/assets')}}/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{asset('dashboard/assets')}}/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{asset('dashboard/assets')}}/vendors/datatables.net-buttons/js/buttons.colVis.min.js"></script>
    <script src="{{asset('dashboard/assets')}}/assets/js/init-scripts/data-table/datatables-init.js"></script>

@endsection

