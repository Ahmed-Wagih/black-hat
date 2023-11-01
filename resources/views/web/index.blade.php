@extends('web.layouts.app')
@section('page_title', 'Onboarding')
@section('content')
    <section class="onboarding-page">
        <div id="splash" class="splash">
            <div class="logo">
                <img src="{{ asset('web/images/logoignite.svg') }}" alt="">
            </div>
            <div class="page-footer">
                <h3 class="title">{{ __('Powerd By') }}</h3>
                <div class="footer-logo">
                    <img src="{{ asset('web/images/game-tag-logo.svg') }}" alt="">
                </div>
            </div>
        </div>

        <div class="main">
            <div class="content">
                <img src="{{ asset('web/images/onboarding.svg') }}" alt="">
                <h3>{{ __('Play To Win!') }}</h3>
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