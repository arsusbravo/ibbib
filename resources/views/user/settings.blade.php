@extends('layouts.front')

@section('content')
<div class="breadcrumb-info text-center">
    <div class="page-title mt-5 mb-5">
        <h1>{{ __('Your account') }}</h1>
    </div>		
</div>
<div class="tr-profile">
    <div class="container">
        <div class="row" id="tabs-profile">
            <div class="col-md-4 col-lg-3">
                <div class="tr-sidebar">
                    <ul class="nav nav-tabs profile-tabs section" role="tablist">
                        <li role="presentation"><a class="active" href="#account-info" aria-controls="account-info" role="tab" data-toggle="tab"><i class="fa fa-life-ring" aria-hidden="true"></i> {{ __('Account Info') }}</a></li>
                        <li role="presentation"><a href="#resume" aria-controls="resume" role="tab" data-toggle="tab"><span><i class="fa fa-user-o" aria-hidden="true"></i></span> {{ __('My Resume') }}</a></li>
                        <li role="presentation"><a href="#edit-resume" aria-controls="edit-resume" role="tab" data-toggle="tab"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> {{ __('Edit Resume') }}</a></li>
                        <li role="presentation"><a href="#bookmark" aria-controls="bookmark" role="tab" data-toggle="tab"><span><i class="fa fa-bookmark-o" aria-hidden="true"></i></span> {{ __('Bookmark') }}</a></li>
                        <li role="presentation"><a href="#archived" aria-controls="archived" role="tab" data-toggle="tab"><span><i class="fa fa-clone" aria-hidden="true"></i></span> {{ __('Archived Apply Job') }}</a></li>
                        <li role="presentation"><a href="#close-account" aria-controls="close-account" role="tab" data-toggle="tab"><span><i class="fa fa-scissors" aria-hidden="true"></i></span> {{ __('Close Account') }}</a></li>
                    </ul>	
                    <a href="#" class="btn btn-primary"><i class="fa fa-cloud-download" aria-hidden="true"></i> <span>{{ __('Download Resume as doc') }}</span></a>		        			
                </div><!-- /.tr-sidebar -->        		
            </div>
            <div class="col-md-8 col-lg-9">
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in show active account-info" id="account-info">	
                        @include('front.includes.user.info')
                    </div><!-- /.tab-pane -->

                    <div role="tabpanel" class="tab-pane section" id="resume">
                        @include('front.includes.user.resume')
                    </div><!-- /.tab-pane -->

                    <div role="tabpanel" class="tab-pane edit-resume section" id="edit-resume">
                        @include('user.includes.account.resume_form')					
                    </div><!-- /.tab-pane -->

                    <div role="tabpanel" class="tab-pane bookmark" id="bookmark">
                        @include('user.includes.account.bookmark')					
                    </div><!-- /.tab-pane -->

                    <div role="tabpanel" class="tab-pane apply-job" id="archived">
                        @include('user.includes.account.applied')		
                    </div><!-- /.tab-pane -->

                    <div role="tabpanel" class="tab-pane section close-account" id="close-account">
                        <h1>Delete Your Account</h1>
                        <span>Are you sure, you want to delete your account?</span>
                        <div class="buttons">
                            <a href="#" class="btn btn-primary">Delete Account</a>
                            <a href="#" class="btn button-cancle">Cancle</a>
                        </div>
                    </div><!-- /.tab-pane -->
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</div>
@endsection
@section('script-bottom')
    <script>
        $('#tabs-profile .tab-content a[data-toggle="tab"]').click(function (e) {
            e.preventDefault();
            let target = $(this).attr('href');
            $('#tabs-profile .profile-tabs a[href="'+target+'"]').tab('show');
        });
    </script>
@endsection