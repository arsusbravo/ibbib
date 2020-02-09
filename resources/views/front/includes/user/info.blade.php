<div class="tr-fun-fact">
    <div class="row">
        <div class="col-sm-4">
            <div class="fun-fact">
                <div class="fun-fact-icon">
                    <img src="{{ url('themes/frontpage/images/icons/fun-fact4.png') }}" alt="images" class="img-fluid">
                </div>
                <div class="media-body">
                    <h1 class="counter">329</h1>
                    <span>{{ __('Viewed my resume') }}</span>
                </div>
            </div><!-- /.fun-fact -->
        </div>
        <div class="col-sm-4">
            <div class="fun-fact">
                <div class="fun-fact-icon">
                    <img src="{{ url('themes/frontpage/images/icons/fun-fact5.png') }}" alt="images" class="img-fluid">
                </div>
                <div class="media-body">
                    <h1 class="counter">32</h1>
                    <span>{{ __('Application submit') }}</span>
                </div>
            </div><!-- /.fun-fact -->									
        </div>
        <div class="col-sm-4">
            <div class="fun-fact">
                <div class="fun-fact-icon">
                    <img src="{{ url('themes/frontpage/images/icons/fun-fact6.png') }}" alt="images" class="img-fluid">
                </div>
                <div class="media-body">
                    <h1 class="counter">27</h1>
                    <span>{!! __('Client&rsquo;s replies') !!}</span>
                </div>
            </div><!-- /.fun-fact -->
        </div>
    </div><!-- ./row -->							
</div><!-- /.tr-fun-fact -->

<div class="section resume-last-updated">
    <span class="icon pull-left"><img src="{{ url('themes/frontpage/images/icons/1.png') }}" alt="Icon" class="img-fluid"></span>
    <div class="updated-info">
        <span class="pull-left">{{ __('Account last updated on') }}</span>
        <span class="pull-right">{!! \Carbon\Carbon::parse($user->crew->updated_at)->format('Y/d/m') !!}</span>
    </div>
</div><!-- /.resume-last-updated -->

<div class="section display-information">
    <div class="title title-after">
        <div class="icon"><img src="{{ url('themes/frontpage/images/icons/2.png') }}" alt="Icon" class="img-fluid"></div> 
        <span>{{ __('Your display Information') }}</span>
    </div>

    <div class="change-photo">
        <div class="user-image">
            <img src="{{ url('themes/frontpage/images/others/author.png') }}" alt="Image" class="img-fluid">
        </div>
        <div class="upload-photo">
            <label class="btn btn-primary" for="upload-photo">
                <input type="file" id="upload-photo">
                {{ __('Change Photo') }}
            </label>
            <span class="max-size">Max 20 MB</span>
        </div>
    </div>
    <ul class="tr-list account-details">
        <li>{{ __('Display Name') }}<span>{{ $user->name }}</span></li>
        <li>{{ __('Company name') }}<span {!! !$user->crew->co_name ? 'class="text-warning"': '' !!}>{!! $user->crew->co_name ? $user->crew->co_name: __('No company') !!}</span></li>
        <li>{{ __('Phone Number') }}<span {!! !$user->crew->co_phone ? 'class="text-warning"': '' !!}> {!! $user->crew->co_phone ? $user->crew->co_phone: __('No phone number') !!}</span></li>
        <li>{{ __('Location/Nationality') }}<span {!! !$user->crew->location ? 'class="text-warning"': '' !!}> {!! $user->crew->location ? $user->crew->location->country_name: __('No location') !!}</span></li>
        <li>{{ __('Email') }}<span>{!! $user->email !!}</span></li>
        <li>{{ __('Price') }}<span>&#36; {!! $user->standard_rates ? $user->crew->standard_rates.' / '. $user->crew->unit_rate: 0.00 !!}</span></li>
    </ul>								
</div><!-- /.display-information -->
<div class="section">
    <div class="title title-after">
        <div class="icon"><img src="{{ url('themes/frontpage/images/icons/3.png') }}" alt="Icon" class="img-fluid"></div> 
        <span>Social Link</span>
    </div>
    <ul class="social social-icon-bg tr-list">
        <li><i class="fa fa-facebook"></i><span class="media-body"><a href="#">https://www.facebook.com/jhondoe</a></span></li>
        <li><i class="fa fa-twitter"></i><span class="media-body"><a href="#">https://www.twitter.com/jhondoe</a></span></li>
        <li><i class="fa fa-google-plus"></i><span class="media-body"><a href="#">https://www.googleplus.com/jhondoe</a></span></li>
        <li><i class="fa fa-linkedin"></i><span class="media-body"><a href="#">https://www.linkedin.com/jhondoe</a></span></li>
        <li><i class="fa fa-dribbble"></i><span class="media-body"><a href="#">https://www.dribbble.com/jhondoe</a></span></li>
        <li><i class="fa fa-behance"></i><span class="media-body"><a href="#">https://www.behance.com/jhondoe</a></span></li>
        <li><i class="fa fa-globe"></i><span class="media-body"><a href="#">https://www.globe.com/jhondoe</a></span></li>
    </ul>
</div>