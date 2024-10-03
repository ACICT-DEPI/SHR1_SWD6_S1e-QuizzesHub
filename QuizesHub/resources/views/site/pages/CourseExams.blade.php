@extends('site.layout.master')
@section('content')
@if(!empty($exams))
<div class="container-xxl py-5">
    <div class="container">
        <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
            <h6 class="section-title bg-white text-center text-primary px-3">Exams</h6>
            <h1 class="mb-5">{{ $course->name }} Exams</h1>
            
        </div>
        </div>

<!-- ------------------------------------------------------------------------------- -->

@foreach($exams as $exam)
<section  class="shadow-lg p-3 mb-5 bg-body rounded" style="max-width: 39rem;margin-left: 28%" >
   
        <h2 class="text-lg font-medium text-gray-900">
            <!-- {{ $exam->type }} -->
            <h5 class="text-primary text-uppercase mb-3 animated slideInDown" data-wow-delay="0.1s">{{ $exam->type }} Exam</h5>
            <h1>The Best {{ $exam->type }} Exam </h1>
             <p data-wow-delay="0.1s">You Can Start Exam Now</p>
             <p data-wow-delay="0.1s">{{$exam->date}}</p>
        </h2>
        <form method="get" action="{{ route('quiz.quiz', $exam->id) }}" class="mt-6 space-y-6">
        <button type="submit" class="btn btn-success mt-3" style="width: 35%; border-radius: 0.375rem; display: inline-block !important;" data-wow-delay="0.1s">
        {{ __('Start Exam ') }}
        </form>

</section>
@endforeach
@endif
<!-- ------------------------------------------------------------------------------- -->
                  
        
@endsection