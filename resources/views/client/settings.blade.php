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
                            <li role="presentation"><a href="#company" aria-controls="company" role="tab" data-toggle="tab"><span><i class="fa fa-building" aria-hidden="true"></i></span> {{ __('Company info') }}</a></li>
                            <li role="presentation"><a href="#edit-company" aria-controls="edit-company" role="tab" data-toggle="tab"><span><i class="fa fa-pencil-square-o" aria-hidden="true"></i></span> {{ __('Edit company profile') }}</a></li>
                            <li role="presentation"><a href="#projects" aria-controls="projects" role="tab" data-toggle="tab"><span><i class="fa fa-language" aria-hidden="true"></i></span> {{ __('Open projects') }}</a></li>
                            <li role="presentation"><a href="#archived" aria-controls="archived" role="tab" data-toggle="tab"><span><i class="fa fa-clone" aria-hidden="true"></i></span> {{ __('Archived projects') }}</a></li>
                            <li role="presentation"><a href="#close-account" aria-controls="close-account" role="tab" data-toggle="tab"><span><i class="fa fa-scissors" aria-hidden="true"></i></span> {{ __('Close Account') }}</a></li>
                        </ul>
                    </div><!-- /.tr-sidebar -->        		
                </div>
                <div class="col-md-8 col-lg-9">
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane fade in show active account-info" id="account-info">	
                            @include('front.includes.client.info')
                        </div><!-- /.tab-pane -->

                        <div role="tabpanel" class="tab-pane section" id="company">
                            @include('front.includes.client.company')
                        </div><!-- /.tab-pane -->

                        <div role="tabpanel" class="tab-pane edit-company section" id="edit-company">
                            @include('client.includes.account.company_form')					
                        </div><!-- /.tab-pane -->

                        <div role="tabpanel" class="tab-pane projects" id="projects">
                            @include('front.projects')					
                        </div><!-- /.tab-pane -->

                        <div role="tabpanel" class="tab-pane archived" id="archived">
                            @include('client.includes.account.old_projects')		
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
