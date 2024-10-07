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


             
<form class="form-horizontal" action="{{route('admin.levels.update',$LevelData->id)}}" enctype="multipart/form-data" method="post" >
   @csrf
   @method('PUT')
 
   
                     <div class="card-body card-block">



                                <div class="form-group">
                                    <label class=" form-control-label" for="name">Level_Name</label>
                                    <div class="input-group">
                                        <div class="input-group-addon"><i class="menu-icon fa fa-pencil"></i></div>
                                        <input type="text" id="name" value="{{$LevelData->name}}" name="name" class="form-control @error('name') is-invalid @enderror" >
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
                                        <div class="input-group-addon"><i class="menu-icon fa fa-pencil"></i></div>
                                        <input type="text" id="description" value="{{$LevelData->description}}" class="form-control @error('description') is-invalid @enderror" name="description">
                                          @error('description')
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