<form method="POST" action="{{ url('user/account') }}">
    @csrf
    <ul class="tr-list resume-info">
        <li class="career-objective">
            <div class="icon">
                <i class="fa fa-black-tie" aria-hidden="true"></i>
            </div>
            <div class="media-body">
                <span class="tr-title">{{ __('Title') }}</span>
                <input class="form-control objective" name="objective" placeholder="{{ __('Title of your resume') }}"
                    value="{!! $user->crew->objective ? $user->crew->objective: '' !!}">
                <span class="tr-title">{{ __('Motivation') }}</span>
                <textarea name="motivation" class="form-control motivation" rows="10"
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
                        <input class="form-control name" readonly name="name" value="{{ $user->name }}" required>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <label>{{ __('Phone number') }}<span class="pull-right">:</span> </label>
                    </div>
                    <div class="col-sm-8">
                        <input class="form-control phone" name="phone" value="{{ $user->crew->co_phone }}">
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-4">
                        <label>{{ __('Country/Location') }}<span class="pull-right">:</span> </label>
                    </div>
                    <div class="col-sm-8">
                        <select class="form-control country_id" name="country_id">
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
                            <input class="form-control standard_rates" name="standard_rates"
                                value="{{ $user->crew->standard_rates }}">
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <select class="form-control unit_rate" name="unit_rate">
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
            <div class="media-body form-group additem-work">
                <span class="tr-title">Certificates</span>
                <div class="certificates-wrapper" id="certificateList">
                    @if ($user->crew->Certificates->count())
                    @foreach ($user->crew->Certificates as $k=>$item)
                    <div id="addhistory{{ $k>0 ? $k: null }}" class="additem">
                        <span id="clone" class="icon clone"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        <span class="icon remove"><i class="fa fa-times" aria-hidden="true"></i></span>
                        <div class="code-edit-small">
                            <label>{{ __('Title') }}</label>
                            <input class="form-control cert-title" value="{{ $item->title }}" name="title[]">
                            <label>{{ __('Description') }}</label>
                            <textarea class="form-control cert-description"
                                name="description[]">{{ $item->description }}</textarea>
                            <div class="row">
                                <div class="col-sm-4 col-md-4">
                                    <label>From</label>
                                    <select name="language_from[]" class="form-control cert-langFrom">
                                        <option value="0">{{ __('Choose a language') }}</option>
                                        @foreach ($languages as $lang)
                                        <option value="{{ $lang->id }}"
                                            {{$item->language_from == $lang->id ? 'selected' : '' }}>
                                            {{ $lang->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <label>To</label>
                                    <select name="language_to[]" class="form-control cert-langTo">
                                        <option value="0">{{ __('Choose a language') }}</option>
                                        @foreach ($languages as $lang)
                                        <option value="{{ $lang->id }}"
                                            {{$item->language_to == $lang->id ? 'selected' : '' }}>
                                            {{ $lang->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <label>{{ __('Year issued')}}</label>
                                    <select name="issued[]" class="form-control cert_year">
                                        @for ($y=\Carbon\Carbon::now()->year;
                                        $y>=\Carbon\Carbon::now()->subYears(50)->year;
                                        $y--)
                                        <option value="{{ $y }}" {{$item->issued == $y ? 'selected' : '' }}>{!! $y !!}
                                        </option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div id="addhistory" class="additem">
                        <span id="clone" class="icon clone"><i class="fa fa-plus" aria-hidden="true"></i></span>
                        <span class="icon remove"><i class="fa fa-times" aria-hidden="true"></i></span>
                        <div class="code-edit-small">
                            <label>{{ __('Title') }}</label>
                            <input class="form-control cert-title" name="title[]">
                            <label>{{ __('Description') }}</label>
                            <textarea class="form-control cert-description" name="description[]"></textarea>
                            <div class="row">
                                <div class="col-sm-4 col-md-4">
                                    <label>From</label>
                                    <select name="language_from[]" class="form-control cert-langFrom">
                                        <option value="0">{{ __('Choose a language') }}</option>
                                        @foreach ($languages as $lang)
                                        <option value="{{ $lang->id }}">
                                            {{ $lang->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <label>To</label>
                                    <select name="language_to[]" class="form-control cert-langTo">
                                        <option value="0">{{ __('Choose a language') }}</option>
                                        @foreach ($languages as $lang)
                                        <option value="{{ $lang->id }}">
                                            {{ $lang->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-4 col-md-4">
                                    <label>{{ __('Year issued')}}</label>
                                    <select name="issued[]" class="form-control cert_year">
                                        @for ($y=\Carbon\Carbon::now()->year;
                                        $y>=\Carbon\Carbon::now()->subYears(50)->year;
                                        $y--)
                                        <option value="{{ $y }}">{!! $y !!}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>

            </div>
        </li>
       <!-- /.personal-deatils -->
        <li class="personal-deatils">
            <div class="icon">
                <i class="fa fa-hand-peace-o" aria-hidden="true"></i>
            </div>
            <div class="media-body">
                <span class="tr-title">{{ __('Additional information') }}</span>
                <textarea name="additional_info" class="form-control additional_info" rows="10"
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