@extends('web.layouts.app')
@section('page_title', 'Onboarding')
@section('content')
    <section class="onboarding-page">
        <div id="splash" class="splash">
            <div class="logo">
                <img src="{{ asset('web/images/black-hat-white-logo.svg') }}" alt="">
            </div>
        </div>

        <div class="main">
            <div class="content">
                <img src="{{ asset('web/images/onboarding.svg') }}" alt="">
                <h3>{{ __('Let’s heck it') }}</h3>
                <p>{{ __('App for the challengers') }}</p>
            </div>
            <div class="footer">
                <a href="{{ route('web.welcome') }}" class="btn main-button">{{ __('Get Started') }}</a>
            </div>
        </div>
    </section>
@endsection
@push('scripts')
    
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#splash').fadeOut('slow');
            }, 1500);
        });
    </script>
@endpush    