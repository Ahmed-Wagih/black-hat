@extends('web.layouts.app')
@section('page_title', 'Leaderboard')
@section('content')
    <section class="leaderboard-page">
        <div class="main">
            <div class="content">
                <div class="title">
                    <a href="{{ route('web.home') }}"><img src="{{ asset('web/images/back.svg') }}" alt="" /></a>
                    <h2>@lang('admin.leaderboards')</h2>
                </div>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">

                        <div class="winners">
                            @if (isset($secondUser) && $secondUser->experience_points > 0 )
                                <div class="winner">
                                    <div class="img">
                                        <img src="{{$secondUser->profile_image != null ? getImage('Users', $secondUser->profile_image) : asset('web/images/icons8-gamer-64.png') }}" alt="" />
                                        <span class="leaderboard-no no-2">2</span>
                                    </div>
                                    <h5>{{$secondUser->full_name}}</h5>
                                    <span class="second">{{$secondUser->experience_points}}</span>
                                    <small>{{$secondUser->user_name}}</small>
                                </div>
                            @endif
                            @if (isset($firstUser) && $firstUser->experience_points > 0)
                                <div class="winner first">
                                    <div class="img">
                                        <img src="{{$firstUser->profile_image != null ? getImage('Users', $firstUser->profile_image) : asset('web/images/icons8-gamer-64.png') }}" alt="" />
                                        <span class="leaderboard-no no-1">1</span>
                                    </div>
                                    <h5>{{$firstUser->full_name}}</h5>
                                    <span class="second">{{$firstUser->experience_points}}</span>
                                    <small>{{$firstUser->user_name}}</small>
                                </div>
                            @endif
                            @if (isset($thirdUser) && $thirdUser->experience_points > 0 )
                                <div class="winner">
                                    <div class="img">
                                        <img src="{{$thirdUser->profile_image != null ? getImage('Users', $thirdUser->profile_image) : asset('web/images/icons8-gamer-64.png') }}" alt="" />
                                        <span class="leaderboard-no no-3">3</span>
                                    </div>
                                    <h5>{{$thirdUser->full_name}}</h5>
                                    <span class="second">{{$thirdUser->experience_points}}</span>
                                    <small>{{$thirdUser->user_name}}</small>
                                </div>
                            @endif
                        </div>
                        @if (isset($remainingUsers))
                        <ul class="arrangement">
                            @foreach ($remainingUsers as $remainingUser)

                            <li>
                                <div class="info">
                                    <div><img src="{{ $remainingUser->profile_image != null ? getImage('Users', $remainingUser->profile_image) : asset('web/images/arrange1.svg') }}" /></div>
                                    <div>
                                        <h6>{{ $remainingUser->full_name }}</h6>
                                        <small>{{ $remainingUser->user_name }}</small>
                                    </div>
                                </div>
                                <div class="num">{{ $remainingUser->experience_points }}</div>
                            </li>
                            @endforeach

                        </ul>
                        @endif
                    </div>
                </div>

            </div>
    </section>
@endsection
@push('scripts')
@endpush
