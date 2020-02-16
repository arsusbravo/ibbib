@extends('layouts.front')

@section('content-top')
    <div class="tr-breadcrumb bg-image section-before">
        <div class="container">
            <div class="breadcrumb-info text-center">
                @if (!$hasResume)
                    <div class="alert alert-danger">
                        <p>{{ __('You have not completed your resume. You need to show your resume to your potential clients to receive jobs.') }}</p>
                        <a href="{{ url('user/account') }}" class="btn btn-info">{{ __('Please update here') }}</a>
                    </div>
                @endif
                <div class="page-title">
                    <h1>{{ __('IBBIB Jobs') }} {{ __('Project list') }}</h1>
                </div>		
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">{{ __('Project list') }}</li>
                </ol>
                <div class="banner-form">
                    <form action="{{ url('user') }}" method="GET">
                        <input type="text" class="form-control" name="search" placeholder="{{ __('Job Keyword') }}" value="{!! \Request::query('search') !!}">
                        @if (count(\Request::query()))
                            @foreach (\Request::query() as $key=>$input)
                                @if ($key != 'search')
                                    <input type="hidden" name="{{ $key }}" value="{{ $input }}">
                                @endif
                            @endforeach
                        @endif
                        <button type="submit" class="btn btn-primary" value="Search">Search</button>
                    </form>
                </div><!-- /.banner-form -->				
            </div>
        </div><!-- /.container -->
    </div>
@endsection

@section('script-top')
    <style>
        .select-header.form-control { border:none }
        .list-menu>ul>li { float:none; width:100% }
    </style>
@endsection

@section('content')
    <div class="jobs-listing section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="job-topbar">
                        <span>{{ __('Find projects') }}</span>		
                    </div>
                    <div class="tab-content tr-job-posted">
                        <div role="tabpanel" class="tab-pane fade show active" id="four-colum">
                            @include('front.projects')			
                        </div><!-- /.tab-pane -->
                    </div><!-- /.tab-content -->
                </div><!-- /.tab-content -->
                <div class="col-md-3">
                    <div class="job-topbar">
                        <span class="pull-left">{{ __('Filter projects by') }}</span>		
                    </div>
                    <div class="list-menu">
                        <ul class="tr-list">
                            <li class="dropdown dropleft tr-change-dropdown">	
                                {{ __('Source language') }}:					
                                <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">{{ !is_null($from) ? $from: __('All') }}</span><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu tr-change">
                                    @foreach ($languages as $lang)
                                        <li><a href="{{ url('user').$apphelper->queryToURL($params, ['from'=>$lang->id]) }}"><img src="{{ url('themes/frontpage/images/flags/sm/'.strtoupper($lang->code).'.png') }}" class="img-fluid"> {{ $lang->name }}</a></li>
                                    @endforeach
                                </ul>								
                            </li>
                            <li class="dropdown dropleft tr-change-dropdown">	
                                {{ __('Target language') }}:					
                                <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">{{ !is_null($to) ? $to: __('All') }}</span><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu tr-change">
                                    @foreach ($languages as $lang)
                                        <li><a href="{{ url('user').$apphelper->queryToURL($params, ['to'=>$lang->id]) }}"><img src="{{ url('themes/frontpage/images/flags/sm/'.strtoupper($lang->code).'.png') }}" class="img-fluid"> {{ $lang->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>				
                    </div><!-- /.list-menu -->	
                </div>
            </div>	
        </div><!-- /.container -->		
    </div>
@endsection
