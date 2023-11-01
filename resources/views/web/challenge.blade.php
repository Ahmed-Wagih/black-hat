@extends('web.layouts.app')
@section('page_title','Challenge')
@section('content')
    <section class="challenge-page">
        <div class="main">
            <div class="content">
                <div class="title">
                    <a href="{{ route('web.challenges.index') }}"><img src="{{ asset('web/images/back.svg') }}" alt="" /></a>
                </div>

                <div class="img">
                    <img src="{{ getImage('Challenges', $challenge->cover_image) }}" alt="" />
                    <button><img src="{{ asset('web/images/liked.svg') }}" alt="" /></button>
                </div>
                <h2>{{ LaravelLocalization::getCurrentLocale() == 'ar' ?  $challenge->name_ar : $challenge->name_en }}</h2>
                <div class="des">
                    <p>{{ LaravelLocalization::getCurrentLocale() == 'ar' ?  $challenge->description_ar : $challenge->description_en }}</p>
                   <button class="readMore" on>
                        <img src="{{ asset('web/images/more.svg') }}" alt="" />
                        <span>@lang('admin.read-more')</span>
                   </button>
                </div>

                <div class="cards">
                    <div class="card">
                        <div>
                            <img src="{{ asset('web/images/cup.svg') }}" alt="" />
                        </div>
                        <h3>Top {{ $challenge->number_top }}</h3>
                    </div>
                    <div class="card">
                        <div>
                            <img src="{{ asset('web/images/distance.svg') }}" alt="" />
                        </div>
                        <h3>{{ $challenge->pointes }} XP</h3>
                    </div>
                </div>

                <button class="acceptBtn" onclick="redirectToScanQrcode()">@lang('admin.Accept')</button>
            </div>

        </div>
    </section>
    @endsection
@push('scripts')
   <script>
    const str =document.querySelector(".des p")
    const readMore =document.querySelector(".readMore")
    if(str.textContent.length >= 71){
       str.textContent = `${str.textContent.slice(0,71)} ........`
       readMore.classList.add("show")
    }
   </script>

<script>
    function redirectToScanQrcode(){
        window.location.href = "{{ route('web.scan_qrcode') }}";
    }
</script>

@endpush
