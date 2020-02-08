<form method="POST" action="{{ route('register') }}?as={!! $as !!}" class="tr-form">
    @csrf
    <input type="hidden" name="role" value="{!! \Request::query('as') ? \Request::query('as'): $as !!}">
    <div class="form-group">
        <input type="text" class="form-control" placeholder="{{ __('Your name')}} " name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="invalid-feedback" style="display:block">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <input type="email" class="form-control"placeholder="{{ __('Your e-mail address')}} " name="email" value="{{ old('email') }}" required>
        @error('email')
            <div class="invalid-feedback" style="display:block">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password" placeholder="Password" required autocomplete="new-password">

        @error('password')
            <div class="invalid-feedback" style="display:block">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm password">
    </div>					
    <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
</form>	