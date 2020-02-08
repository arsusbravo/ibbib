@extends('layouts.dashboard')

@section('breadcrumbs')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ config('app.name', 'ARSUS manager') }}</a></li>
        <li class="breadcrumb-item">category_1</li>
        <li class="breadcrumb-item">category_2</li>
        <li class="breadcrumb-item active">Page Titile</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
@endsection

@section('content')
<div class="subheader">
    <h1 class="subheader-title">
        <i class='subheader-icon fal fa-desktop'></i> Dashboardd <span class='fw-300'>{{ \Auth::user()->role->name }}</span> <sup class='badge badge-primary fw-500'>Welcome!</sup>
        <small>
            {{ __('You can start managing the site') }}
        </small>
    </h1>
    <div class="subheader-block">
        Right content of header
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div id="panel-1" class="panel">
            <div class="panel-hdr">
                <h2>
                    {{ \Auth::user()->role->name }} <span class="fw-300"><i>Dashboard</i></span>
                </h2>
                <div class="panel-toolbar">
                    <button class="btn btn-panel" data-action="panel-collapse" data-toggle="tooltip" data-offset="0,10" data-original-title="Collapse"></button>
                    <button class="btn btn-panel" data-action="panel-fullscreen" data-toggle="tooltip" data-offset="0,10" data-original-title="Fullscreen"></button>
                    <button class="btn btn-panel" data-action="panel-close" data-toggle="tooltip" data-offset="0,10" data-original-title="Close"></button>
                </div>
            </div>
            <div class="panel-container show">
                <div class="panel-content">
                    You are logged in to admin!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
