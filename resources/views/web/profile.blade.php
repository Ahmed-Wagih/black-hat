@extends('web.layouts.app')
@section('page_title','Profile')
@section('content')
    <section class="profile-page">
        <div class="main">
            <div class="content">
                <div class="user">
                    <div class="img">
                        <img src="{{ getImage('Users', auth()->user()->profile_image) }}" alt="" width="100px" />
                    </div>
                    <div class="info">
                        <h2>{{ auth()->user()->full_name }}</h2>
                        @if($rank >= 3)
                        <small>#{{ $rank }} {{ __('in the Leaderboard') }} ⚔️</small>
                        <p>{{ auth()->user()->experience_points }} @lang('admin.points')</p>
                        @endif
                    </div>
                </div>
                @if(Session::has('message') && Session::has('alertType'))
                    <div class="alert alert-{{ Session::get('alertType') }}" role="alert">
                        {{ Session::get('message') }}
                    </div>
                @endif
                <div class="bars">
                    <div class="bar">
                        <div class="bar-wrraper">
                            <div class="bar-inner" style="width:{{ ceil((auth()->user()->experience_points / 10000) * 100) }}%"></div>
                            <div class="icon">
                                 <img src="{{ asset('web/images/experience.svg') }}" alt="" />
                            </div>
                        </div>
                        <div class="bar-info">
                            <span>{{ auth()->user()->experience_points }} xp</span>
                            <span>@lang('admin.Experience-Points')</span>
                        </div>
                    </div>

                    <div class="bar">
                        <div class="bar-wrraper">
                            <div class="bar-inner"  style="width:{{ ceil((auth()->user()->health_bar / 10000) * 100) }}%"></div>
                            <div class="icon">
                                 <img src="{{ asset('web/images/chest.svg') }}" alt="" />
                            </div>
                        </div>
                        <div class="bar-info">
                            <span>{{ auth()->user()->health_bar }} hp</span>
                            <span>@lang('admin.Health-Bar')</span>
                        </div>
                    </div>

                    <div class="bar">
                        <div class="bar-wrraper">
                            <div class="bar-inner"  style="width:{{ ceil((auth()->user()->mena_bar / 10000) * 100) }}%"></div>
                            <div class="icon">
                                 <img src="{{ asset('web/images/mana.svg') }}" alt="" />
                            </div>
                        </div>
                        <div class="bar-info">
                            <span>{{ auth()->user()->mena_bar }}</span>
                            <span>@lang('admin.Mana-Bar')</span>
                        </div>
                    </div>
                </div>

                <ul class="collection">
                    @if(auth()->user()->lifes < 3)
                        @for ($i =1; $i <= 3 - auth()->user()->lifes; $i++)
                            <li><img src="{{ asset('web/images/empty-heart.svg') }}" alt="" /></li>
                        @endfor
                    @endif
                    @for ($i =1; $i <= auth()->user()->lifes; $i++)
                        <li><img src="{{ asset('web/images/heart.svg') }}" alt="" /></li>

                    @endfor
                </ul>

                <a class="link mb-5" href="{{ route('web.settings.index') }}">@lang('admin.settings')</a>



            </div>

            @include('web.layouts.nav')

        </div>
    </section>
    @endsection
@push('scripts')

@endpush
