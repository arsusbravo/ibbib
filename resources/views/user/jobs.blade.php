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
                    <h1>Graphics Designer</h1>
                </div>		
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Graphics Design</li>
                </ol>
                <div class="banner-form">
                    <form action="#">
                        <input type="text" class="form-control" placeholder="Job Keyword">
                        <div class="dropdown tr-change-dropdown">
                            <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">Location</span><i class="fa fa-angle-down"></i></a>
                            <ul class="dropdown-menu tr-change">
                                <li><a href="#">Location</a></li>
                                <li><a href="#">Location 1</a></li>
                                <li><a href="#">Location 2</a></li>
                                <li><a href="#">Location 3</a></li>
                            </ul>								
                        </div><!-- /.category-change -->
                        <button type="submit" class="btn btn-primary" value="Search">Search</button>
                    </form>
                </div><!-- /.banner-form -->				
            </div>
        </div><!-- /.container -->
    </div>
@endsection

@section('content')
    <div class="jobs-listing section-padding">
        <div class="container">
            <div class="job-topbar">
                <span class="pull-left">Filter jobs by</span>
                <ul class="nav nav-tabs job-tabs" role="tablist">
                    <li>235 Total jobs</li>
                    <li role="presentation" class="active"><a href="#four-colum" aria-controls="four-colum" role="tab" data-toggle="tab"><i class="fa fa-th" aria-hidden="true"></i></a></li>
                    <li role="presentation"><a href="#two-column" aria-controls="two-column" role="tab" data-toggle="tab"><i class="fa fa-th-list" aria-hidden="true"></i></a></li>
                </ul>				
            </div>
            <div class="list-menu text-center clearfix">
                <ul class="tr-list">
                    <li class="dropdown tr-change-dropdown">	
                        Category:					
                        <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">Designer</span><i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu tr-change">
                            <li><a href="#">Designer</a></li>
                            <li><a href="#">Marketing</a></li>
                            <li><a href="#">Developement</a></li>
                        </ul>								
                    </li>
                    <li class="dropdown tr-change-dropdown">	
                        Level:					
                        <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">Mid</span><i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu tr-change">
                            <li><a href="#">Top Level</a></li>
                            <li><a href="#">Mid Level</a></li>
                            <li><a href="#">Entry Level</a></li>
                        </ul>								
                    </li>
                    <li class="dropdown tr-change-dropdown">	
                        Org Type:					
                        <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">Private</span><i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu tr-change">
                            <li><a href="#">Private</a></li>
                            <li><a href="#">public</a></li>
                        </ul>								
                    </li>
                    <li class="dropdown tr-change-dropdown">	
                        Location:					
                        <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">USA</span><i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu tr-change">
                            <li><a href="#">USA</a></li>
                            <li><a href="#">London</a></li>
                            <li><a href="#">New York</a></li>
                        </ul>								
                    </li>
                    <li class="dropdown tr-change-dropdown">	
                        Salary:					
                        <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">0 - 50K</span><i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu tr-change">
                            <li><a href="#">0 - 50K</a></li>
                            <li><a href="#">50k - 70K</a></li>
                            <li><a href="#">70k - 85K</a></li>
                        </ul>								
                    </li>
                </ul>				
            </div><!-- /.list-menu -->

            <div class="tab-content tr-job-posted">
                <div role="tabpanel" class="tab-pane fade show active" id="four-colum">
                    @include('front.projects')			
                </div><!-- /.tab-pane -->
            </div><!-- /.tab-content -->		
        </div><!-- /.container -->		
    </div>
@endsection
