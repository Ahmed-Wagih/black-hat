@if (isset($challenges) && count($challenges))
    <h5 class="title">{{ __('admin.challenges') }}</h5>
    <ul class="links-list">
        @foreach ($challenges as $challenge)
            <li><a href="{{ route('web.challenges.show', $challenge->id) }}">{{ LaravelLocalization::getCurrentLocale() == 'ar' ? $challenge->name_ar : $challenge->name_en }} </a></li>
        @endforeach
    </ul>
@endif
@if (isset($agendas) && count($agendas))
    <h5 class="title">{{ __('admin.agendas') }}</h5>
    <ul class="links-list">
        @foreach ($agendas as $agenda)
            <li><a href="{{ route('web.agenda.show', $agenda->id) }}">{{ LaravelLocalization::getCurrentLocale() == 'ar' ? $agenda->name_ar : $agenda->name_en }} </a></li>
        @endforeach
    </ul>
@endif

