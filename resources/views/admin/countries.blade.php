@extends('layouts.dashboard')

@section('breadcrumbs')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ config('app.name', 'ARSUS manager') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Country list') }}</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
@endsection



@section('content')
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-desktop'></i> Country list <span class='fw-300'>{{ \Auth::user()->role->name }}</span>
            <small>
                {{ __('List of available countries') }}
            </small>
        </h1>
        <div class="subheader-block">
            {{('You can choose and/or add country')}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-hdr">
                    <h2>
                        {{ __('Country') }} <span class="fw-300"><i>List</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table table-striped">
                            <tr class="bg-primary">
                                <th>&nbsp;</th>
                                <th>{{ __('Country name') }}</th>
                                <th>{{ __('Country code') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            @foreach ($countries as $c)
                                <tr>
                                    <td>
                                        @if (\File::exists(public_path('themes/frontpage/images/flags/sm/'. $c->country_code.'.png')))
                                            <img src="{{ url('themes/frontpage/images/flags/sm/'. $c->country_code.'.png') }}" class="img-fluid"> 
                                        @endif
                                    </td>
                                    <td><a href="{{ url('admin/countries/'.$c->id.($apphelper->queryToURL(\Request::query()))) }}">{{ $c->country_name }}</td>
                                    <td>{{ $c->country_code }}</td>
                                    <td>
                                        <a href="{{ url('admin/countries/'.$c->id.($apphelper->queryToURL(\Request::query()))) }}" class="btn btn-xs btn-default"><i class="fal fa-edit"></i> {{ __('Edit') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="panel-content p-2 pb-0 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-muted">
                    {{ $countries->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <form action="{{ url('country'. ($id ? '/'.$id: null).($apphelper->queryToURL(\Request::query()))) }}" method="POST">
                <div class="panel">
                    <div class="panel-hdr">
                        <h2>
                            {{ __('Country') }} <span class="fw-300"><i>{{ !$id ? __('Add country'): __('Edit country') }}</i></span>
                        </h2>
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="country_name">{{ __('Country name') }}</label>
                                <input type="text" id="country_name" name="country_name" class="form-control" placeholder="{{ __('Name') }}" value="{!! !is_null($country) ? $country->country_name: old('country_name') !!}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="country_code">{{ __('Country code') }}</label>
                                <input type="text" id="country_code" name="country_code" class="form-control" placeholder="{{ __('Code') }}" value="{!! !is_null($country) ? $country->country_code: old('country_code') !!}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="thumbnails">{{ __('Flag') }}
                                @if (!is_null($country) && \File::exists(public_path('themes/frontpage/images/flags/sm/'. $country->country_code.'.png')))
                                    : <img src="{{ url('themes/frontpage/images/flags/sm/'. $country->country_code.'.png') }}" class="img-fluid"> {{ __('change') }}
                                @endif</label>
                                <input type="file" id="thumbnails" name="thumbnails" class="form-control" placeholder="{{ __('Code') }}">
                            </div>
                        </div>
                    </div>
                    <div class="panel-content p-2 pb-0 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-muted">
                        <button type="button" class="btn btn-lg btn-success waves-effect waves-themed">
                            <span class="fal fa-save mr-1"></span>
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection