@extends('layout')

@section('content')
    <h1 class="page-title">
        {{ $title }}
    </h1>

    <form class="form-horizontal" method="POST" action="{{ route('users.update', ['id' => $user->id]) }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} row">
            <label for="name" class="col-md-4 control-label">{{ __('Nazwa') }}</label>

            <div class="col-md-6">
                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name or old('name') }}" required autofocus>

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
            <label for="email" class="col-md-4 control-label">{{ __('Adres e-mail') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email or old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6">
                <div class="checkbox">
                    <label>
                        <input id="change-password" type="checkbox" name="change_password" {{ old('change_password') ? 'checked' : '' }}> {{ __('Zmień hasło') }}
                    </label>
                </div>
            </div>
        </div>

        <div class="change-password d-none form-group{{ $errors->has('old-password') ? ' has-error' : '' }} row">
                <label for="old-password" class="col-md-4 control-label">{{ __('Stare hasło') }}</label>

                <div class="col-md-6">
                    <input id="old-password" type="password" class="form-control" name="old_password" required disabled>

                    @if ($errors->has('old_password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('old_password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

        <div class="change-password d-none form-group{{ $errors->has('new-password') ? ' has-error' : '' }} row">
            <label for="new-password" class="col-md-4 control-label">{{ __('Nowe hasło') }}</label>

            <div class="col-md-6">
                <input id="new-password" type="password" class="form-control" name="new_password" required disabled>

                @if ($errors->has('new_password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('new_password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="change-password d-none form-group row">
            <label for="new-password-confirm" class="col-md-4 control-label">{{ __('Potwierdź nowe hasło') }}</label>

            <div class="col-md-6">
                <input id="new-password-confirm" type="password" class="form-control" name="new_password_confirmation" required disabled>

                @if ($errors->has('new_password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('new_password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Zapisz zmiany') }}
                </button>
            </div>
        </div>
    </form>
@endsection
