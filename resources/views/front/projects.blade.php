<div class="row">
    @if (!is_null($projects) && $projects->count())
        @foreach ($projects as $project)
            <div class="col-sm-6">
                <div class="job-item">
                    <div class="job-info">
                        <div class="clearfix">
                            <div class="company-logo row">
                                <div class="col-6">
                                    <img src="{{ url('themes/frontpage/images/flags/md/'. strtoupper($project->skill->languageSkill->translateFrom->code) .'.png') }}" alt="images" class="img-fluid">
                                </div>
                                <div class="col-6">
                                    <img src="{{ url('themes/frontpage/images/flags/md/'. strtoupper($project->skill->languageSkill->translateTo->code).'.png') }}" alt="images" class="img-fluid">
                                </div>
                            </div>
                            <span class="tr-title">
                                <a href="job-details.html">{!! $project->title !!}</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="col-12">
            <div class="alert alert-info">{{ __('There is no active projects at the moment.') }}</div>
        </div>
    @endif
</div>