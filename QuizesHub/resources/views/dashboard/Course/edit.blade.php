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

             
<form class="form-horizontal" action="{{route('admin.courses.update',$CourseData->id)}}"  enctype="multipart/form-data" method="post" >
   @csrf
   @method('PUT')
   
                     <div class="card-body card-block">



                   
                                
                               

                                <div class="form-group">
                                    <label class=" form-control-label" for="name">Course_Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                        <input type="text" id="name" value="{{$CourseData->name}}" class="form-control @error('name') is-invalid @enderror" name="name">
                                          @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                   </div>


                                   <div class="form-group">
                                    <label class=" form-control-label" for="code">Code</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="menu-icon fa fa-code"></i></div>
                                        <input type="text" id="code" value="{{$CourseData->code}}" class="form-control @error('code') is-invalid @enderror" name="code">
                                          @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                   </div>


                                   <div class="form-group">
                                    <label class=" form-control-label" for="degree">Degree</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="menu-icon fa fa-code"></i></div>
                                        <input type="text" id="degree" value="{{$CourseInfo[0]->degree}}" class="form-control @error('degree') is-invalid @enderror" name="degree">
                                          @error('degree')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                   </div>



                                  
                                

                                  
                                    <div class="form-group">
                                    <label class=" form-control-label" for="major_id">Major_Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-laptop"></i></div>
                                        <select class="form-control @error('major_id') is-invalid @enderror" name="major_id" id="major_id" value="{{$CourseData->major_id}}">
                                      
                                        @foreach($AllMajors as $major)
                                            <option  value="{{$major->id}}" @if($CourseData->major_id == $major->id) selected @endif >{{$major->name}}</option>
                                            @endforeach
                                          </select>
                                          @error('major_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                              </div>
                            </div>
                            


                            <div class="form-group">
                                    <label class=" form-control-label" for="faculty_id">Faculty_Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="fa fa-bank"></i></div>
                                        <select class="form-control @error('faculty_id') is-invalid @enderror" name="faculty_id" id="faculty_id">
                                       
                                        @foreach($AllFaculties as $Faculty)
                                            <option value="{{$Faculty->id}}" @if($Faculty->id==$CourseData->faculty_id ) selected @endif >{{$Faculty->name}}</option>
                                            @endforeach
                                          </select>
                                          @error('faculty_id')
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
                                
                               

                             
</form>
@endsection