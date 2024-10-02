<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="shortcut icon" href="{{ asset('exam.ico') }}">
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/selectFX/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="{{ asset('dashboard/assets') }}/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="content mt-3">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('site.index') }}"><strong class="card-title">QuizzesHub</strong></a>
                        </div>
                        <div class="card-body">
                            @if (Session::has('message'))
                            <alert class="alert alert-success">
                                {{ Session::get('message') }}
                            </alert>
                            @endif
                            <form class="form-horizontal" action="{{ route('quiz.feedback', $examId) }}" enctype="" method="POST">
                                @csrf
                                <div class="card-body card-block">
                                    <div class="form-group">
                                        <label for="rating">rating</label>
                                        <div class="input-group">
                                            <select name="rating" id="rating" class="form-control">
                                                <option value="">shoose rating</option>
                                                <option value="5">perfect</option>
                                                <option value="4">good</option>
                                                <option value="3">normal</option>
                                                <option value="2">not bad</option>
                                                <option value="1">poor</option>
                                            </select>
                                        </div>
                                        @error('rating')
                                            <div class="alert alert-danger">
                                                <span>{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="comment">if u have any comments or issue let us to solve it</label>
                                        <div class="input-group">
                                            <textarea name="comment" id="comment" cols="30" rows="3" class="form-control" placeholder="comment.."></textarea>
                                        </div>
                                        @error('comment')
                                            <div class="alert alert-danger">
                                                <span>{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <button type="submit" class="form-control btn btn-primary">Send A Message</button>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p>QuizzesHub :)</p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>