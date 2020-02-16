
@extends('layouts.front')

@section('content-top')
    <div class="tr-breadcrumb bg-project section-before">
        <div class="container">
            <div class="breadcrumb-info text-center">
                <div class="breadcrumb-logo">
                    <img src="{{ url('themes/frontpage/images/others/company-logo.png') }}" alt="Logo" class="img-fluid">
                </div>
                <div class="page-title">
                    <h1>{!! $project->title !!}</h1>
                </div>
                <ul class="tr-list job-meta list-inline">
                    <li><i class="fa fa-language" aria-hidden="true"></i>{{ $project->skill->languageSkill->translateFrom->name }} to {{ $project->skill->languageSkill->translateTo->name }}</li>
                    <li><i class="fa fa-hourglass-start" aria-hidden="true"></i>{{ __('Application Deadline') }} : {{ \Carbon\Carbon::parse($project->deadline)->format('M d, Y') }}</li>
                </ul>	
                <div class="buttons">
                    <a href="{{ url('user/apply/'. $project->id) }}" class="btn btn-primary"><i class="fa fa-briefcase" aria-hidden="true"></i>{{ __('Apply For This Project') }}</a>
                    @if (!$bookmarked)
                        <a href="{{ url('user/bookmark/'. $project->id) }}" class="btn button-bookmark"><i class="fa fa-bookmark" aria-hidden="true"></i>{{ __('Bookmark') }}</a>
                    @endif
                    <span class="btn button-share"><i class="fa fa-share-alt" aria-hidden="true"></i>{{ __('Share') }} <span><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></span></span>
                </div>		
            </div>
        </div><!-- /.container -->
    </div>
@endsection

@section('script-top')
    <style>
        .bg-project { background-image: url({{ url('themes/frontpage/images/bg/project.jpg') }}) }
    </style>
@endsection

@section('content')
    <div class="job-details section-padding">
        <div class="container">
            @include('front.project-detail', ['project'=>$project])	
            <div class="tr-cta">
                <div class="cta-content section">
                    <div class="cta-info">
                        <div class="pull-left">
                            <h1>{{ __('Apply for this translation project') }}</h1>
                        </div>
                        <a href="{{ url('user/apply/'. $project->id) }}" class="btn btn-primary pull-right">{{ __('Apply') }}</a>
                    </div>
                </div><!-- /.cta-content -->
            </div><!-- /.tr-cta -->

            <div class="tr-job-posted similar-jobs">
                <span class="tr-title">{{ __('Similar Projects') }}</span>
                @include('front.projects', ['projects' => $otherprojects, 'empty_msg' => __('There is no other similar projects')])
            </div><!-- /.tr-job-posted -->	
        </div><!-- /.container -->
    </div>
@endsection