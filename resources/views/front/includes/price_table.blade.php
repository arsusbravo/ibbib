@foreach ($pricelist as $price)
    <div class="col-md-6 col-lg-4">
        <div class="pricing">
            <span>{{ $price->title }}</span>
            <h1><sup>$</sup>{{ round($price->price) }}<span>{{ __('For') }} {{ $price->quantity }} {{ $price->unit }}</span></h1>
            <div class="pricing-list">
                {!! $price->description !!}
                <a href="#" class="btn btn-primary">Buy Now</a>
            </div>
        </div><!-- /.price -->
    </div>
@endforeach