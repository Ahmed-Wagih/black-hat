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
            <p>{{ LaravelLocalization::getCurrentLocale() == 'ar' ? $interest->name_ar : $interest->name_en }}</p>
        </div>
    </div>
@endforeach

<script>
    $(document).ready(function() {
        $('.interest').on('click', function() {
            $(this).toggleClass('selected');
            $(this).find('.icon').toggleClass('d-none');
            $(this).find('.check-box').prop('checked', !$(this).find('.check-box').prop('checked'));
        });
    });
</script>