@extends('layouts.front')

@section('content')
    <div class="breadcrumb-info text-center">
        <div class="page-title mt-5">
            <h1>{{ __('Your project') }}</h1>
            <p>{{ $project->title }}</p>
        </div>
    </div>
    <div class="job-details">
        <div class="container">
            @include('front.project-detail', ['project'=>$project])	
        </div><!-- /.container -->
    </div>
@endsection