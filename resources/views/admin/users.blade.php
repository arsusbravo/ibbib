@extends('layouts.dashboard')

@section('breadcrumbs')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ config('app.name', 'ARSUS manager') }}</a></li>
        <li class="breadcrumb-item active">{{ $title }} {{ __('list') }}</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
@endsection

@section('content')
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-desktop'></i> {{ $title }} list <span class='fw-300'>{{ \Auth::user()->role->name }}</span>
            <small>
                {{ __('List of') }} {{ $title }}
            </small>
        </h1>
        <div class="subheader-block">
            {{ __('You can choose and/or add') }} {{ $title }}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-hdr">
                    <h2>
                        {{ $title }} <span class="fw-300"><i>Found: {{ $count }} items</i></i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table table-striped">
                            <tr class="bg-primary">
                                <th>{{ $title }} {{ __('name') }}</th>
                                <th>{{ $title }} {{ __('email') }}</th>
                                @if ($slug == 'admin')
                                    <th>{{ __('Role') }}</th>
                                @endif
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            @foreach ($users as $usr)
                                <tr>
                                    <td><a href="{{ url('admin/user/'.$usr->id.($apphelper->queryToURL(\Request::query()))) }}">{{ $usr->name }}</a></td>
                                    <td>{{ $usr->email }}</td>
                                    @if ($slug == 'admin')
                                        <td>{{ $usr->role->name }}</td>
                                    @endif
                                    <td>
                                        <a href="{{ url('admin/user/'.$usr->id.($apphelper->queryToURL(\Request::query()))) }}" class="btn btn-xs btn-default"><i class="fal fa-edit"></i> {{ __('Edit') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="panel-content p-2 pb-0 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-muted">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <form action="{{ url('admin/user'.($apphelper->queryToURL(\Request::query()))) }}" method="POST">
                <div class="panel">
                    <div class="panel-hdr">
                        <h2>
                            {{ __('Role') }} <span class="fw-300"><i>{{ __('Add') }} {{ $title }}</i></span>
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="name">{{ __('Name') }}</label>
                                <input type="text" id="name" name="name" class="form-control" placeholder="{{ __('Name') }}" value="{!! old('name') !!}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="email">{{ __('E-mail') }}</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="{{ __('E-mail address') }}" value="{!! old('email') !!}">
                            </div>
                            @if ($slug == 'admin')
                                <div class="form-group">
                                    <label class="form-label" for="role_id">{{ __('Role') }}</label>
                                    <select name="role_id" id="role_id" class="form-control">
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->id }}">
                                                {{ $role->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            @else
                                <input type="hidden" name="role" value="{{ $slug }}">
                            @endif
                            <div class="form-group">
                                <label class="form-label" for="password">{{ __('Password') }}</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="{{ __('Password') }}" value="{!! old('password') !!}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="password">{{ __('Confirm password') }}</label>
                                <input type="password" id="confirm_password" name="confirm_password" class="form-control" placeholder="{{ __('Fill the password one more time for check') }}" value="{!! old('confirm_password') !!}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="thumbnails">{{ __('Activation') }}</label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="active" id="activation" checked>
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
    </div>
@endsection