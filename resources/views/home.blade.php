@extends('layouts.front')

@section('content-top')
    <div class="tr-users section-before bg-image">
        <div class="container text-center">
            <div class="row">
                <div class="col-sm-6">
                    <div class="job-find">
                        <div class="icon">
                            <i class="fa fa-user fa-4x"></i>
                        </div>
                        <h1>{{ __('Find a Project') }}</h1>
                        <span>5,798,298 {{ __('projects') }} </span>
                        <a href="{{ url('register?as=crew') }}" class="btn btn-primary">{{ __('Search Projects') }}</a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="for-employers">
                        <div class="icon">
                            <i class="fa fa-user-secret fa-4x"></i>
                        </div>
                        <h1>{{ __('Find translator') }}</h1>
                        <span>5,798,298 {{ __('translators') }}</span>
                        <a href="{{ url('register?as=customer') }}" class="btn btn-primary">{{ __('Post a Project') }}</a>
                    </div>
                </div>
            </div>
        </div><!-- /.container -->
    </div><!-- /.tr-users -->
@endsection

@section('content')
    <div class="tr-job-posted section-padding">
        <div class="container">
            <div class="section-title">
                <h1>{{ __('Our current translation jobs') }}</h1>
            </div>
            <div class="job-tab text-center">
                <ul class="nav nav-tabs justify-content-center" role="tablist">
                    <li role="presentation" class="active"><a href="#hot-jobs" aria-controls="hot-jobs" role="tab" data-toggle="tab">Hot Jobs</a></li>
                    <li role="presentation"><a href="#recent-jobs" aria-controls="recent-jobs" role="tab" data-toggle="tab">Recent Jobs</a></li>
                    <li role="presentation"><a href="#popular-jobs" aria-controls="popular-jobs" role="tab" data-toggle="tab">Popular Jobs</a></li>
                </ul>
                <div class="tab-content text-left">
                    <div role="tabpanel" class="tab-pane fade in show active" id="hot-jobs">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="job-item">
                                    <div class="item-overlay">
                                        <div class="job-info">
                                            <a href="#" class="btn btn-primary">Full Time</a>
                                            <span class="tr-title">
                                                <a href="job-details.html">Project Manager</a>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/1.png') }}" alt="images" class="img-fluid">
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
                                                <a href="job-details.html">Design Associate</a>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/2.png') }}" alt="images" class="img-fluid">
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
                                                <a href="job-details.html">Graphic Designer</a>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/3.png') }}" alt="images" class="img-fluid">
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
                                                <a href="job-details.html">Design Consultant</a>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/4.png') }}" alt="images" class="img-fluid">
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
                            <div class="col-md-6 col-lg-3">
                                <div class="job-item">
                                    <div class="item-overlay">
                                        <div class="job-info">
                                            <a href="#" class="btn btn-primary">Part Time</a>
                                            <span class="tr-title">
                                                <a href="job-details.html">Project Manager</a>
                                                <span><a href="#">Sky Creative</a></span>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/5.png') }}" alt="images" class="img-fluid">
                                        </div>
                                        <span class="tr-title">
                                            <a href="#">Project Manager</a>
                                            <span><a href="#">Sky Creative</a></span>
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
                                                <a href="job-details.html">Design Associate</a>
                                                <span><a href="#">Pencil</a></span>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/6.png') }}" alt="images" class="img-fluid">
                                        </div>
                                        <span class="tr-title">
                                            <a href="#">Design Associate</a>
                                            <span><a href="#">Pencil</a></span>
                                        </span>
                                        <ul class="tr-list job-meta">
                                            <li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
                                            <li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
                                            <li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
                                        </ul>
                                        <div class="time">
                                            <a href="#"><span class="freelance">Freelance</span></a>
                                            <span class="pull-right">Posted 23 hours ago</span>
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
                                                <a href="job-details.html">Graphic Designer</a>
                                                <span><a href="#">Fox</a></span>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/7.png') }}" alt="images" class="img-fluid">
                                        </div>
                                        <span class="tr-title">
                                            <a href="#">Graphic Designer</a>
                                            <span><a href="#">Fox</a></span>
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
                            <div class="col-md-6 col-lg-3">
                                <div class="job-item">
                                    <div class="item-overlay">
                                        <div class="job-info">
                                            <a href="#"><span class="btn btn-primary">Part Time</span></a>
                                            <span class="tr-title">
                                                <a href="job-details.html">Design Consultant</a>
                                                <span><a href="#">Owl</a></span>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/8.png') }}" alt="images" class="img-fluid">
                                        </div>
                                        <span class="tr-title">
                                            <a href="#">Design Consultant</a>
                                            <span><a href="#">Owl</a></span>
                                        </span>
                                        <ul class="tr-list job-meta">
                                            <li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
                                            <li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
                                            <li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
                                        </ul>
                                        <div class="time">
                                            <a href="#"><span class="part-time">Part Time</span></a>
                                            <span class="pull-right">Posted 10 day ago</span>
                                        </div>			
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.row -->
                    </div><!-- /.tab-pane -->
                    <div role="tabpanel" class="tab-pane fade in" id="recent-jobs">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="job-item">
                                    <div class="item-overlay">
                                        <div class="job-info">
                                            <a href="#" class="btn btn-primary">Part Time</a>
                                            <span class="tr-title">
                                                <a href="job-details.html">Design Associate</a>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/2.png') }}" alt="images" class="img-fluid">
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
                                            <a href="#" class="btn btn-primary">Full Time</a>
                                            <span class="tr-title">
                                                <a href="job-details.html">Project Manager</a>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/1.png') }}" alt="images" class="img-fluid">
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
                                                <a href="job-details.html">Design Consultant</a>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/4.png') }}" alt="images" class="img-fluid">
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
                                            <a href="#"><span class="part-time">Part Time</span></a>
                                            <span class="pull-right">Posted Oct 09, 2017</span>
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
                                                <a href="job-details.html">Graphic Designer</a>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/3.png') }}" alt="images" class="img-fluid">
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
                                                <a href="job-details.html">Design Associate</a>
                                                <span><a href="#">Pencil</a></span>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/6.png') }}" alt="images" class="img-fluid">
                                        </div>
                                        <span class="tr-title">
                                            <a href="#">Design Associate</a>
                                            <span><a href="#">Pencil</a></span>
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
                                            <a href="#" class="btn btn-primary">Freelance</a>
                                            <span class="tr-title">
                                                <a href="job-details.html">Project Manager</a>
                                                <span><a href="#">Sky Creative</a></span>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/5.png') }}" alt="images" class="img-fluid">
                                        </div>
                                        <span class="tr-title">
                                            <a href="#">Project Manager</a>
                                            <span><a href="#">Sky Creative</a></span>
                                        </span>
                                        <ul class="tr-list job-meta">
                                            <li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
                                            <li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
                                            <li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
                                        </ul>
                                        <div class="time">
                                            <a href="#"><span class="freelance">Freelance</span></a>
                                            <span class="pull-right">Posted 1 day ago</span>
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
                                                <a href="job-details.html">Design Consultant</a>
                                                <span><a href="#">Owl</a></span>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/8.png') }}" alt="images" class="img-fluid">
                                        </div>
                                        <span class="tr-title">
                                            <a href="#">Design Consultant</a>
                                            <span><a href="#">Owl</a></span>
                                        </span>
                                        <ul class="tr-list job-meta">
                                            <li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
                                            <li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
                                            <li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
                                        </ul>
                                        <div class="time">
                                            <a href="#"><span class="part-time">Part Time</span></a>
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
                                                <a href="job-details.html">Graphic Designer</a>
                                                <span><a href="#">Fox</a></span>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/7.png') }}" alt="images" class="img-fluid">
                                        </div>
                                        <span class="tr-title">
                                            <a href="#">Graphic Designer</a>
                                            <span><a href="#">Fox</a></span>
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
                        </div><!-- /.row -->	
                    </div><!-- /.tab-pane -->
                    <div role="tabpanel" class="tab-pane fade in" id="popular-jobs">
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="job-item">
                                    <div class="item-overlay">
                                        <div class="job-info">
                                            <a href="#" class="btn btn-primary">Full Time</a>
                                            <span class="tr-title">
                                                <a href="job-details.html">Graphic Designer</a>
                                                <span><a href="#">Fox</a></span>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/7.png') }}" alt="images" class="img-fluid">
                                        </div>
                                        <span class="tr-title">
                                            <a href="#">Graphic Designer</a>
                                            <span><a href="#">Fox</a></span>
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
                            <div class="col-md-6 col-lg-3">
                                <div class="job-item">
                                    <div class="item-overlay">
                                        <div class="job-info">
                                            <a href="#" class="btn btn-primary">Part Time</a>
                                            <span class="tr-title">
                                                <a href="job-details.html">Design Associate</a>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/2.png') }}" alt="images" class="img-fluid">
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
                                            <a href="#" class="btn btn-primary">Full Time</a>
                                            <span class="tr-title">
                                                <a href="job-details.html">Project Manager</a>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/1.png') }}" alt="images" class="img-fluid">
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
                                            <a href="#" class="btn btn-primary">Freelance</a>
                                            <span class="tr-title">
                                                <a href="job-details.html">Graphic Designer</a>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/3.png') }}" alt="images" class="img-fluid">
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
                                                <a href="job-details.html">Design Consultant</a>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/4.png') }}" alt="images" class="img-fluid">
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
                            <div class="col-md-6 col-lg-3">
                                <div class="job-item">
                                    <div class="item-overlay">
                                        <div class="job-info">
                                            <a href="#" class="btn btn-primary">Freelance</a>
                                            <span class="tr-title">
                                                <a href="job-details.html">Design Associate</a>
                                                <span><a href="#">Pencil</a></span>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/6.png') }}" alt="images" class="img-fluid">
                                        </div>
                                        <span class="tr-title">
                                            <a href="#">Design Associate</a>
                                            <span><a href="#">Pencil</a></span>
                                        </span>
                                        <ul class="tr-list job-meta">
                                            <li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
                                            <li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
                                            <li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
                                        </ul>	
                                        <div class="time">
                                            <a href="#"><span class="freelance">Freelance</span></a>
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
                                                <a href="job-details.html">Design Consultant</a>
                                                <span><a href="#">Owl</a></span>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/8.png') }}" alt="images" class="img-fluid">
                                        </div>
                                        <span class="tr-title">
                                            <a href="#">Design Consultant</a>
                                            <span><a href="#">Owl</a></span>
                                        </span>
                                        <ul class="tr-list job-meta">
                                            <li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
                                            <li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
                                            <li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
                                        </ul>
                                        <div class="time">
                                            <a href="#"><span class="part-time">Part Time</span></a>
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
                                                <a href="job-details.html">Project Manager</a>
                                                <span><a href="#">Sky Creative</a></span>
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
                                                <li><a href="job-details.html"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>										
                                    </div>								
                                    <div class="job-info">
                                        <div class="company-logo">
                                            <img src="{{ url('themes/frontpage/images/job/5.png') }}" alt="images" class="img-fluid">
                                        </div>
                                        <span class="tr-title">
                                            <a href="#">Project Manager</a>
                                            <span><a href="#">Sky Creative</a></span>
                                        </span>
                                        <ul class="tr-list job-meta">
                                            <li><span><i class="fa fa-map-signs" aria-hidden="true"></i></span>San Francisco, CA, US</li>
                                            <li><span><i class="fa fa-briefcase" aria-hidden="true"></i></span>Mid Level</li>
                                            <li><span><i class="fa fa-money" aria-hidden="true"></i></span>$5,000 - $6,000</li>
                                        </ul>
                                        <div class="time">
                                            <a href="#"><span>Full Time</span></a>
                                            <span class="pull-right">Posted 1 day ago</span>
                                        </div>				
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.row -->	
                    </div><!-- /.tab-pane -->
                </div>				
            </div><!-- /.job-tab -->			
        </div><!-- /.container -->
    </div><!-- /.tr-job-posted -->

    <div class="tr-cta">
        <div class="container">
            <div class="cta-content section">
                <div class="cta-info">
                    <div class="pull-left">
                        <h1>Add your resume and let your next job find you.</h1>
                    </div>
                    <a href="#" class="btn btn-primary pull-right">Add Your Resume</a>
                </div>
            </div><!-- /.cta-content -->
        </div><!-- /.container -->
    </div><!-- /.tr-cta -->	

    <div class="tr-fun-fact section-padding">
        <div class="container">
            <div class="fun-fact-content">
                <div class="row text-center">
                    <div class="col-sm-4">
                        <div class="fun-fact">
                            <img src="{{ url('themes/frontpage/images/icons/fun-fact-color1.png') }}" alt="images" class="img-fluid">
                            <h1 class="counter">3,412</h1>
                            <span>Live Jobs</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="fun-fact">
                            <img src="{{ url('themes/frontpage/images/icons/fun-fact-color2.png') }}" alt="images" class="img-fluid">
                            <h1 class="counter">12,043</h1>
                            <span>Total Company</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="fun-fact">
                            <img src="{{ url('themes/frontpage/images/icons/fun-fact-color3.png') }}" alt="images" class="img-fluid">
                            <h1 class="counter">5,798,298</h1>
                            <span>Total Candidate</span>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                        </div>
                    </div>
                </div><!-- /.row -->				
            </div><!-- /.fun-fact-content -->
        </div><!-- /.container -->
    </div><!-- /.tr-fun-fact -->

    <div class="tr-testimonial-2 text-center">
        <div class="container">
            <div class="section-title">
                <h1>Kind Words From Happy Candidates</h1>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="testimonial">
                        <div class="testimonial-info">
                            <p>‘’ Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore aliqua. Ut enim ad minim veniam, quis nostrud exer ‘’</p>
                        </div>
                        <div class="testimonial-image">
                            <img src="{{ url('themes/frontpage/images/others/testimonial-img.png') }}" alt="Imag" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="testimonial">
                        <div class="testimonial-info">
                            <p>‘’ Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore aliqua. Ut enim ad minim veniam, quis nostrud exer ‘’</p>
                        </div>
                        <div class="testimonial-image">
                            <img src="{{ url('themes/frontpage/images/others/testimonial-img.png') }}" alt="Imag" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="testimonial">
                        <div class="testimonial-info">
                            <p>“Unt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque ”</p>
                        </div>
                        <div class="testimonial-image">
                            <img src="{{ url('themes/frontpage/images/others/testimonial-img.png') }}" alt="Imag" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="testimonial">
                        <div class="testimonial-info">
                            <p>“ Ommodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat ”</p>
                        </div>
                        <div class="testimonial-image">
                            <img src="{{ url('themes/frontpage/images/others/testimonial-img.png') }}" alt="Imag" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.tr-testimonial -->	

    <div class="tr-download-app bg-image section-padding section-before">
        <div class="container text-center">
            <h1>Download on App Store</h1>
            <div class="app-content">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="download-app">
                            <a href="#">
                                <div class="download-image">
                                    <img src="{{ url('themes/frontpage/images/icons/app1.png') }}" alt="Image" class="img-fluid">
                                </div>
                                <div class="download-info">
                                    <span>available on</span>
                                    <strong>Google Play</strong>
                                </div>
                            </a>					
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="download-app">
                            <a href="#">
                                <div class="download-image">
                                    <img src="{{ url('themes/frontpage/images/icons/app2.png') }}" alt="Image" class="img-fluid">
                                </div>
                                <div class="download-info">
                                    <span>available on</span>
                                    <strong>App Store</strong>
                                </div>
                            </a>					
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="download-app">
                            <a href="#">
                                <div class="download-image">
                                    <img src="{{ url('themes/frontpage/images/icons/app3.png') }}" alt="Image" class="img-fluid">
                                </div>
                                <div class="download-info">
                                    <span>available on</span>
                                    <strong>Windows Store</strong>
                                </div>
                            </a>										
                        </div>
                    </div>
                </div><!-- /.row -->				
            </div><!-- /.app-content -->
        </div><!-- /.contaioner -->
    </div><!--/. tr-download-app -->	
@endsection
