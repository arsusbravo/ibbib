@extends('layouts.front')

@section('content-top')
    <div class="tr-breadcrumb bg-image section-before">
        <div class="container">
            <div class="breadcrumb-info text-center">
                <div class="page-title">
                    <h1>Sign In</h1>
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
            <div class="account-content">
                <form class="tr-form" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="{{ __('Please Enter Your Email') }}">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="{{ __('Your password') }}">
                    </div>
                    <div class="user-option">
                        <div class="checkbox">
                            <label for="logged"><input type="checkbox" name="remember" id="logged">{{ __('Remember Me') }}</label>
                        </div>
                        <div class="forgot-password">
                            <a href="{{ route('password.request') }}">{{ __('I forgot password') }}</a>
                        </div>
                    </div>						
                    <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                </form>	
                <div class="new-user text-center">
                    <span><a href="{{ route('register') }}">{{ __('Create a New Account') }}</a> </span>
                </div>
            </div>
        </div>			
    </div><!-- container -->
</div><!-- /.tr-account-->
@endsection
