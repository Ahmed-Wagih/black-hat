<!-- begin :: Row -->
<div class="row mb-8">
    <div class="fv-row mb-7">
        <!--begin::Label-->
        <label class="d-block fw-semibold fs-6 mb-5">Image Input</label>
        <!--end::Label-->

        <!--begin::Image input-->
        <div class="image-input image-input-outline image-input-empty" data-kt-image-input="true"
        style="background-image: url('{{ isset($category) && $category->icon ? getImage('Categories',$category->icon)  : 'assets/media/svg/avatars/blank.svg' }}')">
            <!--begin::Preview existing avatar-->
            <div class="image-input-wrapper w-125px h-125px"></div>
            <!--end::Preview existing avatar-->

            <!--begin::Label-->
            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                data-kt-image-input-action="change" data-bs-toggle="tooltip" title="Change avatar">
                <i class="ki-duotone ki-pencil fs-6"><span class="path1"></span><span class="path2"></span></i>

                <!--begin::Inputs-->
                <input type="file" {{ isset($category) ? '' : 'required' }} name="icon" accept=".png, .jpg, .jpeg" />
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
             name="name_ar"  value="{{ old('name_ar', isset($category) ? $category : '') }}"
             autocomplete="off" />
         <label for="name_ar_inp">@lang('admin.name_ar')</label>
     </div>
     <p class="invalid-feedback" id="name_ar_inp" ></p>

 </div><!-- end   :: Column -->
 <!-- begin :: Column -->
 <div class="col-md-6 fv-row">
     <label class="fs-5 fw-bold mb-2 required">@lang('admin.name_en')</label>
     <div class="form-floating">
         <input type="text" class="form-control @error('name_en') is-invalid @enderror" id="name_en_inp"
             name="name_en"  value="{{ old('name_en', isset($category) ? $category : '') }}"
             autocomplete="off" />
         <label for="name_en_inp">@lang('admin.name_en')</label>
     </div>
     <p class="invalid-feedback" id="name_en_inp" ></p>

 </div><!-- end   :: Column -->

</div>

<div class="row mb-8">
<!-- begin :: Column -->
<div class="col-md-6 fv-row">
    <label class="fs-5 fw-bold mb-2 required">@lang('admin.background')</label>
    <div class="form-floating">
        <input type="color" class="form-control @error('background') is-invalid @enderror" id="background_inp"
            name="background"  value="{{ old('background', isset($category) ? $category : '') }}"
            autocomplete="off" />
        <label for="background_inp">@lang('admin.background')</label>
    </div>
    <p class="invalid-feedback" id="background_inp" ></p>

</div><!-- end   :: Column -->


</div>

{{-- @push('scripts')
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\CategoryRequest') !!}
@endpush --}}
