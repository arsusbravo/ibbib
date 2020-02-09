
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
        <div class="tr-cta">
            <div class="cta-content section">
                <div class="cta-info">
                    <div class="pull-left">
                        <h1>Add your resume and let your next job find you.</h1>
                    </div>
                    <a href="#" class="btn btn-primary pull-right">Add Your Resume</a>
                </div>
            </div><!-- /.cta-content -->
        </div><!-- /.tr-cta -->

        <div class="tr-job-posted similar-jobs">
            <span class="tr-title">Similar Jobs Post</span>
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="job-item">
                        <div class="item-overlay">
                            <div class="job-info">
                                <a href="#" class="btn btn-primary">Full Time</a>
                                <span class="tr-title">
                                    <a href="#">Project Manager</a>
                                    <span><a href="#">Dig File</a></span>
                                </span>
                                <ul class="tr-list job-meta">
                                    <li><i class="fa fa-map-signs" aria-hidden="true"></i>San Francisco, CA, US</li>
                                    <li><i class="fa fa-briefcase" aria-hidden="true"></i>Mid Level</li>
                                    <li><i class="fa fa-money" aria-hidden="true"></i>$5,000 - $6,000</li>
                                </ul>
                                <ul class="job-social tr-list">
                                    <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-expand" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>										
                        </div>
                        <div class="job-info">
                            <div class="company-logo">
                                <img src="images/job/1.png" alt="images" class="img-fluid">
                            </div>
                            <span class="tr-title">
                                <a href="#">Project Manager</a>
                                <span><a href="#">Dig File</a></span>
                            </span>
                            <ul class="tr-list job-meta">
                                <li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
                                <li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
                                <li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
                            </ul>
                            <div class="time">
                                <a href="#"><span>Full Time</span></a>
                                <span class="pull-right">Posted 23 hours ago</span>
                            </div>																				
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="job-item">
                        <div class="item-overlay">
                            <div class="job-info">
                                <a href="#" class="btn btn-primary">Part Time</a>
                                <span class="tr-title">
                                    <a href="#">Design Associate</a>
                                    <span><a href="#">Loop</a></span>
                                </span>
                                <ul class="tr-list job-meta">
                                    <li><i class="fa fa-map-signs" aria-hidden="true"></i>San Francisco, CA, US</li>
                                    <li><i class="fa fa-briefcase" aria-hidden="true"></i>Mid Level</li>
                                    <li><i class="fa fa-money" aria-hidden="true"></i>$5,000 - $6,000</li>
                                </ul>
                                <ul class="job-social tr-list">
                                    <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-expand" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>										
                        </div>								
                        <div class="job-info">
                            <div class="company-logo">
                                <img src="images/job/2.png" alt="images" class="img-fluid">
                            </div>
                            <span class="tr-title">
                                <a href="#">Design Associate</a>
                                <span><a href="#">Loop</a></span>
                            </span>
                            <ul class="tr-list job-meta">
                                <li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
                                <li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
                                <li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
                            </ul>
                            <div class="time">
                                <a href="#"><span class="part-time">Part Time</span></a>
                                <span class="pull-right">Posted 1 day ago</span>
                            </div>			
                        </div>
                    </div>
                </div>	
                <div class="col-md-6 col-lg-3">
                    <div class="job-item">
                        <div class="item-overlay">
                            <div class="job-info">
                                <a href="#" class="btn btn-primary">Freelance</a>
                                <span class="tr-title">
                                    <a href="#">Graphic Designer</a>
                                    <span><a href="#">Humanity Creative</a></span>
                                </span>
                                <ul class="tr-list job-meta">
                                    <li><i class="fa fa-map-signs" aria-hidden="true"></i>San Francisco, CA, US</li>
                                    <li><i class="fa fa-briefcase" aria-hidden="true"></i>Mid Level</li>
                                    <li><i class="fa fa-money" aria-hidden="true"></i>$5,000 - $6,000</li>
                                </ul>
                                <ul class="job-social tr-list">
                                    <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-expand" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>										
                        </div>								
                        <div class="job-info">
                            <div class="company-logo">
                                <img src="images/job/3.png" alt="images" class="img-fluid">
                            </div>
                            <span class="tr-title">
                                <a href="#">Graphic Designer</a>
                                <span><a href="#">Humanity Creative</a></span>
                            </span>
                            <ul class="tr-list job-meta">
                                <li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
                                <li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
                                <li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
                            </ul>
                            <div class="time">
                                <a href="#"><span class="freelance">Freelance</span></a>
                                <span class="pull-right">Posted 10 day ago</span>
                            </div>			
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="job-item">
                        <div class="item-overlay">
                            <div class="job-info">
                                <a href="#" class="btn btn-primary">Full Time</a>
                                <span class="tr-title">
                                    <a href="#">Design Consultant</a>
                                    <span><a href="#">Families</a></span>
                                </span>
                                <ul class="tr-list job-meta">
                                    <li><i class="fa fa-map-signs" aria-hidden="true"></i>San Francisco, CA, US</li>
                                    <li><i class="fa fa-briefcase" aria-hidden="true"></i>Mid Level</li>
                                    <li><i class="fa fa-money" aria-hidden="true"></i>$5,000 - $6,000</li>
                                </ul>
                                <ul class="job-social tr-list">
                                    <li><a href="#"><i class="fa fa-heart-o" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-expand" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-bookmark-o" aria-hidden="true"></i></a></li>
                                    <li><a href="#"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                </ul>
                            </div>										
                        </div>								
                        <div class="job-info">
                            <div class="company-logo">
                                <img src="images/job/4.png" alt="images" class="img-fluid">
                            </div>
                            <span class="tr-title">
                                <a href="#">Design Consultant</a>
                                <span><a href="#">Families</a></span>
                            </span>
                            <ul class="tr-list job-meta">
                                <li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
                                <li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
                                <li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
                            </ul>
                            <div class="time">
                                <a href="#"><span>Full Time</span></a>
                                <span class="pull-right">Posted Oct 09, 2017</span>
                            </div>				
                        </div>
                    </div>
                </div>													
            </div>
        </div><!-- /.tr-job-posted -->	
    </div>
@endsection