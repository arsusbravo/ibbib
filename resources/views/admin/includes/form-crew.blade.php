<form action="{{ url('crew/'.$user->id.($apphelper->queryToURL(\Request::query()))) }}" method="POST">
    <div class="panel">
        <div class="panel-hdr">
            <h2>
                {{ __('User') }} <span class="fw-300"><i>{{ __('Edit') }} {{ $slug }}</i></span>
            </h2>
        </div>
        <div class="panel-container show">
            <div class="panel-content">
                @csrf
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <div class="form-group">
                    <label class="form-label" for="name">{{ __('Company') }}</label>
                    <input type="text" id="co_name" name="co_name" class="form-control" placeholder="{{ __('Company name') }}" value="{!! $user->crew->co_name !!}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="co_phone">{{ __('Phone number') }}</label>
                    <input type="text" id="co_phone" name="co_phone" class="form-control" placeholder="{{ __('Company phone number') }}" value="{!! $user->crew->co_phone !!}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="country_id">{{ __('Country') }}</label>
                    <select name="country_id" id="country_id" class="form-control">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}"{!! $user->crew->country_id == $country->id ? ' selected': '' !!}>{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="objective">{{ __('Resume title') }}</label>
                    <input type="text" id="objective" name="objective" class="form-control" placeholder="{{ __("Title for translator's resume") }}" value="{!! $user->crew->objective !!}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="resume">{{ __('Resume') }}</label>
                    <textarea name="resume" id="resume" class="form-control" rows="5" placeholder="{{ __('Describe role') }}">{!! $user->crew->resume !!}</textarea>
                </div>
                <div class="form-group">
                    <label class="form-label" for="additional_info">{{ __('Addtional information') }}</label>
                    <textarea name="additional_info" id="additional_info" class="form-control" rows="5" placeholder="{{ __('Describe role') }}">{!! $user->crew->additional_info !!}</textarea>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label" for="credits">{{ __('Standard rate') }}</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">&euro;</span>
                            </div>
                            <input type="text" id="standard_rates" name="standard_rates" class="form-control" placeholder="{{ __('Translator standard rate') }}" value="{!! $user->crew->standard_rates !!}">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="unit_rate">{{ __('Per') }}</label>
                        <select name="unit_rate" id="unit_rate" class="form-control">
                            <option value="word"{!! $user->crew->unit_rate == 'word' ? ' selected': '' !!}>Word</option>
                            <option value="minute"{!! $user->crew->unit_rate == 'minute' ? ' selected': '' !!}>Minute</option>
                            <option value="hour"{!! $user->crew->unit_rate == 'hour' ? ' selected': '' !!}>Hour</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="form-label" for="credits">{{ __('Credits') }}</label>
                    <div class="input-group">
                        <input type="number" id="credits" name="credits" class="form-control" placeholder="{{ __('Credits client bought') }}" value="{!! (int)$user->crew->credits !!}">
                        <div class="input-group-append">
                            <span class="input-group-text">credits</span>
                        </div>
                    </div>
                </div>
                @if ($user->crew->certificate && $user->crew->certificate->count())
                    @foreach ($user->crew->certificate as $cert)
                        <a href="{{ url('admin/certificate/'.$cert->id) }}" class="btn btn-xs btn-primary waves-effect waves-themed btn-pills">{{ $cert->title }}</a>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="panel-content p-2 pb-0 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-muted">
            <button type="button" class="btn btn-lg btn-success waves-effect waves-themed">
                <span class="fal fa-save mr-1"></span>
                {{ __('Save') }}
            </button>
        </div>
    </div>
</form>