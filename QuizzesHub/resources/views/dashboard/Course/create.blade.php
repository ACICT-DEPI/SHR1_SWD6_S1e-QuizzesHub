@extends('dashboard.layout.master')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @if (Session::has('messege'))
                        <alert class="alert alert-success">
                            {{ Session::get('messege') }}
                        </alert>
                    @endif


                    <form class="form-horizontal" action="{{ route('admin.courses.store') }}" enctype="multipart/form-data"
                        method="post">
                        @csrf

                        <div class="card-body card-block">



                            <div class="form-group">
                                <label class=" form-control-label" for="name">Course_Name</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-pencil"></i></div>
                                    <input type="text" id="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror" name="name">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- @php
                                $majorId = request('major_id');
                            @endphp -->

                            <div class="form-group">
                                <label class=" form-control-label" for="code">Course_Code</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-code"></i></div>
                                    <input type="text" id="code" value="{{ old('code') }}"
                                        class="form-control @error('code') is-invalid @enderror" name="code">
                                    @error('code')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            

                          
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-sm" id="submit">
                                <i class="fa fa-dot-circle-o"></i> Add Course
                            </button>

                        </div>



                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
