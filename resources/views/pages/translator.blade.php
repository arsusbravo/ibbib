@extends('layouts.front')

@section('content-top')
    <div class="tr-breadcrumb bg-image section-before">
        <div class="container">
            <div class="breadcrumb-info text-center">
                <div class="page-title">
                    <h1>{{ __('As Translator') }}</h1>
                </div>		
                <ol class="breadcrumb">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li class="active">{{ __('Translator') }}</li>
                </ol>			
            </div>
        </div><!-- /.container -->
    </div>
@endsection

@section('content')
<div class="page-content">
    <div class="container">
        <div class="section">
            <h2 class="tr-title">{{ __('I am a translator') }}. {{ __('What does IBBIB jobs mean to me?') }}</h2>
        </div><!-- /.container -->
    </div><!-- /.container -->
</div>
@endsection