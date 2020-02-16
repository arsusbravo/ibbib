@if($translators->count())
    <div class="row">
        @foreach ($translators as $translator)
            <div class="col-sm-6">
                <div class="job-item">
                    <div class="job-info">
                        <div class="clearfix">
                            <div class="company-logo">
                                <img src="{{ url('themes/frontpage/images/others/man.png') }}" alt="images" class="img-fluid">
                            </div>
                            <span class="tr-title">
                                <a href="{{ url('client/translator/'. $translator->id) }}">{!! $translator->co_name ? $translator->co_name: $translator->user->name !!}</a><span><a href="{{ url('client/translator/'. $translator->id) }}">{!! $translator->objective !!}</a></span>
                            </span>
                            @if ($translator->country_id)
                                <span><a href="{{ url('client/translators'.$apphelper->queryToURL(\Request::query(), ['country'=>$translator->country_id])) }}" class="btn btn-primary">{{('In')}} {!! $translator->location->country_name !!}</a></span>
                            @endif
                        </div>
                        <ul class="tr-list job-meta">
                            @foreach ($translator->skills as $skill)
                                <li><span><i class="fa fa-language" aria-hidden="true"></i></span>{!! $skill->languageSkill->translateFrom->name !!} {{ __('to') }} {!! $skill->languageSkill->translateTo->name !!}</li>
                            @endforeach
                            <li><span><i class="fa fa-money" aria-hidden="true"></i></span>${{ $translator->standard_rates.' /'. $translator->unit_rate }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        @endforeach
    </div><!-- /.row -->
    {!! $translators->links() !!}
@else
    <div class="alert alert-info">
        <p>{{ __('There is no active translator at the moment') }}</p>
    </div>
@endif