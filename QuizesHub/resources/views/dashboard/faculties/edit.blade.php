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

                    <form class="form-horizontal" action="{{ route('admin.faculties.update', $faculty->id) }}"
                        enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PUT')

                        <div class="card-body card-block">


                            <div class="form-group">
                                <label class=" form-control-label" for="name">Faculty Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                    <input type="text" id="name" value="{{ $faculty->name }}"
                                        class="form-control @error('name') is-invalid @enderror" name="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                        </div>


                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm" id="submit">
                                <i class="fa fa-dot-circle-o"></i> Update
                            </button>

                            <a href="{{ route('admin.majors.create',['major_id'=>$faculty->id]) }}" class="btn btn-info btn-sm " style="margin-left:70%">
                                <i class="fa fa-plus"></i> Create Major
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
