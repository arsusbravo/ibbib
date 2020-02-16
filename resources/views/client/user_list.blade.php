@extends('layouts.front')

@section('content-top')
    <div class="tr-breadcrumb bg-image section-before">
        <div class="container">
            <div class="breadcrumb-info text-center">
                <div class="page-title">
                    <h1>{{ __('Translators') }}</h1>
                </div>		
                <ol class="breadcrumb">
                    <li><a href="{{ url('client/account') }}">{{ __('Your page') }}</a></li>
                    <li class="active">{{ __('Translators') }}</li>
                </ol>
                <div class="banner-form">
                    <form action="{{ url('client/translators') }}" method="GET">
                        <input type="text" name="search" class="form-control" placeholder="{{ __('Looking for') }}" value="{!! \Request::query('search') !!}">
                        @if (count(\Request::query()))
                            @foreach (\Request::query() as $key=>$input)
                                @if ($key != 'search')
                                    <input type="hidden" name="{{ $key }}" value="{{ $input }}">
                                @endif
                            @endforeach
                        @endif
                        <div class="dropdown tr-change-dropdown">
                            <select name="skills" class="select-header form-control">
                                <option value="0">{{ __('All translation skills') }}</option>
                                @foreach ($translationskills as $transkill)
                                	<option value="{{ $transkill->id }}"{{ $transkill->id == \Request::query('skills') ? ' selected': null }}>{!! __('From').' '.$transkill->translateFrom->name. ' ' .__('to'). ' '.$transkill->translateTo->name  !!}</option>
                                @endforeach
                            </select>				
                        </div><!-- /.category-change -->
                        <button type="submit" class="btn btn-primary" value="Search">{{ __('Search') }}</button>
                    </form>
                </div><!-- /.banner-form -->				
            </div>
        </div><!-- /.container -->
    </div>
@endsection

@section('script-top')
    <style>
        .select-header.form-control { border:none }
    </style>
@endsection

@section('content')
    <div class="tr-profile section-padding">
        <div class="container two-column">
            @include('front.includes.user.list')										
        </div>
    </div>
@endsection