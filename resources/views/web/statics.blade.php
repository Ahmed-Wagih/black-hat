@extends('web.layouts.app')
@section('page_title', 'Statics')
@section('content')
    <section class="statics-page">
        <div class="main">
            <div class="content">
                <div class="title">
                    <a href="{{ route('web.home') }}"><img src="{{ asset('web/images/back.svg') }}" alt="" /></a>
                </div>
                <div class="box">
                    <div class="collection">
                        <ul>
                            @for ($i = 1; $i <= auth()->user()->lifes; $i++)
                                <li><img src="{{ asset('web/images/heart.svg') }}" alt="" /></li>
                            @endfor
                        </ul>
                        <h4>{{ auth()->user()->lifes }} @lang('admin.Chances')</h4>
                    </div>
                    <div class="bars">
                        <div class="bar">
                            <h5>@lang('admin.Level') {{ auth()->user()->level }}</h5>
                            <div class="bar-wrraper">
                                <div class="bar-inner"
                                    style="width:{{ ceil((auth()->user()->experience_points / 10000) * 100) }}%"></div>
                                <div class="icon" style="border-color: #000">
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
                                <div class="bar-inner"
                                    style="width:{{ ceil((auth()->user()->health_bar / 10000) * 100) }}%"></div>
                                <div class="icon" style="border-color: #50F2FD">
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
                                <div class="bar-inner" style="width:{{ ceil((auth()->user()->mena_bar / 10000) * 100) }}%">
                                </div>
                                <div class="icon"  style="border-color: #5303D5">
                                    <img src="{{ asset('web/images/mana.svg') }}" alt="" />
                                </div>
                            </div>
                            <div class="bar-info">
                                <span>{{ auth()->user()->mena_bar }}</span>
                                <span>@lang('admin.Mana-Bar')</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="box d-flex gap-2 justify-content-between">
                    <div>
                        <h3>@lang('admin.Scan-anywhere')</h3>
                        <div class="bars anywhere">
                            <div class="bar smBar">
                                <h5>@lang('admin.Level') 1</h5>
                                <div class="bar-wrraper">
                                    <div class="bar-inner" style="width:75%"></div>
                                    <div class="icon smIcon" style="border-color: #000">
                                        <img src="{{ asset('web/images/experience.svg') }}" alt="" />
                                    </div>
                                </div>
                                <div class="bar-info">
                                    <span>+100 @lang('admin.Experience-Points')</span>
                                </div>
                            </div>

                            <div class="bar smBar">
                                <div class="bar-wrraper">
                                    <div class="bar-inner" style="width:45%"></div>
                                    <div class="icon smIcon" style="border-color: #50F2FD">
                                        <img src="{{ asset('web/images/chest.svg') }}" alt="" />
                                    </div>
                                </div>
                                <div class="bar-info">
                                    <span>-100 @lang('admin.Health-Bar')</span>
                                </div>
                            </div>

                            <div class="bar smBar">
                                <div class="bar-wrraper">
                                    <div class="bar-inner smIcon" style="width:45%"></div>
                                    <div class="icon smIcon" style="border-color: #5303D5">
                                        <img src="{{ asset('web/images/mana.svg') }}" alt="" />
                                    </div>
                                </div>
                                <div class="bar-info">
                                    <span>-100 @lang('admin.Mana-Bar')</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <h3>{{ __('Scan in F&B') }}</h3>
                        <div class="bars">
                            <div class="bar smBar">
                                <h5>@lang('admin.Level') 1</h5>
                                <div class="bar-wrraper">
                                    <div class="bar-inner" style="width:75%"></div>
                                    <div class="icon smIcon" style="border-color: #000">
                                        <img src="{{ asset('web/images/experience.svg') }}" alt="" />
                                    </div>
                                </div>
                                <div class="bar-info">
                                    <span>+100 @lang('admin.Experience-Points')</span>
                                </div>
                            </div>

                            <div class="bar smBar">
                                <div class="bar-wrraper">
                                    <div class="bar-inner" style="width:80%"></div>
                                    <div class="icon smIcon" style="border-color: #50F2FD">
                                        <img src="{{ asset('web/images/chest.svg') }}" alt="" />
                                    </div>
                                </div>
                                <div class="bar-info">
                                    <span>-100 @lang('admin.Health-Bar')</span>
                                </div>
                            </div>

                            <div class="bar smBar">
                                <div class="bar-wrraper">
                                    <div class="bar-inner" style="width:80%"></div>
                                    <div class="icon smIcon" style="border-color: #5303D5">
                                        <img src="{{ asset('web/images/mana.svg') }}" alt="" />
                                    </div>
                                </div>
                                <div class="bar-info">
                                    <span>-100 @lang('admin.Mana-Bar')</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               

                <div class="box d-flex gap-4 justify-content-evenly">
                    <a href="{{ route('web.scan_qrcode') }}" class="text-decoration-none">@lang('admin.Scan')</a>
                    <a href="{{ route('web.leaderboard.index') }}" class="text-decoration-none">@lang('admin.leaderboards')</a>
                </div>

            </div>


            @include('web.layouts.nav')

        </div>
    </section>
@endsection

