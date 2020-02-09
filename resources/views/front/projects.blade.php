<div class="row">
    @if (!is_null($projects) && $projects->count())
        @foreach ($projects as $project)
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6 tr-title">
                                <a href="{{ url(\Request::segment(1).'/project/'.$project->id) }}">{!! $project->title !!}</a>
                            </div>
                            <div class="col-6 text-right">
                                <small class="text-muted">{{ __('Deadline') }} : {!! \Carbon\Carbon::parse($project->deadline)->format('m/d/Y') !!}</small>
                            </div>
                        </div>
                        <div class="company-logo row">
                            <div class="col-6">
                                <img src="{{ url('themes/frontpage/images/flags/md/'. strtoupper($project->skill->languageSkill->translateFrom->code) .'.png') }}" alt="images" class="img-fluid">
                                <strong>{{ $project->skill->languageSkill->translateFrom->name }}</strong>
                            </div>
                            <div class="col-6">
                                <img src="{{ url('themes/frontpage/images/flags/md/'. strtoupper($project->skill->languageSkill->translateTo->code).'.png') }}" alt="images" class="img-fluid">
                                <strong>{{ $project->skill->languageSkill->translateTo->name }}</strong>
                            </div>
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