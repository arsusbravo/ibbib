<div class="row">
    <div class="col-md-8 col-lg-9">
        <div class="job-summary section">
            <span class="tr-title">{{ __('Job Summary') }}</span>
            {!! nl2br($project->content) !!}
        </div>
    </div>
    <div class="col-md-4 col-lg-3">
        <div class="tr-sidebar">
            <div class="widget-area">
                <div class="widget short-info">
                    <h3 class="widget_title">{{ __('Translation Proficiency') }}</h3>
                    <div class="row">
                        <div class="col-6">
                            <img src="{{ url('themes/frontpage/images/flags/sm/'. strtoupper($project->skill->languageSkill->translateFrom->code) .'.png') }}" alt="images" class="img-fluid">
                            <strong>{{ $project->skill->languageSkill->translateFrom->name }}</strong>
                        </div>
                        <div class="col-6">
                            <img src="{{ url('themes/frontpage/images/flags/sm/'. strtoupper($project->skill->languageSkill->translateTo->code).'.png') }}" alt="images" class="img-fluid">
                            <strong>{{ $project->skill->languageSkill->translateTo->name }}</strong>
                        </div>
                    </div>
                </div><!-- /.widger -->
                <div class="widget short-info">
                    <h3 class="widget_title">{{ __('Short Info') }}</h3>
                    <ul class="tr-list">
                        <li class="media"><div class="pull-left"><i class="fa fa-calendar" aria-hidden="true"></i></div> <div class="media-body"><span>{{ __('Published') }}:</span>{{ \Carbon\Carbon::parse($project->published_at)->diffForHumans() }}</div></li>
                        <li class="media"><div class="pull-left"><i class="fa fa-calendar-times-o" aria-hidden="true"></i></div> <div class="media-body"><span>{{ __('Deadline') }}:</span>{{ \Carbon\Carbon::parse($project->deadline)->format('m/d/Y') }}</div></li>
                        <li class="media"><div class="pull-left"><i class="fa fa-user-plus" aria-hidden="true"></i></div> <div class="media-body"><span>{{ __('Project poster') }}:</span>{!! $project->client->user->name !!}</div></li>
                    </ul>
                </div><!-- /.widger -->
                <div class="widget cmpany-info">
                    <h3 class="widget_title">{{ __('Company Info') }}</h3>
                    <span>{!! $project->client->co_name !!}</span>
                    {!! nl2br($project->client->info) !!}
                    <p>{!! $project->client->location->country_name !!}</p>
                    <div class="widget-social">
                        <ul class="tr-list">
                            <li><a href="#"><i class="fa fa-facebook-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus-square" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin-square" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div><!-- /.widger -->
            </div><!-- /.widget-area -->
        </div><!-- /.tr-sidebar -->
    </div>
</div><!-- row -->