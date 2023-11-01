@extends('web.layouts.app')
@section('page_title', 'Areas')
@section('content')
    <section class="areas-page">
        <div class="title"> <a href="{{ route('web.home') }}"><img src="{{ asset('web/images/back.svg') }}"
                    alt="" /></a>
        </div>
        <div class="main">
            <div class="floars mb-5 mt-5">
                <img src="{{ asset('web/images/floar1.png') }}" class="img-fluid mb-5" alt="Responsive image">
                <br>
                <img src="{{ asset('web/images/floar2.png') }}" class="img-fluid mb-5" alt="Responsive image">

            </div>
            @include('web.layouts.nav')

        </div>
    </section>

@endsection
@push('scripts')
@endpush
