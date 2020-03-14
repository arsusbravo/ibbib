@extends('layouts.dashboard')

@section('breadcrumbs')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ config('app.name', 'ARSUS manager') }}</a></li>
        <li class="breadcrumb-item active">{{ $user->name }}</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
@endsection

@section('content')
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-desktop'></i> Edit user <span class='fw-300'>{{ \Auth::user()->role->name }}</span>
            <small>
                {{ $user->name }}
            </small>
        </h1>
        <div class="subheader-block">
            {{ __('Edit user') }}: {{ $user->name }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ url('user'.($apphelper->queryToURL(\Request::query()))) }}" method="POST">
                <div class="panel">
                    <div class="panel-hdr">
                        <h2>
                            {{ __('User') }} <span class="fw-300"><i>{{ __('Edit user') }}</i></span>
                        </h2>
                        <div class="panel-toolbar">
                            <a href="{{ url('admin/users/'. $slug) }}" class="btn btn-xs btn-warning">
                                <i class="fal fa-arrow-left"></i> {{ __('Back to list') }}
                            </a>
                        </div>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="name">{{ __('Name') }}</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{!! $user->name !!}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">{{ __('E-mail') }}</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="{{ __('E-mail address') }}" value="{!! $user->email !!}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="role_id">{{ __('Role') }}</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"{!! $role->id == $user->role_id ? ' selected': null !!}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="password">{{ __('Password') }}</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('Password') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="password">{{ __('Confirm password') }}</label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="{{ __('Fill the password one more time for check') }}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="thumbnails">{{ __('Activation') }}</label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="active" id="activation"{{ $user->active ? ' checked': null }}>
                                    <label class="custom-control-label" for="activation">{{ __('Activated') }}</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-content p-2 pb-0 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-muted">
                        <button type="submit" class="btn btn-lg btn-success waves-effect waves-themed">
                            <span class="fal fa-save mr-1"></span>
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-6">
            @include('admin.includes.form-'.(in_array($user->role->slug, ['master', 'admin', 'worker']) ? 'admin': $user->role->slug));
        </div>
    </div>
@endsection

@section('script-top')
    <link rel="stylesheet" media="screen" href="{{ url('themes\dashboard\css\formplugins\select2\select2.bundle.css') }}">
@endsection

@section('script-bottom')
    <script src="{{ url('themes\dashboard\js\formplugins\select2\select2.bundle.js') }}"></script>
    <script>
        $('#country_id').select2({
            placeholder: 'Choose country'
        });
    </script>
@endsection