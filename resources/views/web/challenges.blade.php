@extends('web.layouts.app')
@section('page_title', 'Challenges')
@section('content')
    <section class="challenges-page">
        <div class="main">
            <div class="content">
                <div class="title"> <a href="{{ route('web.home') }}"><img src="{{ asset('web/images/back.svg') }}"
                            alt="" /></a>
                    <h2>{{ __('admin.challenges') }}
                    </h2>
                </div>
                <div class="search">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend"> <span lass="input-group-text" id=" basic-addon1">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </div>
                        <input id="searchInput" type="text" class="form-control" placeholder="Search" aria-label="Search"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="search-result d-none">

                </div>
                <div>
                    <h3>{{ __('admin.categories') }}</h3>
                    <div class="categories">
                        <a href="{{ route('web.challenges.index') }}">
                            <div class="category">
                                <span>{{ __('All') }}</span>
                            </div>
                        </a>
                        @foreach ($challengecategories as $challengecategory)
                            <a href="{{ route('web.challenges.index', ['category_id' => $challengecategory->id]) }}">
                                <div class="category">
                                    <img src=" {{ getImage('ChallengeCategories', $challengecategory->icon) }}"
                                        alt="" />
                                    <span>{{ LaravelLocalization::getCurrentLocale() == 'ar' ? $challengecategory->name_ar : $challengecategory->name_en }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div class="challenges">
                    <h3>{{ __('admin.challenges') }}</h3>
                    <div class="swiper">
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            @foreach ($challenges as $challenge)
                                <div class="swiper-slide"> <a href="{{ route('web.challenges.show', $challenge->id) }}"
                                        class="text-decoration-none">
                                        <div class="cardS2">
                                            <div class="head text-center"> <img
                                                    src="{{ getImage('Challenges', $challenge->cover_image) }}"
                                                    alt="" width="175px" />
                                                <button class="fav">
                                                    <img src="{{ asset('web/images/fav.svg') }}" alt="" />
                                                </button>
                                            </div>
                                            <h4>{{ LaravelLocalization::getCurrentLocale() == 'ar' ? $challenge->name_ar : $challenge->name_en }}
                                            </h4>
                                            <p>{{ LaravelLocalization::getCurrentLocale() == 'ar' ? $challenge->description_ar : $challenge->description_en }}
                                            </p>
                                            <div class="tags">
                                                <div class="counts">
                                                    <img src="{{ asset('web/images/gold.svg') }}" alt="" />
                                                    <span>{{ $challenge->pointes }}</span>
                                                </div>
                                                <div class="tag">
                                                    <span>{{ LaravelLocalization::getCurrentLocale() == 'ar'
                                                        ? $challenge->challengecategory->name_ar
                                                        : $challenge->challengecategory->name_en }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                <div class="challenges">
                    <h3>{{ __('admin.Top-Challenges') }}</h3>
                    <div class="swiper">
                        <div class="swiper-wrapper"> <!-- Slides -->
                            @foreach ($challenges as $challenge)
                                <div class="swiper-slide">
                                    <a href="{{ route('web.challenges.show', $challenge->id) }}"
                                        class="text-decoration-none">
                                        <div class="cardS2">
                                            <div class="head text-center">
                                                <img src="{{ getImage('Challenges', $challenge->cover_image) }}"
                                                    alt="" width="175px" />
                                                <button class="fav"> <img src="{{ asset('web/images/fav.svg') }}"
                                                        alt="" /> </button>
                                            </div>
                                            <h4>{{ LaravelLocalization::getCurrentLocale() == 'ar' ? $challenge->name_ar : $challenge->name_en }}
                                            </h4>
                                            <p>{{ LaravelLocalization::getCurrentLocale() == 'ar' ? $challenge->description_ar : $challenge->description_en }}
                                            </p>
                                            <div class="tags">
                                                <div class="counts">
                                                    <img src="{{ asset('web/images/gold.svg') }}" alt="" />
                                                    <span>{{ $challenge->pointes }}</span>
                                                </div>
                                                <div class="tag">
                                                    <span>{{ LaravelLocalization::getCurrentLocale() == 'ar'
                                                        ? $challenge->challengecategory->name_ar
                                                        : $challenge->challengecategory->name_en }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            @include('web.layouts.nav')

        </div>
    </section>
@endsection
@push('scripts')
    <script>
        var swiper = new Swiper('.swiper', {
            // Optional parameters
            spaceBetween: 10,
            slidesPerView: 1
        });
    </script>

<script>
    $(document).ready(function() {

        $('#searchInput').keyup(function() {
            let search = $(this).val();

            let url = "{{ route('web.challenges.search') }}";
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
@endpush
