@extends('site.layout.master')
@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        @if (Session::has('message'))
                            <alert class="alert alert-success">
                                {{ Session::get('message') }}
                            </alert>
                        @endif
                        <form action="{{ route('newexams.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @livewire('send-exam')
                            {{-- type --}}
                            <div class="form-group">
                                <label for="type" class="form-control-label">Type</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-paperclip"></i></div>
                                    <select name="type" class="form-control">
                                        <option value="">choose type</option>
                                        <option value="midterm">Midterm</option>
                                        <option value="final">Final</option>
                                        <option value="oral">Oral</option>
                                        <option value="sheet">Sheet</option>
                                    </select>
                                </div>
                                <div><x-input-error :messages="$errors->get('type')" class="mt-2" /></div>
                            </div>
                            {{-- files --}}
                            <div class="form-group">
                                <label for="files" class="form-control-label">files</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="menu-icon fa fa-paperclip"></i></div>
                                    <input type="file" name="file" id="files">
                                    <label for="">just pdf and word files are accepted</label>
                                </div>
                                <div><x-input-error :messages="$errors->get('file')" class="mt-2" /></div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <button type="submit" class="btn btn-success">Send</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!-- .animated -->
      </div><!-- .content -->
@endsection