<form method="POST" action="{{ url('client/update') }}">
    <ul class="tr-list resume-info">
        <li class="career-objective">
            <div class="icon">
                <i class="fa fa-black-tie" aria-hidden="true"></i>
            </div>  
            <div class="media-body">
                <span class="tr-title">{{ __('Company info') }}</span>
                <input type="text" class="form-control" placeholder="{{ __('Company name') }}" value="{!! $user->client && $user->client->co_name ? $user->client->co_name: '' !!}">
                <input type="text" class="form-control" placeholder="{{ __('Company phone') }}" value="{!! $user->client && $user->client->co_phone ? $user->client->co_phone: '' !!}">
                <input type="text" class="form-control" placeholder="{{ __('Company e-mail address') }}" value="{!! $user->client && $user->client->co_email ? $user->client->co_email: '' !!}">
                <textarea class="form-control" rows="10" placeholder="{{ __('Company description') }}">{!! $user->client && $user->client->info ? nl2br($user->client->info): '' !!}</textarea>
            </div>
        </li>
    </ul>
    <div class="buttons pull-right">
        <a href="#account-info" aria-controls="company" role="tab" data-toggle="tab" class="btn button-cancle">Cancel</a>
        <button type="submit" class="btn btn-primary">Update Profile</a>
    </div>
</form>