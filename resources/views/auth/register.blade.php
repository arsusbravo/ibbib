@extends('layouts.front')

@section('content-top')
    <div class="tr-breadcrumb bg-image section-before">
        <div class="container">
            <div class="breadcrumb-info text-center">
                <div class="page-title">
                    <h1>Create a New Account</h1>
                    <span>Lorem Ipsum is simply dummy text of the printing pesetting.</span>
                </div>				
            </div>
        </div><!-- /.container -->
    </div><!-- tr-breadcrumb -->
@endsection

@section('content')
    <div class="tr-account section-padding">
        <div class="container text-center">
            <div class="user-account">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs  nav-justified" role="tablist">
                    <li role="presentation"><a {!! \Request::query('as') == 'crew' || is_null(\Request::query('as')) ? 'class="active"': '' !!}href="#seeker" aria-controls="seeker" role="tab" data-toggle="tab">{{ __('Translator') }}</a></li>
                    <li role="presentation"><a {!! \Request::query('as') == 'customer' ? 'class="active"': '' !!}href="#employers" aria-controls="employers" role="tab" data-toggle="tab">{{ __('Project owner') }}</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane{!! \Request::query('as') == 'crew' || is_null(\Request::query('as')) ? ' active': '' !!}" id="seeker">
                        <div class="account-content">
                            @include('auth.includes.register', ['as'=>'crew'])
                            <div class="new-user text-center">
                                <span>{{ __('Already Registered?') }} <a href="{{ route('login') }}">{{ __('Sign in') }}</a> </span>
                            </div>
                        </div>
                    </div>
                    <div role="tabpanel" class="tab-pane{!! \Request::query('as') == 'customer' ? ' active': '' !!}" id="employers">
                        <div class="account-content">
                            @include('auth.includes.register', ['as'=>'customer'])
                            <div class="new-user text-center">
                                <span>Already Registered? <a href="signin.html">Sign in</a> </span>
                            </div>
                        </div>
                    </div>
                </div>				
            </div>				
        </div><!-- container -->
    </div><!-- /.tr-account-->
@endsection
