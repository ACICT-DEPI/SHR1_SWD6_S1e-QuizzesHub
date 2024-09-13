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
                        <strong class="card-title" >{{ $university->name }} </strong>
                    </div>
                    <div class="card-body">

                        <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Faculty Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($university->faculties as $faculty)

                                <tr>

                                    <td>{{ $faculty->name }}</td>
                                    <td>
                                        <a href="{{ route('admin.faculties.show', $faculty->id) }}" class="btn btn-success">Show</a>
                                        <form method="POST" action="{{ route('admin.universities.removeFaculty', ['university' => $university->id, 'faculty' => $faculty->id]) }}"
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
                                        <td colspan="2">No faculties found</td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                        <form class="form-horizontal" method="post" action="{{ route('admin.universities.addFaculties',$university->id) }}">
                            @csrf
                            <div class="form-group">
                                <label
                                for="faculties"
                                class="inline control-label col-form-label"
                                >faculties</label>

                                <select name="faculties[]" id="faculties" class="d-inline  form-control" multiple size="2" style="height: 100px">
                                    @foreach ($faculties as $faculty)
                                        <option value="{{$faculty->id}}">{{$faculty->name}}</option>
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
                            <a style="text-align: center" href="{{ route('admin.faculties.create') }}" class="btn btn-primary">Add New Faculty</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
@endsection
