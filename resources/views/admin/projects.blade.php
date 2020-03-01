@extends('layouts.dashboard')

@section('breadcrumbs')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ config('app.name', 'ARSUS manager') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Project list') }}</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
@endsection



@section('content')
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-desktop'></i> Project list <span class='fw-300'>{{ \Auth::user()->role->name }}</span>
            <small>
                {{ __('List of available projects') }}
            </small>
        </h1>
        <div class="subheader-block">
            {{('You can choose and/or add project')}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-hdr">
                    <h2>
                        {{ __('Project') }} <span class="fw-300"><i>Found: {{ $count_projects }} items</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table table-striped">
                            <tr class="bg-primary">
                                <th>ID</th>
                                <th>{{ __('Title') }}</th>
                                <th>{{ __('Deadline') }}</th>
                                <th>{{ __('Owner') }}</th>
                                <th>{{ __('Reactions') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            @if($count_projects)
                                @foreach ($projects as $project)
                                    <tr>
                                        <td>{{ $project->id }}.</td>
                                        <td><a href="{{ url('admin/project/'.$project->id.($apphelper->queryToURL(\Request::query()))) }}">{{ $project->title }}</td>
                                        <td>{{ \Carbon\Carbon::parse($project->deadline)->format('m/d/Y') }}</td>
                                        <td>{{ $project->client->user->name }}</td>
                                        <td>
                                            <a href="{{ url('admin/project/'.$project->id.($apphelper->queryToURL(\Request::query()))) }}" class="btn btn-xs btn-default"><i class="fal fa-edit"></i> {{ __('Edit') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="6" class="bg-danger text-white">There is no project</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
                <div class="panel-content p-2 pb-0 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-muted">
                    {{ $projects->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection