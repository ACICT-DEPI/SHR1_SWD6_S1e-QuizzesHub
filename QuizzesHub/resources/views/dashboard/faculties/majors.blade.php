@extends('dashboard.layout.master')

@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    @if (Session::has('msg'))
                        <alert class="alert alert-success">
                            {{ Session::get('msg') }}
                        </alert>
                    @endif
                    <div class="card-header" style="text-align: center;">
                        <strong class="card-title" >{{ $faculty->name }} </strong>
                    </div>
                    <div class="card-body">

                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Major Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($faculty->majors as $major)

                                <tr>

                                    <td>{{ $major->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.majors.show', $major->id) }}" class="btn btn-success">Show</a>
                                        <form method="POST" action="{{ route('admin.faculties.removeMajor', ['faculty' => $faculty->id, 'major' => $major->id]) }}"
                                            style="display:inline">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" id="delete" class="btn btn-danger"
                                                onclick="return confirm('Are you sure?')" value="Delete">
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="2">No Majors found</td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                        <form class="form-horizontal" method="post" action="{{ route('admin.faculties.addMajors',$faculty->id) }}">
                            @csrf
                            <div class="form-group">
                                <label
                                for="majors"
                                class="inline control-label col-form-label"
                                >majors</label>

                                <select name="majors[]" id="majors" class="d-inline  form-control" multiple size="2" style="height: 100px">
                                    @foreach ($majors as $major)
                                        <option value="{{$major->id}}">{{$major->name}}</option>
                                    @endforeach
                                </select>
                            </div>


                            <div class="border-top">
                                <div class="card-body">
                                  <button type="submit" class="btn btn-primary">
                                    Add
                                  </button>
                                </div>
                              </div>
                        </form>
                        <div class="card-footer" style="text-align: center">
                            <a style="text-align: center" href="{{ route('admin.majors.create') }}" class="btn btn-primary">Add New Major</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
@endsection
