@extends('layouts.front')

@section('content')
    <div class="breadcrumb-info text-center">
        <div class="page-title mt-5 mb-5">
            <h1>{{ __('Pricing') }}</h1>
        </div>		
    </div>
    <div class="tr-pricing section-padding">
        <div class="container">
            <div class="row">
                @foreach ($pricelist as $price)
                    <div class="col-md-6 col-lg-4">
                        <div class="pricing">
                            <span>{{ $price->title }}</span>
                            <h1><sup>$</sup>{{ round($price->price) }}<span>{{ __('For') }} {{ $price->quantity }} {{ $price->unit }}</span></h1>
                            <div class="pricing-list">
                                <ul class="tr-list">
                                    <li><i class="fa fa-check" aria-hidden="true"></i>Product Galleries, and Blogs.</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>Powerful Website Analytics</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>Fully Integrated E-Commerce</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>Sell Unlimited Products</li>
                                    <li><i class="fa fa-check" aria-hidden="true"></i>Mobile-Optimized Website</li>
                                    <li><i class="fa fa-times" aria-hidden="true"></i>Free Custom Domain</li>
                                    <li><i class="fa fa-times" aria-hidden="true"></i>24/7 Customer Support</li>
                                    <li><i class="fa fa-times" aria-hidden="true"></i>3% Sales Transaction Fee</li>
                                </ul>
                                <a href="#" class="btn btn-primary">Buy Now</a>
                            </div>
                        </div><!-- /.price -->
                    </div>
                @endforeach
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div>
@endsection