@extends('web.layouts.app')
@section('page_title', 'Age')
@section('content')
    <section class="age-page">
        <div class="main">
            <form action="{{ route('web.age') }}" method="POST">
                @csrf
                <div class="content">
                    <div class="title">
                        <h2 class="text-center"> @lang('admin.Age')</h2>
                        <p class="text-center"> @lang('admin.Agep') </p>
                    </div>
                    <canvas id="age-input"></canvas>
                    <input type="hidden" id="age" name="age" value="">
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
<script src="{{ asset('web/js/spinner_picker.js') }}"></script>
<script>
            function init() {
                /* Example-1
                 * Select a number between (including) 1 and 99.
                 */
                new SpinnerPicker(
                    document.getElementById("age-input"),
                    function(index) {
                        // Check if the index is below zero or above 99 - Return null in this case
                        if(index < 20 || index > 99) {
                            return null;
                        }
                        return index;
                    }, { index: 21 , selection_color:"#005AFA"},
                    function(index) {
                       document.getElementById("age").value =this.getValue()

                    }

                )
                }
</script>
@endpush
