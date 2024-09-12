@extends('dashboard.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if (Session::has('msg'))
                        <alert class="alert alert-success">
                            {{ Session::get('msg') }}
                        </alert>
                    @endif

                    <form class="form-horizontal" action="{{ route('admin.universities.update', $university->id) }}"
                        enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card-body card-block">


                            <div class="form-group">
                                <label class=" form-control-label" for="name">University Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <input type="text" id="name" value="{{ $university->name }}"
                                        class="form-control @error('name') is-invalid @enderror" name="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Faculty Name</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($university->faculties as $faculty)

                                        <tr>

                                            <td>{{ $faculty->name }}</td>
                                            <td>
                                                <a href="{{ route('admin.faculties.show', $faculty->id) }}" class="btn btn-success">Show</a>
                                                <a href="{{ route('admin.faculties.edit', $faculty->id) }}" class="btn btn-primary">Edit</a>
                                                <form method="POST" action="{{ route('admin.faculties.destroy', $faculty->id) }}"
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
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm" id="submit">
                                <i class="fa fa-dot-circle-o"></i> Update
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
