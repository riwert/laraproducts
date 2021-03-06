@extends('layout')

@section('content')
    <h1 class="page-title">
        {{ $title }}
    </h1>

    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
        {{ csrf_field() }}

        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} row">
            <label for="email" class="col-md-4 control-label">{{ __('Adres e-mail') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Wyślij link resetujący hasło') }}
                </button>
            </div>
        </div>
    </form>
@endsection
