<div class="tr-fun-fact">
    <div class="row">
        <div class="col-sm-4">
            <div class="fun-fact media">
                <div class="fun-fact-icon">
                    <img src="{{ url('themes/frontpage/images/icons/fun-fact4.png') }}" alt="images" class="img-fluid">
                </div>
                <div class="media-body">
                    <h1 class="counter">329</h1>
                    <span>Total job post</span>
                </div>
            </div><!-- /.fun-fact -->
        </div>
        <div class="col-sm-4">
            <div class="fun-fact media">
                <div class="fun-fact-icon">
                    <img src="{{ url('themes/frontpage/images/icons/fun-fact5.png') }}" alt="images" class="img-fluid">
                </div>
                <div class="media-body">
                    <h1 class="counter">23,563</h1>
                    <span>{{ __('Project posts') }}</span>
                </div>
            </div><!-- /.fun-fact -->									
        </div>
        <div class="col-sm-4">
            <div class="fun-fact media">
                <div class="fun-fact-icon">
                    <img src="{{ url('themes/frontpage/images/icons/fun-fact6.png') }}" alt="images" class="img-fluid">
                </div>
                <div class="media-body">
                    <h1 class="counter">27</h1>
                    <span>{{ __('Matches') }}</span>
                </div>
            </div><!-- /.fun-fact -->									
        </div>
    </div><!-- ./row -->							
</div><!-- /.tr-fun-fact -->

<div class="section resume-last-updated">
    <span class="icon pull-left"><img src="{{ url('themes/frontpage/images/icons/1.png') }}" alt="Icon" class="img-fluid"></span>
    <div class="updated-info">
        <span class="pull-left">{{ __('Profile last updated on') }}</span>
        <span class="pull-right">{!! $user->client ? \Carbon\Carbon::parse($user->client->updated_at)->format('Y/d/m'): __('Never') !!}</span>
    </div>
</div><!-- /.resume-last-updated -->

<div class="section display-information">
    <div class="title title-after">
        <div class="icon"><img src="{{ url('themes/frontpage/images/icons/2.png') }}" alt="Icon" class="img-fluid"></div> 
        <span>{{ __('Your display information') }}</span>
    </div>

    <div class="change-photo">
        <div class="user-image">
            <img src="{{ url('themes/frontpage/images/others/company-logo.png') }}" alt="Image" class="img-fluid">
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
        <li>{{ __('Company Name') }}<span>{!! $user->client ? $user->client->co_name: __('No company name') !!}</span></li>
        <li>{{ __('Phone Number') }}<span>{!! $user->client ? $user->client->co_phone: __('No company phone number') !!}</span></li>
        <li>{{ __('Email Id') }}<span><a href="#">{!! $user->client ? $user->client->co_email: $user->email !!}</a></span></li>
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