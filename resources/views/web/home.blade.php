@extends('web.layouts.app')
@section('page_title','Home')
@section('content')
    <section class="home-page">
        <div class="main">
            <div class="content">
                <div class="title">
                    <h2>@lang('admin.Home')</h2>
                </div>
                <div class="search">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa-solid fa-magnifying-glass"></i></span>
                        </div>
                        <input id="searchInput" type="text" class="form-control" placeholder="{{ __('Search') }}" aria-label="Search" aria-describedby="basic-addon1">
                    </div>

                    <div class="search-result d-none">

                    </div>
                </div>

                <div class="guide">
                  <div class="d-flex justify-content-between mb-4">
                     <div>
                        <h3>{{ __('GAME MANUAL') }}</h3>
                        <small>{{ __('Ignite your sense of adventure!') }}</small>
                    </div>
                    <div class="icon"><img src="{{ asset('web/images/trophy.svg') }}" alt="" /></div>
                  </div>
                  <div class="d-flex justify-content-between">
                    <p>@lang('admin.p-THE-GAME')</p>
                    <a class="d-flex align-items-center" href="{{ route('web.statics') }}">
                        <span>@lang('admin.view-all')</span>
                       <img src="{{ asset('web/images/arrow.svg') }}" alt="" />
                     </a>
                 </div>
                </div>

                <div class="activites">
                    <h3>@lang('admin.Activites')</h3>
                    <div class="activites_content">
                        <a  href="{{route('web.agenda.index')}}" class="activity agenda">
                            <div class="img">
                                <img src="{{ asset('web/images/agenda.svg') }}" alt="" />
                            </div>
                            <h4>@lang('admin.Agenda')</h4>
                            <small>@lang('admin.Browse-the-agenda')</small>
                        </a>
                        <a href="{{route('web.challenges.index')}}"  class="activity challenges">
                            <div class="img">
                                <img src="{{ asset('web/images/challenges.svg') }}" alt="" />
                            </div>
                            <h4>@lang('admin.challenges')</h4>
                            <small>@lang('admin.your-progress')</small>
                        </a>
                        <a class="activity map" href="{{ route('web.map') }}">
                            <div class="img">
                                <img src="{{ asset('web/images/map.svg') }}" alt="" />
                            </div>
                            <h4>@lang('admin.Map')</h4>
                            <small>@lang('admin.Where-to-go')</small>
                        </a>
                    </div>
                </div>

                <div class="leaderboard">
                    <h3>@lang('admin.leaderboards')</h3>
                    <div class="leaderboard_content">
                        <div class="arrangement">
                            @if(isset($secondUser) && $secondUser->experience_points > 0)
                            <div class="arrange">
                                <div class="img">
                                    <img src="{{$secondUser->profile_image != null ? getImage('Users', $secondUser->profile_image) : asset('web/images/icons8-gamer-64.png') }}" alt="" />
                                    <span class="leaderboard-no no-2">2</span>
                                </div>
                                <h5>{{ $secondUser->user_name }}</h5>
                                <span class="second">{{ $secondUser->experience_points }}</span>
                            </div>
                            @endif
                            @if(isset($firstUser) && $firstUser->experience_points > 0)
                            <div class="arrange first">
                                <div class="img">
                                    <img src="{{ $firstUser->profile_image != null ? getImage('Users', $firstUser->profile_image) : asset('web/images/icons8-gamer-64.png') }}" alt="" />
                                    <span class="leaderboard-no no-1">1</span>
                                </div>
                                <h5>{{ $firstUser->user_name }}</h5>
                                <span>{{ $firstUser->experience_points }}</span>
                            </div>
                            @endif

                            @if(isset($thirdUser) && $thirdUser->experience_points > 0)

                            <div class="arrange third">
                                <div class="img">
                                    <img src="{{ $thirdUser->profile_image != null ? getImage('Users', $thirdUser->profile_image) : asset('web/images/icons8-gamer-64.png') }}" alt="" />
                                    <span class="leaderboard-no no-3">3</span>
                                </div>
                                <h5>{{ $thirdUser->user_name }}</h5>
                                <span class="third">{{ $thirdUser->experience_points }}</span>
                            </div>
                            @endif
                        </div>
                        <a class="d-flex align-items-center justify-content-end" href="{{ route('web.leaderboard.index') }}">
                            <span>@lang('admin.view-all')</span>
                            <img src="{{ asset('web/images/arrow.svg') }}" alt="" />
                        </a>
                    </div>

                </div>

             <div>

            @include('web.layouts.nav')
        </div>
    </section>
    @endsection
@push('scripts')

<script>
    $(document).ready(function() {

        $('#searchInput').keyup(function() {
            let search = $(this).val();

            let url = "{{ route('web.search') }}";
            let form = $(this);
            let formData = new FormData();
            let token = "{{ csrf_token() }}";
            formData.append('search', search);
            formData.append('_token', token);


            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var searchResult = $('.search-result');
                    searchResult.html(response);
                    searchResult.removeClass('d-none');

                },
                error: function(xhr, status, error) {
                    // Error handler
                    console.log('Request failed!');
                    console.log('Status: ' + status);
                    console.log('Error: ' + error);
                    // Add your code to handle the error here
                }
            });
        });

        $('body').click(function(){
            $('.search-result').addClass('d-none');

        })

    });
</script>

@endpush
