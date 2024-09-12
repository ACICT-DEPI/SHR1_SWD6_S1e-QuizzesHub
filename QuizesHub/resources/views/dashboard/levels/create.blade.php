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


<form class="form-horizontal" action="{{route('admin.levels.store')}}"  enctype="multipart/form-data" method="post" >
   @csrf
   
                     <div class="card-body card-block">
                
                                <div class="form-group">
                                    <label class=" form-control-label" for="name">Level_Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                        <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name">
                                          @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    </div>
                                   </div>



                                   
                                <div class="form-group">
                                    <label class=" form-control-label" for="description">Description</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="menu-icon fa fa-book"></i></div>
                                        <input type="text" id="description" class="form-control @error('description') is-invalid @enderror" name="description">
                                          @error('description')
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