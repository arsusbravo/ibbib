@extends('layouts.dashboard')

@section('breadcrumbs')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ config('app.name', 'ARSUS manager') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Language list') }}</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
@endsection

@section('script-top')
    <link rel="stylesheet" media="screen" href="{{ url('themes\dashboard\css\formplugins\select2\select2.bundle.css') }}">
@endsection

@section('script-bottom')
    <script src="{{ url('themes\dashboard\js\formplugins\select2\select2.bundle.js') }}"></script>
    <script>
        function format(state) {
            var originalOption = state.element;
            return "<img class='img-fluid' src='{{ url('themes/frontpage/images/flags/sm') }}/"+ $(originalOption).data('code') +".png'>" + state.text;
        }
        $('#countries').select2({
            templateResult: format,
            formatSelection: format,
            escapeMarkup: function(m) { return m; }
        });
    </script>
@endsection

@section('content')
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-desktop'></i> Language list <span class='fw-300'>{{ \Auth::user()->role->name }}</span>
            <small>
                {{ __('List of available countries') }}
            </small>
        </h1>
        <div class="subheader-block">
            {{('You can choose and/or add language')}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-hdr">
                    <h2>
                        {{ __('Languages') }} <span class="fw-300"><i>{{ __('Found') }}: {{ $count }} items</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table table-striped">
                            <tr class="bg-primary">
                                <th>{{ __('Language flag/country') }}</th>
                                <th>{{ __('Language name') }}</th>
                                <th>{{ __('Language code') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            @foreach ($languages as $lang)
                                <tr>
                                    <td>
                                        @if ($lang->flag && \File::exists(public_path('themes/frontpage/images/flags/sm/'. $lang->flag->country_code.'.png')))
                                            <img src="{{ url('themes/frontpage/images/flags/sm/'. $lang->flag->country_code.'.png') }}" class="img-fluid"> 
                                        @endif
                                    </td>
                                    <td><a href="{{ url('admin/languages/'.$lang->id.($apphelper->queryToURL(\Request::query()))) }}">{{ $lang->name }}</td>
                                    <td>{{ $lang->code }}</td>
                                    <td class="text-right">
                                        <a href="{{ url('admin/languages/activate/'.$lang->id.($apphelper->queryToURL(\Request::query()))) }}" class="btn btn-xs btn-{{ $lang->active ? 'danger': 'success' }}"><i class="fal fa-{{ $lang->active ? 'power-off': 'check' }}"></i> {{ $lang->active ? __('Deactivate'): __('activate') }}</a>
                                        <a href="{{ url('admin/languages/'.$lang->id.($apphelper->queryToURL(\Request::query()))) }}" class="btn btn-xs btn-default"><i class="fal fa-edit"></i> {{ __('Edit') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="panel-content p-2 pb-0 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-muted">
                    {{ $languages->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <form action="{{ url('admin/language'. ($id ? '/'.$id: null).($apphelper->queryToURL(\Request::query()))) }}" method="POST">
                <div class="panel">
                    <div class="panel-hdr">
                        <h2>
                            {{ __('Language') }} <span class="fw-300"><i>{{ !$id ? __('Add language'): __('Edit language') }}</i></span>
                        </h2>
                        @if (!is_null($language))
                            <div class="panel-toolbar">
                                <a href="{{ url('admin/languages') }}" class="btn btn-xs btn-default">
                                    <i class="fal fa-plus"></i> {{ __('Add new') }}
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="name">{{ __('Language name') }}</label>
                                <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" value="{!! !is_null($language) ? $language->name: old('name') !!}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="original">{{ __('Origin name') }}</label>
                                <input type="text" id="original" name="original" class="form-control" placeholder="{{ __('The original name of the country') }}" value="{!! !is_null($language) ? $language->original: old('original') !!}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="code">{{ __('Language code') }}</label>
                                <input type="text" id="code" name="code" class="form-control @error('code') is-invalid @enderror" placeholder="{{ __('2 digits code') }}" value="{!! !is_null($language) ? $language->code: old('code') !!}">
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="thumbnails">{{ __('Flag') }}</label>
                                <select name="country_id" id="countries" class="form-control">
                                    @foreach ($countries as $country)
                                        @if (\File::exists(public_path('themes/frontpage/images/flags/sm/'. $country->country_code.'.png')))
                                            <option value="{{ $country->id }}"{!! !is_null($language) && $country->id == $language->country_id ? ' selected': '' !!} data-code="{{ $country->country_code }}">
                                                {{ $country->country_name }}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="thumbnails">{{ __('Activation') }}</label>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" name="active" id="activation"{{ !is_null($language) && $language->active || is_null($language) ? ' checked': null }} value="1">
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