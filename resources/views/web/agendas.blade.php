@extends('web.layouts.app')
@section('page_title', 'Agenda')
@section('content')
    <section class="agenda-page">
        <div class="main">
            <div class="content">
                <div class="title">
                    <a href="{{ route('web.home') }}"><img src="{{ asset('web/images/back.svg') }}" alt="" /></a>
                    <h2>@lang('admin.Agenda')</h2>
                </div>
                <div class="search">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span lass="input-group-text" id="basic-addon1"><i
                                    class="fa-solid fa-magnifying-glass"></i></span>
                        </div>
                        <input id="searchInput" type="text" class="form-control" placeholder="@lang('admin.search')"
                            aria-label="Search" aria-describedby="basic-addon1">
                    </div>
                    <div class="search-result d-none">
                    </div>

                    <div class="tags">
                        <a href="{{ route('web.agenda.index') }}">
                            <div class="tag" style="background: #080">
                                <span>{{ __('All') }}</span>
                            </div>
                        </a>
                        @foreach ($categories as $category)
                            <a href="{{ route('web.agenda.index', ['category_id' => $category->id]) }}">
                                <div class="tag" style="background: {{ $category->background }}">
                                    <img src="{{ getImage('Categories', $category->icon) }}" alt="" />
                                    <span>{{ LaravelLocalization::getCurrentLocale() == 'ar' ? $category->name_ar : $category->name_en }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="events">
                        <div class="head">
                            <h3>@lang('admin.upcoming-agenda')</h3>

                            <a>
                                <span onclick="redirectToAllAgendas()">@lang('admin.see-all')</span>
                                <img src="{{ asset('web/images/arrowsm.svg') }}" alt="" />
                            </a>
                        </div>
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <!-- Slides -->
                                @foreach ($agendas as $agenda)
                                    <div class="swiper-slide">
                                        <a href="{{ route('web.agenda.show', $agenda->id) }}">
                                            <div class="cardS1">
                                                <div class="head">
                                                    <div class="head-image"
                                                        style="background-image: url('{{ getImage('Agendas', $agenda->cover_image) }}')">
                                                    </div>
                                                    <div class="date">
                                                        <span>{{ \Carbon\Carbon::parse($agenda->date)->format('d') }}</span>
                                                        <span>{{ \Carbon\Carbon::parse($agenda->date)->format('M') }}</span>
                                                    </div>
                                                  
                                                </div>
                                                <h4>{{ LaravelLocalization::getCurrentLocale() == 'ar' ? $agenda->name_ar : $agenda->name_en }}
                                                </h4>
                                                {{-- <p>Sam Clever</p> --}}
                                                <ul>
                                                    <li>
                                                        <img src="{{ asset('web/images/map-pin.svg') }}" alt="" />
                                                        <span>{{ $agenda->city }}, </span>
                                                    </li>
                                                    <li>
                                                        <img src="{{ asset('web/images/calendar.svg') }}" alt="" />
                                                        <span>{{ \Carbon\Carbon::parse($agenda->time)->format('d/m/Y') }}</span>
                                                    </li>
                                                    <li>
                                                        <span>{{ \Carbon\Carbon::parse($agenda->time)->format('g:i A') }}</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                    <div class="invite">
                        <h4>@lang('admin.Invite-your-friends')</h4>
                        <p>@lang('admin.Get-an-invite-for-your-friend')</p>
                        <button class="share-button">@lang('admin.invite')</button>
                    </div>


                </div>

                @include('web.layouts.nav')

            </div>
    </section>
@endsection
@push('scripts')
    <script>
        const shareButton = document.querySelector('.share-button');
        const shareDialog = document.querySelector('.share-dialog');
        const closeButton = document.querySelector('.close-button');

        shareButton.addEventListener('click', event => {
            if (navigator.share) {
                navigator.share({
                        title: 'Share Ignite The game',
                        text:'Welcome to the engagement app for Ignite The game event use it now 🚀',
                        url: '{{ route('web.home') }}'
                    }).then(() => {
                        console.log('Thanks for sharing!');
                    })
                    .catch(console.error);
            } else {
                shareDialog.classList.add('is-open');
            }
        });

        closeButton.addEventListener('click', event => {
            shareDialog.classList.remove('is-open');
        });
    </script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            spaceBetween: 10,
            loop: false,
        });
    </script>

    <script>
        $(document).ready(function() {

            $('#searchInput').keyup(function() {
                let search = $(this).val();

                let url = "{{ route('web.agenda.search') }}";
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

            $('body').click(function() {
                $('.search-result').addClass('d-none');

            })

        });
    </script>

    <script>
        function copyLinkToClipboard() {
            // Create a temporary input element
            var tempInput = document.createElement('input');
            var copyLink = '{{ request()->url() }}';
            // Set the input value to the link
            tempInput.value = copyLink;

            // Append the temporary input element to the DOM
            document.body.appendChild(tempInput);

            // Select the input value
            tempInput.select();

            // Execute the copy command
            document.execCommand('copy');

            // Remove the temporary input element
            document.body.removeChild(tempInput);
            alert(' Link Copied Successfully.')
        }

        function redirectToAllAgendas(){
                window.location.href = "{{ route('web.agenda.all_agendas') }}";
            }
    </script>
@endpush
