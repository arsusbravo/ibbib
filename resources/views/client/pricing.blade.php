@extends('layouts.front')

@section('content')
    <div class="breadcrumb-info text-center">
        <div class="page-title mt-5 mb-5">
            <h1>{{ __('Translator prices') }}</h1>
        </div>		
    </div>
    <div class="tr-pricing section-padding">
        <div class="container">
            <div class="row">
                @include('front.includes.price_table')
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
@endsection