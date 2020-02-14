@extends('layouts.front')

@section('content-top')
    <div class="tr-breadcrumb bg-image section-before">
        <div class="container">
            <div class="breadcrumb-info text-center">
                <div class="user-image">
                    <img src="{{ url('themes/frontpage/images/others/author.png') }}" alt="Image" class="img-fluid">
                </div>
                <div class="user-title">
                    <h1>{!! $translator->user->name !!}</h1>
                </div>		
                <ul class="job-meta tr-list list-inline">
                    @if ($translator->co_name)
                        <li><i class="fa fa-briefcase" aria-hidden="true"></i>{!! $translator->co_name !!}</li>
                    @endif
                    @if ($translator->co_phone && $user->client->credits)
                        <li><i class="fa fa-phone" aria-hidden="true"></i>{!! $translator->co_phone !!}</li>
                    @endif
                    @if ($user->client->credits)
                        <li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#">{!! $translator->user->email !!}</a></li>
                    @endif
                    @if ($translator->country_id)
                        <li><img src="{{ url('themes/frontpage/images/flags/sm/'. $translator->location->country_code .'.png') }}" class="img-fluid mr-2">{{ $translator->location->country_name }}</li>
                    @endif
                    
                </ul>
                {{-- <ul class="breadcrumb-social social-icon-bg  tr-list">
                    <li><a href="#"><i class="fa fa-facebook"></i><span>Facebook</span></a></li>
                    <li><a href="#"><i class="fa fa-twitter"></i> <span>Twitter</span> </a></li>
                    <li><a href="#"><i class="fa fa-google-plus"></i> <span>Google Plus</span> </a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i><span>Linkedin</span> </a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i> <span>Dribbble</span></a></li>
                    <li><a href="#"><i class="fa fa-behance"></i> <span>Behance</span></a></li>
                    <li><a href="#"><i class="fa fa-globe"></i> <span>Website</span> </a></li>
                </ul> --}}			
            </div>
        </div><!-- /.container -->
    </div>
@endsection

@section('content')
    <div class="tr-profile section-padding">
        <div class="container">
            <div class="section">
                @include('front.includes.user.resume', ['user' => $translator->user])
            </div>
        </div>
    </div>
@endsection