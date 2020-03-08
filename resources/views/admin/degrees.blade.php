@extends('layouts.dashboard')

@section('breadcrumbs')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ config('app.name', 'ARSUS manager') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Degree list') }}</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
@endsection

@section('content')
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-desktop'></i> Degree list <span class='fw-300'>{{ \Auth::user()->role->name }}</span>
            <small>
                {{ __('List of categories in business fields') }}
            </small>
        </h1>
        <div class="subheader-block">
            {{('You can choose and/or add Degree')}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-hdr">
                    <h2>
                        {{ __('Degree') }} <span class="fw-300"><i>{{ __('list') }}</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table table-striped">
                            <tr class="bg-primary">
                                <th>{{ __('Degree title') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            @foreach ($degrees as $deg)
                                <tr>
                                    <td><a href="{{ url('admin/degrees/'.$deg->id.($apphelper->queryToURL(\Request::query()))) }}">{{ $deg->title }}</td>
                                    <td>
                                        <a href="{{ url('admin/degrees/'.$deg->id.($apphelper->queryToURL(\Request::query()))) }}" class="btn btn-xs btn-default"><i class="fal fa-edit"></i> {{ __('Edit') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="panel-content p-2 pb-0 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-muted">
                    {{ $degrees->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <form action="{{ url('admin/degree'. ($id ? '/'.$id: null).($apphelper->queryToURL(\Request::query()))) }}" method="POST">
                <div class="panel">
                    <div class="panel-hdr">
                        <h2>
                            {{ __('Degree') }} <span class="fw-300"><i>{{ !$id ? __('Add Degree'): __('Edit Degree') }}</i></span>
                        </h2>
                        @if (!is_null($degree))
                            <div class="panel-toolbar">
                                <a href="{{ url('admin/degrees') }}" class="btn btn-xs btn-default">
                                    <i class="fal fa-plus"></i> {{ __('Add new') }}
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="title">{{ __('Degree title') }}</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="{{ __('Title') }}" value="{!! !is_null($degree) ? $degree->title: old('title') !!}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="code">{{ __('Degree description') }}</label>
                                <textarea name="description" class="form-control" placeholder="{{ __('Describe Degree') }}">{!! !is_null($degree) ? $degree->description: old('description') !!}</textarea>
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