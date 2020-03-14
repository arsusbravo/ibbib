<form action="{{ url('admin/certificates'.($apphelper->queryToURL(\Request::query()))) }}" method="POST">
    @csrf
    <div class="accordion" id="certificates">
        <div class="card" data-block="0">
            <div class="card-header" id="cert-header-0">
                <a href="javascript:void(0);" class="card-title" data-toggle="collapse" data-target="#cert-detail-0" aria-expanded="true" aria-controls="cert-detail-0">
                    Add new Certificate
                    <span class="ml-auto">
                        <span class="collapsed-reveal">
                            <i class="fal fa-minus-circle text-danger"></i>
                        </span>
                        <span class="collapsed-hidden">
                            <i class="fal fa-plus-circle text-success"></i>
                        </span>
                    </span>
                </a>
            </div>
            <div id="cert-detail-0" class="collapse" aria-labelledby="cert-header-0" data-parent="#certificates" data-block="0">
                <div class="card-body">
                    <label>{{ __('Title') }}</label>
                    <input class="form-control cert-title" name="title[]">
                    <label>{{ __('Description') }}</label>
                    <textarea class="form-control cert-description" name="description[]"></textarea>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>From</label>
                            <select name="language_from[]" class="form-control cert-langFrom">
                                <option value="0">{{ __('Choose a language') }}</option>
                                @foreach ($languages as $lang)
                                <option value="{{ $lang->id }}">
                                    {{ $lang->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>To</label>
                            <select name="language_to[]" class="form-control cert-langTo">
                                <option value="0">{{ __('Choose a language') }}</option>
                                @foreach ($languages as $lang)
                                <option value="{{ $lang->id }}">
                                    {{ $lang->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label>{{ __('Year issued')}}</label>
                            <select name="issued[]" class="form-control cert_year">
                                @for ($y=\Carbon\Carbon::now()->year;
                                $y>=\Carbon\Carbon::now()->subYears(50)->year;
                                $y--)
                                <option value="{{ $y }}">{!! $y !!}
                                </option>
                                @endfor
                            </select>
                        </div>
                        <div class="col-sm-6">
                            <label>{{ __('Degree')}}</label>
                            <select name="degree_id[]" class="form-control degree_id">
                                @foreach($degrees as $degree)
                                    <option value="{{ $degree->id }}">{!! $degree->title !!}</option>
                                @endforeach
                                <option value="0">{{ __('Other') }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($user->crew->certificates && $user->crew->certificates->count())
            @foreach ($user->crew->certificates as $k=>$item)
                <div class="card" data-block="{{ $k+1 }}">
                    <div class="card-header" id="cert-header-{{ $k+1 }}">
                        <a href="javascript:void(0);" class="card-title" data-toggle="collapse" data-target="#cert-detail-{{ $k+1 }}" aria-expanded="true" aria-controls="cert-detail-{{ $k+1 }}">
                            {{ $item->title }}
                            <span class="ml-auto">
                                <span class="collapsed-reveal">
                                    <i class="fal fa-minus-circle text-danger"></i>
                                </span>
                                <span class="collapsed-hidden">
                                    <i class="fal fa-plus-circle text-success"></i>
                                </span>
                            </span>
                        </a>
                    </div>
                    <div id="cert-detail-{{ $k+1 }}" class="collapse" aria-labelledby="cert-header-0" data-parent="#certificates" data-block="{{ $k+1 }}">
                        <div class="card-body">
                            <input type="hidden" name="id" value="{{ $item->id }}">
                            <label>{{ __('Title') }}</label>
                            <input class="form-control cert-title" value="{{ $item->title }}" name="title[]">
                            <label>{{ __('Description') }}</label>
                            <textarea class="form-control cert-description"
                                name="description[]">{{ $item->description }}</textarea>
                            <div class="row">
                                <div class="col-sm-6">
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
                                <div class="col-sm-6">
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
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
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
                                <div class="col-sm-6">
                                    <label>{{ __('Degree')}}</label>
                                    <select name="degree_id[]" class="form-control degree_id">
                                        @foreach($degrees as $degree)
                                            <option value="{{ $degree->id }}" {{ $degree->id == $item->degree_id ? 'selected' : '' }}>{!! $degree->title !!}</option>
                                        @endforeach
                                        <option value="0" {{ is_null($item->degree_id) ? 'selected' : '' }}>{!! $degree->title !!}>{{ __('Other') }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="p-2 pb-0 rounded-bottom border-faded border-left-0 border-right-0 border-bottom-0 text-muted">
        <button type="button" class="btn btn-lg btn-success waves-effect waves-themed">
            <span class="fal fa-save mr-1"></span>
            {{ __('Save') }}
        </button>
    </div>
</form>