@extends('dashboard.layout.master')
@section('content')
<div class="container-fluid">
          <div class="row">
            <div class="col-12">
            <div class="card">
              @if(Session::has('messege'))
              <alert class="alert alert-success">
                {{Session::get('messege')}}
              </alert>
              @endif


<form class="form-horizontal" action="{{route('admin.courses.store')}}"  enctype="multipart/form-data" method="post" >
   @csrf
   
                     <div class="card-body card-block">
                                
                               

                                <div class="form-group">
                                    <label class=" form-control-label" >Course_Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                        <input type="text" id="name" value="{{ old('name') }}" name="name" class="form-control @error('name') is-invalid @enderror">
                                          @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                   </div>
                                  
                                   

                                <div class="form-group">
                                    <label class=" form-control-label" >Code</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-id-card"></i></div>
                                        <input type="text" id="code" name="code" value="{{ old('code') }}" class="form-control @error('code') is-invalid @enderror">
                                          @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror 
                                    </div>
                                    </div>

                                  
                                    <div class="form-group">
                                    <label class=" form-control-label" for="rating">Major_Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-asterisk"></i></div>
                                        <select class="form-control @error('major_id') is-invalid @enderror" name="major_id" id="major_id">
                                        @foreach($CourseData as $major)
                                            <option value="{{$major->id}}"  >{{$major->name}}</option>
                                            @endforeach
                                          </select>
                                          @error('major_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                              </div>
                            </div>
                            </div>

                               <div class="card-footer">
                                <button type="submit" class="btn btn-danger btn-sm" id="submit">
                                    <i class="fa fa-dot-circle-o"></i> Add Course
                                </button>
                                <style>
                                    #submit{
                                        background-color: rgb(231, 76, 60);
                                    }
                                </style>
                               

                             
</form>
@endsection