@extends('layouts.dashboard')

@section('breadcrumbs')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ config('app.name', 'ARSUS manager') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Content list') }}</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
@endsection

@section('content')
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-desktop'></i> Content list <span class='fw-300'>{{ \Auth::user()->role->name }}</span>
            <small>
                {{ __('List of categories in business fields') }}
            </small>
        </h1>
        <div class="subheader-block">
            {{('You can choose and/or add content')}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-hdr">
                    <h2>
                        {{ __('Content') }} <span class="fw-300"><i>{{ __('Found') }}: {{ $count }} items</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table table-striped">
                            <tr class="bg-primary">
                                <th>ID</th>
                                <th>{{ __('Content title') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            @if($contents->count())
                                @foreach ($contents as $c)
                                    <tr>
                                        <td>{{ $c->id }}.</td>
                                        <td><a href="{{ url('admin/contents/'.$c->id.($apphelper->queryToURL(\Request::query()))) }}">{{ $c->title }}</td>
                                        <td>
                                            <a href="{{ url('admin/contents/'.$c->id.($apphelper->queryToURL(\Request::query()))) }}" class="btn btn-xs btn-default"><i class="fal fa-edit"></i> {{ __('Edit') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td class="bg-danger text-white" colspan="3">{{ __('There is no content. Add a content!') }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
                <div class="panel-content p-2 pb-0 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-muted">
                    {{ $contents->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <form action="{{ url('admin/content'. ($id ? '/'.$id: null).($apphelper->queryToURL(\Request::query()))) }}" method="POST">
                <div class="panel">
                    <div class="panel-hdr">
                        <h2>
                            {{ __('Content') }} <span class="fw-300"><i>{{ !$id ? __('Add content'): __('Edit content') }}</i></span>
                        </h2>
                        @if (!is_null($content))
                            <div class="panel-toolbar">
                                <a href="{{ url('admin/contents') }}" class="btn btn-xs btn-default">
                                    <i class="fal fa-plus"></i> {{ __('Add new') }}
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="title">{{ __('Content title') }}</label>
                                <input type="text" id="title" name="title" class="form-control @error('title') is-invalid @enderror" placeholder="{{ __('Title of the content') }}" value="{!! !is_null($content) ? $content->title: old('title') !!}">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="slug">{{ __('Slug') }}</label>
                                <input type="text" id="slug" name="slug" class="form-control" placeholder="{{ __('Word for URL') }}" value="{!! !is_null($content) ? $content->slug: old('slug') !!}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="description">{{ __('Meta description') }}</label>
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" placeholder="{{ __('Content description for SEO') }}">{!! !is_null($content) ? $content->description: old('description') !!}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="keywords">{{ __('Meta keywords') }}</label>
                                <textarea name="keywords" class="form-control" placeholder="{{ __('Keywords for SEO') }}">{!! !is_null($content) ? $content->keywords: old('keywords') !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="language_id">{{ __('Language') }}</label>
                                <select class="form-control" name="language_id" id="language_id">
                                    @foreach ($languages as $lang)
                                        <option value="{{ $lang->id }}">{{ $lang->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="body">{{ __('Body') }}</label>
                                <textarea name="body" id="body" class="summernote" placeholder="{{ __('Content text') }}">{!! !is_null($content) ? $content->body: old('body') !!}</textarea>
                                @error('body')
                                    <div class="invalid-feedback" style="display:block">{{ $message }} </div>
                                @enderror
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

@section('script-top')
    <link rel="stylesheet" media="screen" href="{{ url('themes/dashboard/css/formplugins/summernote/summernote.css') }}">
@endsection

@section('script-bottom')
    <script src="{{ url('themes/dashboard/js/formplugins/summernote/summernote.js') }}"></script>
    <script>
        $('.summernote').summernote({
            placeholder: $('.summernote').attr('placeholder'),
            height: 300
        });
    </script>
@endsection