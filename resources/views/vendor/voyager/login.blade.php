@extends('voyager::auth.master')

@section('content')
    <div class="login-container">

        <div class="row">
            <div class="col text-center">
                <img style="margin-bottom: 10px" src="{{ asset('logo.gif') }}" alt="logo" width="150">
                <h3 class="text-center">Sistem Kearsipan Keuangan Daerah</h3>
                <h3 class="text-center">Kabupaten Karimun</h3>
            </div>
        </div>

        <hr>

        @if(!$errors->isEmpty())
            <div class="alert alert-warning">
                <ul class="list-unstyled text-center">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <form action="{{ route('voyager.login') }}" method="POST">
        {{ csrf_field() }}

        <!-- Email -->
            <div class="form-group form-group-default" id="emailGroup">
                <label>{{ __('voyager::generic.email') }}</label>
                <div class="controls">
                    <input type="text" name="email" id="email" value="{{ old('email') }}"
                           placeholder="{{ __('voyager::generic.email') }}" class="form-control" required>
                </div>
            </div>

            <!-- Password -->
            <div class="form-group form-group-default" id="passwordGroup">
                <label>{{ __('voyager::generic.password') }}</label>
                <div class="controls">
                    <input type="password" name="password" placeholder="{{ __('voyager::generic.password') }}"
                           class="form-control" required>
                </div>
            </div>

            <div class="form-group" id="rememberMeGroup">
                <div class="controls">
                    <input type="checkbox" name="remember" id="remember" value="1">
                    <label for="remember" class="remember-me-text">{{ __('voyager::generic.remember_me') }}</label>
                </div>
            </div>

            <button type="submit" class="btn btn-block btn-primary">
                <span class="signingin hidden"><span class="voyager-refresh"></span> {{ __('voyager::login.loggingin') }}...</span>
                <span class="signin">{{ __('voyager::generic.login') }}</span>
            </button>

        </form>

        <div style="clear:both"></div>

    </div> <!-- .login-container -->
@endsection

@section('post_js')

    <script>
        var btn = document.querySelector('button[type="submit"]');
        var form = document.forms[0];
        var email = document.querySelector('[name="email"]');
        var password = document.querySelector('[name="password"]');
        btn.addEventListener('click', function (ev) {
            if (form.checkValidity()) {
                btn.querySelector('.signingin').className = 'signingin';
                btn.querySelector('.signin').className = 'signin hidden';
            } else {
                ev.preventDefault();
            }
        });
        email.focus();
        document.getElementById('emailGroup').classList.add("focused");

        // Focus events for email and password fields
        email.addEventListener('focusin', function (e) {
            document.getElementById('emailGroup').classList.add("focused");
        });
        email.addEventListener('focusout', function (e) {
            document.getElementById('emailGroup').classList.remove("focused");
        });

        password.addEventListener('focusin', function (e) {
            document.getElementById('passwordGroup').classList.add("focused");
        });
        password.addEventListener('focusout', function (e) {
            document.getElementById('passwordGroup').classList.remove("focused");
        });

    </script>
@endsection
