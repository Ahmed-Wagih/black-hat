@extends('web.layouts.app')
@section('page_title', 'Areas')
@section('content')
    <section class="areas-page">
        <div class="title"> <a href="{{ route('web.home') }}"><img src="{{ asset('web/images/back.svg') }}"
                    alt="" /></a>
        </div>
        <div class="main">
            <div class="map">
                <div class="head mb-5">
                    <div class="row mb-5">
                        <div class="col-6">
                            <div class="box">
                                {{ __('The Platform') }}
                            </div>
                            <ul>
                                <li><span style="background-color: #5302D6"></span> {{ __('F&B Zones') }}</li>
                                <li><span style="background-color: #4FF4FF"></span> {{ __('Exhibitors Booths') }}</li>
                                <li><span style="background-color: #000000"></span> {{ __('Networking Area') }}</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <div class="box">
                                {{ __('X Theater') }}
                            </div>
                            <ul>
                                <li><span style="background-color: #000000"></span> {{ __('F&B Zones') }}</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col-6">
                            <div class="box">
                                {{ __('Level-up Area') }}
                            </div>
                            <ul>
                                <li><span style="background-color: #5302D6"></span> {{ __('Consultation Sessions') }}</li>
                                <li><span style="background-color: #000000"></span> {{ __('Masterclass') }}</li>
                                <li><span style="background-color: #000000"></span> {{ __('Workshops (2nd Floor)') }}</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <div class="box">
                                {{ __('Demo Arena') }}
                            </div>
                            <ul>
                                <li><span style="background-color: #4FF4FF"></span> {{ __('Interactive zones') }}</li>
                                <li><span style="background-color: #5302D6"></span> {{ __('Startups Games Showcase') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="foot mb-5">
                    <img src="{{ asset('web/images/map-foot.svg') }}" alt="">
                </div>
            </div>
            @include('web.layouts.nav')
        </div>
    </section>

@endsection
@push('scripts')
@endpush
