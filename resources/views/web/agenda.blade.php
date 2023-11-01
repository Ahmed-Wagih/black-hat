@extends('web.layouts.app')
@section('page_title','Challenge')
@push('styles')
    <style>
        .challenge-page .img img{
            width: 100%;
        }
    </style>
@endpush
@section('content')
    <section class="challenge-page">
        <div class="main">
            <div class="content">
                <div class="title">
                    <a href="{{ route('web.agenda.index') }}"><img src="{{ asset('web/images/back.svg') }}" alt="" /></a>
                </div>

                <div class="img">
                    <img src="{{ getImage('Agendas', $agenda->cover_image) }}" alt="" />
                </div>
                <h2>{{ LaravelLocalization::getCurrentLocale() == 'ar' ?  $agenda->name_ar : $agenda->name_en }}</h2>
                <div class="sdsadas">
                    <p>{{ LaravelLocalization::getCurrentLocale() == 'ar' ?  $agenda->description_ar : $agenda->description_en }}</p>
                 
                </div>

                <ul class="agenda-details-list">
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
@endpush
