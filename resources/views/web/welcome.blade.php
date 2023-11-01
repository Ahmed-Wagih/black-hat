@extends('web.layouts.app')
@section('page_title', 'Welcome')
@section('content')
    <section class="welcome-page">
        <div class="main">
            <div class="content">
                <h2>@lang('admin.Welcome')!</h2>
                <p>@lang('admin.Welcomep')</p>
                <img src="{{ asset('web/images/welcome.png') }}" alt="">
            </div>
            <div class="footer mt-5">
                <a href="{{ route('web.login') }}" class="btn main-button mb-5">{{ __('Sign in') }}</a>
                <a href="{{ route('web.register') }}" class="btn sub-button">{{ __('No account yet? ') }} <span>Sign up</span></a>
            </div>
        </div>
    </section>
@endsection
