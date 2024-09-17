@extends('dashboard.layout.master')

@section('content')

<div class="row">


            

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                            <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Course_Name</th>
                                            <td>{{$CourseData->name}}</td>
                                            </tr>
                                        <tr>
                                            <th>Code</th>
                                            <td>{{$CourseData->code}}</td>
                                        </tr>

                                        <tr>
                                            <th>Majors Of Course</th>
                                            <td>
                                                @if(count($CourseData->majors)>0)
                                                <ul style="padding-left:10px">
                                            @foreach($CourseData->majors as $major )

                                            <li>{{$faculties[$CourseData->id.'-'.$major->id.'-'.$major->pivot->faculty_id]." - ".$major->name ." - ". $major->pivot->degree}}</li>

                                            @endforeach
                                            @else
                                            <span class="badge badge-danger">No majors Or faculties</span>
                                            @endif
</ul>

                                            </td>
                                         </tr>


                                    </thead>

                                </table>
                                <style>
                                    th{
                                        background-color: rgb(231, 76, 60);
                                        color: white;
                                    }
                                </style>
                                <!-- <a href="" class="btn btn-primary">Add to another major and faculty</a> -->
                                 <form method="post" action="{{ route('admin.courses.addMajorsAndFaculties',$CourseData->id) }}" enctype="multipart/form-data">
                                 @csrf
                                 <div>
                                   <label
                                for="faculty"
                                class="inline control-label col-form-label"
                                style="color:rgb(0, 123, 255)"
                                >Select faculty And Major</label>
                            <select name="faculty" id="faculty" class="d-inline  form-control" multiple size="2" style="height: 300px">
                            @foreach($fs as $faculty) 
                                 <!-- <option value="{{$faculty->id}}">{{ $faculty->name}}</option> -->
                                  <optgroup label="{{$faculty->name}}" style="color:rgb(231, 76, 60);font-style:italic;font-size:17px">
                                  @foreach($faculty->majors as $major) 
                                 <option value="{{$major->id}}-{{$faculty->id}}" style="color:black;">{{ $major->name}}</option>
                                 @endforeach
                                </optgroup>
                                 @endforeach
                                </select>
                            </div>


                                 
                                 <!-- <div >
                                  <div class="form-group" >

                                    <div>
                                    <label
                                for="major"
                                class="inline control-label col-form-label"
                                style="color:rgb(0, 123, 255)"
                                >Select majors</label>
                                 <select name="major[]" id="major" class="d-inline  form-control" multiple size="2" style="height: 80px; " >
                                 @foreach($majors as $major)
                                 <option value="{{$major->id}}">{{ $major->name}}</option>
                                 @endforeach
                                </select>
                            </div>
                            </div>
                                </div> -->


                            
                            <div>
                                   <label
                                for="degree"
                                class="inline control-label col-form-label"
                                style="color:rgb(0, 123, 255)"

                                >Degree</label>
                                <input type="text" class="form-control" name="degree" id="degree" placeholder="Degree (Max 300)">
                                </div>
                           

                            </div>





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
