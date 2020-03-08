<ul class="tr-list resume-info">
    @if ($user->crew->resume || is_null($user->crew->resume) && \Auth::user()->role->slug == 'crew')
        <li class="career-objective media">
            <div class="icon">
                <i class="fa fa-black-tie" aria-hidden="true"></i>
            </div>  
            <div class="media-body">
                <span class="tr-title">{!! $user->crew->objective ? nl2br($user->crew->objective): __('Your resume') !!}</span>
                {!! $user->crew->resume ? nl2br($user->crew->resume): '<p class="text-warning">'.__('You have empty resume. Please update your resume!').'</p>' !!}
            </div>
        </li><!-- /.certificates -->
    @endif
    @if ($user->crew->certificates->count() || !$user->crew->certificates->count() && \Auth::user()->role->slug == 'crew')
        <li class="education-background media">
            <div class="icon">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
            </div>
            <div class="media-body">
                <span class="tr-title">{{ __('Translation certificates') }}</span>
                @if (!$user->crew->certificates->count())
                    <p class="text-warning">{{ __('You have no certificate') }}</p>
                @else
                    <ul class="tr-list">
                        @foreach ($user->crew->certificates as $cert)
                            <li>
                                <span>{!! $cert->title !!}</span>
                                <ul class="tr-list">
                                    <li>Year issued: {!! $cert->issued !!}</li>
                                    <li>Translation: {!! $cert->language_to ? $cert->transFrom->name.' - '.$cert->transTo->name: $cert->transFrom->name !!}</li>
                                </ul>
                                @if ($cert->description)
                                    <p>{!! nl2br($cert->description) !!}</p>
                                @endif
                                
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </li><!-- /.qualification -->
    @endif
    @if ($user->crew->additional_info || is_null($user->crew->additional_info) && \Auth::user()->role->slug == 'crew')
        <li class="personal-deatils media">
            <div class="icon">
                <i class="fa fa-hand-peace-o" aria-hidden="true"></i>
            </div>
            <div class="media-body">
                <span class="tr-title">{{ __('Additional information') }}</span>
                {!! !is_null($user->crew->additional_info) ? nl2br($user->crew->additional_info): '<p class="text-warning">'. __('No additional information') .'</p>' !!}
            </div>
        </li>
    @else
        <p class="text-warning">{{ __('No other information') }}</p>
    @endif
</ul>
<div class="buttons pull-right">
    @if (\Auth::user()->role->slug == 'crew')
        <a href="#edit-resume" aria-controls="edit-resume" role="tab" data-toggle="tab" class="btn btn-primary">{{ __('Update Your Resume') }}</a>
    @elseif(\Auth::user()->role->slug == 'customer')
        <a href="{{ \URL::previous() }}" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>{{ __('Back to list') }}</a>
        <a href="{{ url('client/recruit/'. $user->id) }}" class="btn button-send"><i class="fa fa-envelope-o" aria-hidden="true"></i>{{ __('Send message') }}</a>
        <a href="#" class="btn btn-primary"><i class="fa fa-cloud-download" aria-hidden="true"></i>{{ __('Download Resume as doc') }}</a>
    @endif
</div>		