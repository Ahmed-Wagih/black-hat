@extends('web.layouts.app')
@section('page_title', 'Interests')
@section('content')
    <section class="interests-page">
        <div class="main">
            <div class="content">
                <div class="title d-flex justify-content-between">
                    <h2>@lang('admin.interests')</h2>
                </div>

                <div class="search">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i
                                    class="fa-solid fa-magnifying-glass"></i></span>
                        </div>
                        <input type="text" class="form-control" placeholder="@lang('admin.search')" aria-label="Search"
                            aria-describedby="basic-addon1">
                    </div>
                </div>

                <form action="{{ route('web.interests') }}" method="post">
                    @csrf
                    <div class="interests">
                        @foreach ($interests as $interest)
                            <div class="interest">
                                <input type="checkbox" name="interests[]" class="check-box d-none" value="{{ $interest->id }}">
                                <div class="icon plus">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <div class="icon check d-none">
                                    <i class="fa-solid fa-check"></i>
                                </div>
                                <div class="name">
                                    <img src="{{ getImage('Interests', $interest->icon) }}" alt="">
                                    <p>{{LaravelLocalization::getCurrentLocale() == 'ar' ? $interest->name_ar :  $interest->name_en }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="footer mt-5 text-center">
                        <button type="submit" class="btn main-button mb-5">{{ __('Continue') }}</button>
                    </div>
                </form>

            </div>

        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.interest').on('click', function() {
                $(this).toggleClass('selected');
                $(this).find('.icon').toggleClass('d-none');
                $(this).find('.check-box').prop('checked', !$(this).find('.check-box').prop('checked'));
            });
        });
    </script>
@endpush
