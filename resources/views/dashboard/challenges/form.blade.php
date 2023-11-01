<!-- begin :: Row -->
<div class="row mb-8">
    <div class="col-md-6 fv-row mb-7">
        <!--begin::Label-->
        <label class="d-block fw-semibold fs-6 mb-5">@lang('admin.cover_image')</label>
        <!--end::Label-->

        <!--begin::Image input-->
        <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true"
            style="background-image: url('{{ isset($challenge) && $challenge->cover_image ? getImage('challenges', $challenge->cover_image) : 'assets/media/svg/avatars/blank.svg' }}')">
            <!--begin::Preview existing avatar-->
            <div class="image-input-wrapper w-125px h-125px"></div>
            <!--end::Preview existing avatar-->

            <!--begin::Label-->
            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>

                <!--begin::Inputs-->
                <input type="file" id="cover_image_inp" name="cover_image" accept=".png, .jpg, .jpeg" />
                <input type="hidden" name="avatar_remove" />
                <!--end::Inputs-->
            </label>
            <!--end::Label-->

            <!--begin::Cancel-->
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" title="Cancel avatar">
                <i class="ki-outline ki-cross fs-3"></i>
            </span>
            <!--end::Cancel-->

            <!--begin::Remove-->
            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="remove" data-bs-toggle="tooltip" title="Remove avatar">
                <i class="ki-outline ki-cross fs-3"></i>
            </span>
            <!--end::Remove-->
        </div>
        <!--end::Image input-->

        <!--begin::Hint-->
        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>

        <!--end::Hint-->
    </div>



</div><!-- end   :: Row -->

<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">@lang('admin.name_ar')</label>
        <div class="form-floating">
            <input type="text" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar_inp"
                name="name_ar" value="{{ old('name_ar', isset($challenge) ? $challenge : '') }}" autocomplete="off" />
            <label for="name_ar_inp">@lang('admin.name_ar')</label>
        </div>
        <p class="invalid-feedback" id="name_ar_inp"></p>

    </div><!-- end   :: Column -->
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">@lang('admin.name_en')</label>
        <div class="form-floating">
            <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en_inp"
                name="name_en" value="{{ old('name_en', isset($challenge) ? $challenge : '') }}" autocomplete="off" />
            <label for="name_en_inp">@lang('admin.name_en')</label>
        </div>
        <p class="invalid-feedback" id="name_en_inp"></p>

    </div><!-- end   :: Column -->

</div>
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">@lang('admin.description_ar')</label>
        <div class="form-floating">
            <textarea type="text" class="form-control @error('description_ar') is-invalid @enderror" id="description_ar_inp"
                name="description_ar" autocomplete="off">{{ old('description_ar', isset($challenge) ? $challenge : '') }}</textarea>
            <label for="description_ar_inp">@lang('admin.description_ar')</label>
        </div>
        <p class="invalid-feedback" id="description_ar_inp"></p>

    </div><!-- end   :: Column -->
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">@lang('admin.description_en')</label>
        <div class="form-floating">
            <textarea type="text" class="form-control @error('description_en') is-invalid @enderror" id="description_en_inp"
                name="description_en" autocomplete="off">{{ old('description_en', isset($challenge) ? $challenge : '') }}</textarea>
            <label for="description_en_inp">@lang('admin.description_en')</label>
        </div>
        <p class="invalid-feedback" id="description_en_inp"></p>

    </div><!-- end   :: Column -->

</div>
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">@lang('admin.pointes')</label>
        <div class="form-floating">
            <input type="number" class="form-control @error('pointes') is-invalid @enderror" id="pointes_inp"
                name="pointes" value="{{ old('pointes', isset($challenge) ? $challenge : '') }}" autocomplete="off" />
            <label for="pointes_inp">@lang('admin.pointes')</label>
        </div>
        <p class="invalid-feedback" id="pointes_inp"></p>

    </div><!-- end   :: Column -->
  <!-- begin :: Column -->
  <div class="col-md-6 fv-row">
    <label class="fs-5 fw-bold mb-2 ">@lang('admin.player_number')</label>
    <div class="form-floating">
        <input type="number" class="form-control @error('player_number') is-invalid @enderror" id="player_number_inp"
            name="player_number" value="{{ old('player_number', isset($challenge) ? $challenge : '') }}" autocomplete="off" />
        <label for="player_number_inp">@lang('admin.player_number')</label>
    </div>
    <p class="invalid-feedback" id="player_number_inp"></p>

</div><!-- end   :: Column -->

</div>
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 ">@lang('admin.match_number')</label>
        <div class="form-floating">
            <input type="number" class="form-control @error('match_number') is-invalid @enderror" id="match_number_inp"
                name="match_number" value="{{ old('match_number', isset($challenge) ? $challenge : '') }}" autocomplete="off" />
            <label for="match_number_inp">@lang('admin.match_number')</label>
        </div>
        <p class="invalid-feedback" id="match_number_inp"></p>

    </div><!-- end   :: Column -->
  <!-- begin :: Column -->
  <div class="col-md-6 fv-row">
    <label class="fs-5 fw-bold mb-2 ">@lang('admin.number_top')</label>
    <div class="form-floating">
        <input type="number" class="form-control @error('number_top') is-invalid @enderror" id="number_top_inp"
            name="number_top" value="{{ old('number_top', isset($challenge) ? $challenge : '') }}" autocomplete="off" />
        <label for="number_top_inp">@lang('admin.number_top')</label>
    </div>
    <p class="invalid-feedback" id="number_top_inp"></p>

</div><!-- end   :: Column -->

</div>
<div class="row mb-8">

    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('admin.categories') }}</label>
        <div class="form-floating">
            <select class="form-select" id="floatingSelect" name="challenge_category_id"
                aria-label="{{ __('admin.please-choose') }}">
                <option disabled>{{ __('admin.please-choose') }} {{ __('admin.Roles') }}</option>
                @foreach ($challengecategories as $challengecategory)
                    @if (isset($challenge))
                        <option value="{{ $challengecategory->id }}"
                            {{ old('challenge_category_id', $challengecategory->id) == $challenge->challenge_category_id ? 'selected' : '' }}>
                            {{ LaravelLocalization::getCurrentLocale() == 'en' ? $challengecategory->name_en : $challengecategory->name_ar }}
                        </option>
                    @else
                        <option value="{{ $challengecategory->id }}"
                            {{ old('challenge_category_id') && old('challenge_category_id') == $challengecategory->id ? 'selected' : '' }}>
                            {{ LaravelLocalization::getCurrentLocale() == 'en' ? $challengecategory->name_en : $challengecategory->name_ar }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="status">{{ __('admin.please-choose') }} {{ __('admin.categories') }}</label>
        </div>

    </div><!-- end   :: Column -->

</div>
{{-- @push('scripts')
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\AgendaRequest') !!}
@endpush --}}
