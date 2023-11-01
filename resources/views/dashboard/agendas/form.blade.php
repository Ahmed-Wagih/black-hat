<!-- begin :: Row -->
<div class="row mb-8">
    <div class="col-md-6 fv-row mb-7">
        <!--begin::Label-->
        <label class="d-block fw-semibold fs-6 mb-5">@lang('admin.cover_image')</label>
        <!--end::Label-->

        <!--begin::Image input-->
        <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true"
            style="background-image: url('{{ isset($agenda) && $agenda->cover_image ? getImage('agendas', $agenda->cover_image) : 'assets/media/svg/avatars/blank.svg' }}')">
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

    <div class="col-md-6 fv-row mb-7">
        <!--begin::Label-->
        <label class="d-block fw-semibold fs-6 mb-5">@lang('admin.profile_Image')</label>
        <!--end::Label-->

        <!--begin::Image input-->
        <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true"
            style="background-image: url('{{ isset($agenda) && $agenda->profile_image ? getImage('agendas', $agenda->profile_image) : 'assets/media/svg/avatars/blank.svg' }}')">
            <!--begin::Preview existing avatar-->
            <div class="image-input-wrapper w-125px h-125px"></div>
            <!--end::Preview existing avatar-->

            <!--begin::Label-->
            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>

                <!--begin::Inputs-->
                <input type="file" id="profile_image_inp" name="profile_image" accept=".png, .jpg, .jpeg" />
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
                name="name_ar" value="{{ old('name_ar', isset($agenda) ? $agenda : '') }}" autocomplete="off" />
            <label for="name_ar_inp">@lang('admin.name_ar')</label>
        </div>
        <p class="invalid-feedback" id="name_ar_inp"></p>

    </div><!-- end   :: Column -->
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">@lang('admin.name_en')</label>
        <div class="form-floating">
            <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en_inp"
                name="name_en" value="{{ old('name_en', isset($agenda) ? $agenda : '') }}" autocomplete="off" />
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
                name="description_ar" autocomplete="off">{{ old('description_ar', isset($agenda) ? $agenda : '') }}</textarea>
            <label for="description_ar_inp">@lang('admin.description_ar')</label>
        </div>
        <p class="invalid-feedback" id="description_ar_inp"></p>

    </div><!-- end   :: Column -->
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">@lang('admin.description_en')</label>
        <div class="form-floating">
            <textarea type="text" class="form-control @error('description_en') is-invalid @enderror" id="description_en_inp"
                name="description_en" autocomplete="off">{{ old('description_en', isset($agenda) ? $agenda : '') }}</textarea>
            <label for="description_en_inp">@lang('admin.description_en')</label>
        </div>
        <p class="invalid-feedback" id="description_en_inp"></p>

    </div><!-- end   :: Column -->

</div>
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">@lang('admin.date')</label>
        <div class="form-floating">
            <input type="date" class="form-control @error('date') is-invalid @enderror" id="date_inp"
                name="date" value="{{ old('date', isset($agenda) ? $agenda : '') }}" autocomplete="off" />
            <label for="date_inp">@lang('admin.date')</label>
        </div>
        <p class="invalid-feedback" id="date_inp"></p>

    </div><!-- end   :: Column -->
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">@lang('admin.time')</label>
        <div class="form-floating">
            <input type="time" class="form-control @error('time') is-invalid @enderror" id="time_inp"
                name="time" value="{{ old('time', isset($agenda) ? $agenda : '') }}" autocomplete="off" />
            <label for="name_en_inp">@lang('admin.time')</label>
        </div>
        <p class="invalid-feedback" id="time_inp"></p>

    </div><!-- end   :: Column -->

</div>
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">@lang('admin.address')</label>
        <div class="form-floating">
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address_inp"
                name="address" value="{{ old('address', isset($agenda) ? $agenda : '') }}" autocomplete="off" />
            <label for="address_inp">@lang('admin.address')</label>
        </div>
        <p class="invalid-feedback" id="address_inp"></p>

    </div><!-- end   :: Column -->

    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">@lang('admin.city')</label>
        <div class="form-floating">
            <input type="text" class="form-control @error('city') is-invalid @enderror" id="city_inp"
                name="city" value="{{ old('city', isset($agenda) ? $agenda : '') }}" autocomplete="off" />
            <label for="city_inp">@lang('admin.city')</label>
        </div>
        <p class="invalid-feedback" id="city_inp"></p>

    </div><!-- end   :: Column -->
</div>
<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('admin.categories') }}</label>
        <div class="form-floating">
            <select class="form-select" id="floatingSelect" name="category_id"
                aria-label="{{ __('admin.please-choose') }}">
                <option disabled>{{ __('admin.please-choose') }} {{ __('admin.Roles') }}</option>
                @foreach ($categories as $category)
                    @if (isset($agenda))
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $category->id) == $agenda->category_id ? 'selected' : '' }}>
                            {{ LaravelLocalization::getCurrentLocale() == 'en' ? $category->name_en : $category->name_ar }}
                        </option>
                    @else
                        <option value="{{ $category->id }}"
                            {{ old('category_id') && old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ LaravelLocalization::getCurrentLocale() == 'en' ? $category->name_en : $category->name_ar }}
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
