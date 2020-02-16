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
        .list-menu>ul>li { width:100% }
    </style>
@endsection

@section('content')
    <div class="jobs-listing section-padding">
        <div class="container">
            <div class="row mb-3">
                <div class="col-sm-8">
                    <div class="job-topbar mb-0">
                        <h2>{{ __('Find projects') }}</h2>		
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="list-menu">
                        <ul class="tr-list">
                            <li class="dropdown tr-change-dropdown">	
                                {{ __('Sort by') }}:					
                                <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">{{ \Request::query('orderBy') ? $orderbies[\Request::query('orderBy')]: __('Published date') }}</span><i class="fa fa-angle-down"></i></a>
                                <ul class="dropdown-menu tr-change">
                                    @foreach ($orderbies as $key=>$orderby)
                                        <li><a href="{{ url('user').$apphelper->queryToURL($params, ['orderby'=>$key]) }}">{{ $orderby }}</a></li>
                                    @endforeach
                                </ul>								
                            </li>
                        </ul>				
                    </div><!-- /.list-menu -->
                </div>
            </div>
            <div class="clearfix"></div>	
            <div class="tab-content tr-job-posted">
                <div role="tabpanel" class="tab-pane fade show active" id="four-colum">
                    @include('front.projects')			
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->
        </div><!-- /.container -->		
    </div>
@endsection
