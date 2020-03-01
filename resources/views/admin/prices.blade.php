@extends('layouts.dashboard')

@section('breadcrumbs')
    <ol class="breadcrumb page-breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">{{ config('app.name', 'ARSUS manager') }}</a></li>
        <li class="breadcrumb-item active">{{ __('Price list') }}</li>
        <li class="position-absolute pos-top pos-right d-none d-sm-block"><span class="js-get-date"></span></li>
    </ol>
@endsection

@section('content')
    <div class="subheader">
        <h1 class="subheader-title">
            <i class='subheader-icon fal fa-desktop'></i> Price list <span class='fw-300'>{{ \Auth::user()->role->name }}</span>
            <small>
                {{ __('List of categories in business fields') }}
            </small>
        </h1>
        <div class="subheader-block">
            {{('You can choose and/or add price')}}
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="panel">
                <div class="panel-hdr">
                    <h2>
                        {{ __('Price') }} <span class="fw-300"><i>{{ __('list') }}</i></span>
                    </h2>
                </div>
                <div class="panel-container show">
                    <div class="panel-content">
                        <table class="table table-striped">
                            <tr class="bg-primary">
                                <th>{{ __('title') }}</th>
                                <th>{{ __('Group') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                            @foreach ($prices as $pr)
                                <tr>
                                    <td><a href="{{ url('admin/prices/'.$pr->id.($apphelper->queryToURL(\Request::query()))) }}">{{ $pr->title }}</a></td>
                                    <td>{{ $pr->role->name }}</td>
                                    <td>
                                        <a href="{{ url('admin/prices/'.$pr->id.($apphelper->queryToURL(\Request::query()))) }}" class="btn btn-xs btn-default"><i class="fal fa-edit"></i> {{ __('Edit') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="panel-content p-2 pb-0 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-muted">
                    {{ $prices->links() }}
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <form action="{{ url('price'. ($id ? '/'.$id: null).($apphelper->queryToURL(\Request::query()))) }}" method="POST">
                <div class="panel">
                    <div class="panel-hdr">
                        <h2>
                            {{ __('Price') }} <span class="fw-300"><i>{{ !$id ? __('Add price'): __('Edit price') }}</i></span>
                        </h2>
                        @if (!is_null($price))
                            <div class="panel-toolbar">
                                <a href="{{ url('admin/prices') }}" class="btn btn-xs btn-default">
                                    <i class="fal fa-plus"></i> {{ __('Add new') }}
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="panel-container show">
                        <div class="panel-content">
                            @csrf
                            <div class="form-group">
                                <label class="form-label" for="title">{{ __('Price title') }}</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="{{ __('Title of the price') }}" value="{!! !is_null($price) ? $price->title: old('title') !!}">
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="description">{{ __('Price description') }}</label>
                                <textarea name="description" class="form-control" placeholder="{{ __('What they got with this price') }}" rows="10">{!! !is_null($price) ? $price->description: old('description') !!}</textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-label" for="role_id">{{ __('Group') }}</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}"{{ !is_null($price) && $role->id == $price->role_id ? ' selected': '' }}>
                                            {{ $role->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-4">
                                    <label class="form-label" for="price">{{ __('Price') }}</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">&euro;</span>
                                        </div>
                                        <input type="text" id="price" name="price" class="form-control" placeholder="{{ __('Price for this package') }}" value="{!! !is_null($price) ? (float)$price->price: old('price', 0) !!}">
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label" for="quantity">{{ __('Credits') }}</label>
                                    <input type="number" id="quantity" name="quantity" class="form-control" placeholder="{{ __('Quantity for this price') }}" value="{!! !is_null($price) ? $price->quantity: old('quantity', 0) !!}">
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label" for="unit">{{ __('Unit quantity price') }}</label>
                                    <select name="unit" class="form-control">
                                        <option value="credits"{{ !is_null($price) && $price->unit == 'credits' ? ' selected': null }}>Credits</option>
                                        <option value="days"{{ !is_null($price) && $price->unit == 'days' ? ' selected': null }}>Days</option>
                                    </select>
                                </div>
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