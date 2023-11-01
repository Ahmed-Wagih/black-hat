@extends('web.layouts.app')
@section('page_title', 'Gender')
@section('content')
    <section class="gender-page">
        <div class="main">
            <form action="{{ route('web.gender') }}" method="POST">
                @csrf
                <div class="content">
                    <div class="title text-center">
                        <h2>@lang('admin.Genderpage')</h2>
                        <p>@lang('admin.Genderp')</p>
                    </div>
                    <div class="gender">
                        <div class="rounded-circle type" for="male">
                            @lang('admin.male')
                            <input class="check-box d-none" type="checkbox" name="gender" id="male" value="male">
                        </div>
                        <div class="rounded-circle type" for="female">
                            @lang('admin.female')
                            <input class="check-box d-none" type="checkbox" name="gender" id="female" value="female">
                        </div>
                    </div>
                    <div class="footer mt-5 text-center d-flex gap-1 justify-content-between">
                        <a href="#" class="btn main-button main-button-s2 mb-5">{{ __('admin.Back') }}</a>
                        <button type="submit" class="btn main-button mb-5">{{ __('admin.Continue') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('.type').on('click', function() {
                $(this).toggleClass('selected');
                $(this).siblings().removeClass('selected');
                $(this).find('.check-box').prop('checked', !$(this).find('.check-box').prop('checked'));
                $(this).siblings().find('.check-box').prop('checked', false);
            });
        });
    </script>
@endpush
