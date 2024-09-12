@extends('dashboard.layout.master')

@section('content')
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                        <strong class="card-title" >{{ $university->name }} </strong>
                    </div>
                    <div class="card-body">

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
                </div>
            </div>


        </div>
    </div><!-- .animated -->
@endsection
