<form action="{{ url('customer/'.$user->id.($apphelper->queryToURL(\Request::query()))) }}" method="POST">
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
                    <input type="text" id="co_name" name="co_name" class="form-control" placeholder="{{ __('Company name') }}" value="{!! $user->client->co_name !!}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="co_email">{{ __('E-mail') }}</label>
                    <input type="text" id="co_email" name="co_email" class="form-control" placeholder="{{ __('Company e-mail address') }}" value="{!! $user->client->co_email !!}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="co_phone">{{ __('Phone number') }}</label>
                    <input type="text" id="co_phone" name="co_phone" class="form-control" placeholder="{{ __('Company phone number') }}" value="{!! $user->client->co_phone !!}">
                </div>
                <div class="form-group">
                    <label class="form-label" for="country_id">{{ __('Country') }}</label>
                    <select name="country_id" id="country_id" class="form-control">
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}"{!! $user->client->country_id == $country->id ? ' selected': '' !!}>{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label class="form-label" for="info">{{ __('Company info') }}</label>
                    <textarea name="info" id="info" class="form-control" rows="5" placeholder="{{ __('Describe role') }}">{!! $user->client->info !!}</textarea>
                </div>
                <div class="form-group row">
                    <div class="col-sm-6">
                        <label class="form-label" for="credits">{{ __('Credits') }}</label>
                        <div class="input-group">
                            <input type="number" id="credits" name="credits" class="form-control" placeholder="{{ __('Credits client bought') }}" value="{!! $user->client->credits !!}">
                            <div class="input-group-append">
                                <span class="input-group-text">days</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="credit_start">{{ __('Start from') }}</label>
                        <input type="date" id="credit_start" name="credit_start" class="form-control" placeholder="{{ __('Credits days start from') }}" value="{!! \Carbon\Carbon::parse($user->client->credit_start)->format('Y-m-d') !!}">
                    </div>
                </div>
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