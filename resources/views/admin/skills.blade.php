@extends('layouts.dashboard')

@section('breadcrumbs')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ config('app.name', 'ARSUS manager') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Language skills') }}</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
@endsection

@section('content')
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-desktop'></i> Language skill list <span class='fw-300'>{{ \Auth::user()->role->name }}</span>
            <small>
                {{ __('List of available language skills') }}
            </small>
        </h1>
        <div class="subheader-block">
            {{('You can choose and/or add skill')}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-hdr">
                    <h2>
                        {{ __('Available') }} <span class="fw-300"><i>{{ __('language skills') }}</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table table-striped">
                            <tr class="bg-primary">
                                <th>{{ __('Language source') }}</th>
                                <th>{{ __('Language target') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            @foreach ($skills as $sk)
                                <tr>
                                    <td>
                                        @if ($sk->languageSkill->translateFrom && \File::exists(public_path('themes/frontpage/images/flags/sm/'. $sk->languageSkill->translateFrom->flag->country_code.'.png')))
                                            <img src="{{ url('themes/frontpage/images/flags/sm/'. $sk->languageSkill->translateFrom->flag->country_code.'.png') }}" class="img-fluid"> 
                                        @endif
                                        &nbsp;{{ $sk->languageSkill->translateFrom->name }}
                                    </td>
                                    <td>
                                        @if ($sk->languageSkill->translateTo && \File::exists(public_path('themes/frontpage/images/flags/sm/'. $sk->languageSkill->translateTo->flag->country_code.'.png')))
                                            <img src="{{ url('themes/frontpage/images/flags/sm/'. $sk->languageSkill->translateTo->flag->country_code.'.png') }}" class="img-fluid"> 
                                        @endif
                                        &nbsp;{{ $sk->languageSkill->translateTo->name }}
                                    </td>
                                    <td class="text-right">
                                        <a href="{{ url('admin/skills/'.$sk->id.($apphelper->queryToURL(\Request::query()))) }}" class="btn btn-xs btn-default"><i class="fal fa-edit"></i> {{ __('Edit') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="panel-content p-2 pb-0 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-muted">
                    {{ $skills->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <form action="{{ url('skills'. ($id ? '/'.$id: null).($apphelper->queryToURL(\Request::query()))) }}" method="POST">
                <div class="panel">
                    <div class="panel-hdr">
                        <h2>
                            {{ __('Language skill') }} <span class="fw-300"><i>{{ !$id ? __('Add skill'): __('Edit skill') }}</i></span>
                        </h2>
                        @if (!is_null($skill))
                            <div class="panel-toolbar">
                                <a href="{{ url('admin/skills') }}" class="btn btn-xs btn-default">
                                    <i class="fal fa-plus"></i> {{ __('Add new') }}
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="thumbnails">{{ __('Language source') }}</label>
                                <select name="from" id="from" class="form-control">
                                    @foreach ($languages as $language)
                                            <option value="{{ $language->id }}"{!! !is_null($skill) && $language->id == $skill->languageSkill->from ? ' selected': '' !!}>
                                                {{ $language->name }}
                                            </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="thumbnails">{{ __('Language source') }}</label>
                                <select name="to" id="to" class="form-control">
                                    @foreach ($languages as $language)
                                            <option value="{{ $language->id }}"{!! !is_null($skill) && $language->id == $skill->languageSkill->to ? ' selected': '' !!}>
                                                {{ $language->name }}
                                            </option>
                                    @endforeach
                                </select>
                            </div>
                            <p><a href="{{ url('admin/languages') }}">Find more languages</a></p>
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