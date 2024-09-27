@extends('dashboard.layout.master')
@section('content')





<form method="post" action="{{ route('admin.courses.addMajorsAndFaculties',$id) }}" enctype="multipart/form-data">
    @csrf
                         <div>
                                <label
                             for="degree"
                             class="inline control-label col-form-label "
                             style="color:rgb(0, 123, 255)"
                              >Degree</label>
                             <input type="text" class="form-control @error('degree') is-invalid @enderror" name="degree" id="degree" placeholder="Degree (Max 300)">
                             @error('degree')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                             </div>      
@livewire('CreateUserForm')
<div>

                             <div class="card-footer">
                         <button type="submit" class="btn btn-primary btn-sm" id="submit">
                             <i class="fa fa-dot-circle-o"></i> Add Course to Major
                         </button>

                     </div>
                             </form>
                         </div>
                     </div>
                 </div>


             </div>
         </div><!-- .animated -->

         @endsection