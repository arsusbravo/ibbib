<form method="POST" action="{{ url('user/account') }}">
    @csrf
    <ul class="tr-list resume-info">
        <li class="career-objective">
            <div class="icon">
                <i class="fa fa-black-tie" aria-hidden="true"></i>
            </div>
            <div class="media-body">
                <span class="tr-title">{{ __('Title') }}</span>
                <input class="form-control" name="objective" placeholder="{{ __('Title of your resume') }}"
                    value="{!! $user->crew->objective ? $user->crew->objective: '' !!}">
                <span class="tr-title">{{ __('Motivation') }}</span>
                <textarea name="motivation" class="form-control" rows="10"
                    placeholder="{{ __('Fill in your marketing words') }}">{!! $user->crew->resume ? $user->crew->resume: '' !!}</textarea>
            </div>
        </li>
        <li class="personal-deatils code-edit-small">
            <div class="icon">
                <i class="fa fa-user-secret" aria-hidden="true"></i>
            </div>
            <div class="media-body">
                <span class="tr-title">{{ __('Personal Details') }}</span>
                <div class="row">
                    <div class="col-sm-4">
                        <label>{{ __('Display Name') }}<span class="pull-right">:</span> </label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" name="name" value="{{ $user->name }}" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <label>{{ __('Phone number') }}<span class="pull-right">:</span> </label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control" name="phone" value="{{ $user->crew->co_phone }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <label>{{ __('Country/Location') }}<span class="pull-right">:</span> </label>
                    </div>
                    <div class="col-sm-8">
                        <select class="form-control" name="country_id">
                            <option value="0">{{ __('Choose a country') }}</option>
                            @foreach ($countries as $country)
                            <option value="{{ $country->id }}" {{$selectedCountry == $country->id ? 'selected' : '' }}>
                                {{ $country->country_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <label>{{ __('Standard rate') }}<span class="pull-right">:</span> </label>
                    </div>
                    <div class="col-sm-4">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">&#36;</span>
                            </div>
                            <input class="form-control" name="standard_rates" value="{{ $user->crew->standard_rates }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <select class="form-control" name="unit_rate">
                            <option value="word" {{  $user->crew->unit_rate == 'word' ? 'selected' : '' }}>
                                {{ __('word') }} </option>
                            <option value="hour" {{ $user->crew->unit_rate == 'hour' ? 'selected' : '' }}>
                                {{ __('hour') }} </option>
                        </select>
                    </div>
                </div>
            </div>
        </li>
        <li class="work-history">
            <div class="icon">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
            </div>
            <div class="media-body additem-work" class="form-group">
                <span class="tr-title">Certificates</span>
                <div id="addhistory" class="additem">
                    <span id="clone" class="icon clone"><i class="fa fa-plus" aria-hidden="true"></i></span>
                    <span class="icon remove"><i class="fa fa-times" aria-hidden="true"></i></span>
                    <div class="code-edit-small">
                        <label>{{ __('Title') }}</label>
                        <input class="form-control" name="title[]" id="cert-title">
                        <label>{{ __('Description') }}</label>
                        <textarea class="form-control" name="description[]" id="cert-description"></textarea>
                        <div class="row">
                            <div class="col-sm-4 col-md-4">
                                <label>From</label>
                                <select name="language_from[]" class="form-control">
                                    <option value="0">{{ __('Choose a language') }}</option>
                                    @foreach ($languages as $lang)
                                    <option value="{{ $lang->id }}" id="cert-langFrom">{!! $lang->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <label>To</label>
                                <select name="language_to[]" class="form-control">
                                    <option value="0">{{ __('Choose a language') }}</option>
                                    @foreach ($languages as $lang)
                                    <option value="{{ $lang->id }}" id="cert-langTo">{!! $lang->name !!}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <label>{{ __('Year issued')}}</label>
                                <select name="issued[]" class="form-control">
                                    @for ($y=\Carbon\Carbon::now()->year; $y>=\Carbon\Carbon::now()->subYears(50)->year;
                                    $y--)
                                    <option value="{{ $y }}">{!! $y !!}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </li><!-- /.work-history -->
        <li class="education-background">
            <div class="icon">
                <i class="fa fa-briefcase" aria-hidden="true"></i>
            </div>
            <div class="media-body additem-edu">
                <span class="tr-title">{{ __('Translation Proficiency') }}</span>
                <div id="add-edu" class="additem">
                    <span id="edu-clone" class="icon clone"><i class="fa fa-plus" aria-hidden="true"></i></span>
                    <span class="icon remove"><i class="fa fa-times" aria-hidden="true"></i></span>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Translation from:</label>
                            <select name="from[]" class="form-control">
                                <option value="0">{{ __('Choose a language') }}</option>
                                @foreach ($languages as $lang)
                                <option value="{{ $lang->id }}">{!! $lang->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>Translate in to:</label>
                            <select name="to[]" class="form-control">
                                <option value="0">{{ __('Choose a language') }}</option>
                                @foreach ($languages as $lang)
                                <option value="{{ $lang->id }}">{!! $lang->name !!}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label>{{ __('Level') }}</label>
                            <div class="rating-star">
                                <div class="rating">
                                    <input type="radio" id="star1" name="level[]"><label class="full"
                                        for="star1"></label>
                                    <input type="radio" id="star2" name="level[]"><label class="full"
                                        for="star2"></label>
                                    <input type="radio" id="star3" name="level[]"><label class="full"
                                        for="star3"></label>
                                    <input type="radio" id="star4" name="level[]"><label class="full"
                                        for="star4"></label>
                                    <input type="radio" id="star5" name="level[]"><label class="full"
                                        for="star5"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label>{{ __('Description') }}</label>
                    <textarea class="form-control" name="description[]"
                        placeholder="{{ __('Description') }}"></textarea>
                </div><!-- /.additem -->
            </div>
        </li><!-- /.personal-deatils -->
        <li class="personal-deatils">
            <div class="icon">
                <i class="fa fa-hand-peace-o" aria-hidden="true"></i>
            </div>
            <div class="media-body">
                <span class="tr-title">{{ __('Additional information') }}</span>
                <textarea name="additional_info" class="form-control" rows="10"
                    placeholder="{{ __('Additional information') }}">{{ $user->crew->additional_info }}</textarea>
            </div>
        </li><!-- /.personal-deatils -->
    </ul>
    <div class="buttons pull-right">
        <a href="#resume" aria-controls="resume" role="tab" data-toggle="tab"
            class="btn button-cancle">{{ __('Cancel') }}</a>
        <button type="submit" class="btn btn-primary save_profile">{{ __('Update Your Resume') }}</button>
    </div>
</form>