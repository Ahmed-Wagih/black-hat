@extends('web.layouts.app')
@section('page_title', 'Settings')
@section('content')
    <section class="settings-page">
        <div class="main">
            <div class="content">
                <div class="title">
                    <a href="{{ route('web.profile') }}"><img src="{{ asset('web/images/back.svg') }}" alt="" /></a>
                    <h2>@lang('admin.settings')</h2>
                </div>

                <div class="setting_box">
                    <h3>@lang('admin.account')</h3>
                    <ul class="list">
                        <li>
                            <a href="{{ route('web.editprofile') }}"
                                style="text-decoration:none;color: inherit">
                                <img src="{{ asset('web/images/profileIcon.svg') }}" alt="" />
                                <span>@lang('admin.editprofile')</span>
                            </a>
                        </li>

                        <li>
                            <a>
                                <img src="{{ asset('web/images/notificationIcon.svg') }}" alt="" />
                                <span>@lang('admin.notiffictions')</span>
                            </a>
                        </li>

                    </ul>
                </div>
                <div class="setting_box">
                    <h3>@lang('admin.languages')</h3>
                    <ul class="list">
                        <li>
                            <div class="row">
                                @foreach (LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                    <div class="col-6">
                                        <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}"
                                            style="text-decoration:none;color: inherit">
                                            @if ($localeCode == 'ar')
                                                <img src="{{ asset('web/images/saudi-arabia.svg') }}" width="30px"
                                                    height="30px" alt="" />
                                            @else
                                                <img src="{{ asset('web/images/united-states.svg') }}" width="30px"
                                                    height="30px" alt="" />
                                            @endif
                                            <span>{{ $properties['native'] }}</span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        </li>

                    </ul>
                </div>

                <div class="setting_box">
                    <h3>@lang('admin.Actions')</h3>
                    <ul class="list">

                        <li>
                            <a href="{{ route('web.logout') }}" style="text-decoration:none;color: inherit">
                                <img src="{{ asset('web/images/logoutIcon.svg') }}" alt="" />
                                <span>@lang('admin.logout')</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="setting_box mt-3">
                    <h3>{{ __('About Us') }}</h3>
                    <ul class="list">

                        <li>
                            <a style="text-decoration:none;color: inherit; text-align:center">
                                <img class="text-center img-fluid mx-auto d-block w-50" height="150px" src="{{ asset('web/images/Gami.png') }}" alt="">
                            </a>
                        </li>
                        <li>
                            <a style="text-decoration:none;color: inherit">
                                <span>{{ __('Company Specialized in providing products and developing solutions designed by Gamification to make an engagement experience.') }}</span>
                            </a>
                        </li>
                        <li>
                            <a style="text-decoration:none;color: inherit">
                                <span>{{ __('For business projects please contact email below') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="mailto:info@gamifiersa.com" style="text-decoration:none;color: inherit">
                                <span>Info@gamifiersa.com</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

            @include('web.layouts.nav')

        </div>
    </section>
@endsection
@push('scripts')
@endpush
