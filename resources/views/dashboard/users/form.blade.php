<div class="form-group mb-5">
    <div class="images-selector">
        <div class="row">
            @for ($i = 1; $i <= 6; $i++)
                <div class="col-2">
                    <div class="image-selector p-1">
                        <img class="img-fluid" id="image{{ $i }}" src="{{ getImage('Users', $i . '.jpeg') }}"
                            alt="" onclick="selectProfileImage('{{ $i }}')">
                        <input class="form-check-input" id="check{{ $i }}" name="profile_image"
                            type="radio" value="{{ $i . '.jpeg' }}"
                            {{ $user->profile_image == $i . '.jpeg' ? 'checked' : '' }}>
                    </div>
                </div>
            @endfor
        </div>
        @error('profile_image')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
</div>

<!-- begin :: Row -->
<div class="row mb-8 mt-50">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('Username') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="full_name_inp" name="full_name"
                value="{{ old('full_name', isset($user) ? $user : '') }}" autocomplete="off" />
            <label for="full_name_inp">{{ __('Enter the Username') }}</label>
        </div>
        @if ($errors->has('full_name'))
            <div class="text-danger">{{ $errors->first('full_name') }}</div>
        @endif
    </div><!-- end   :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('Email') }}</label>
        <div class="form-floating">
            <input type="email" class="form-control" id="email_inp" name="email"
                value="{{ old('email', isset($user) ? $user : '') }}" autocomplete="off" />
            <label for="email_inp">{{ __('Enter the email') }}</label>
        </div>
        @if ($errors->has('email'))
            <div class="text-danger">{{ $errors->first('email') }}</div>
        @endif
    </div>
</div><!-- end   :: Row -->


<div class="row mb-8">

    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('admin.CompanyName') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="company_name_inp" name="company_name"
                value="{{ old('company_name', isset($user) ? $user : '') }}" autocomplete="off" />
            <label for="company_name_inp">{{ __('Enter the Company Name') }}</label>
        </div>
        @if ($errors->has('company_name'))
            <div class="text-danger">{{ $errors->first('company_name') }}</div>
        @endif
    </div><!-- end   :: Column -->
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('admin.Position') }}</label>
        <div class="form-floating">
            <input type="text" class="form-control" id="position_inp" name="position"
                value="{{ old('position', isset($user) ? $user : '') }}" autocomplete="off" />
            <label for="position_inp">{{ __('Enter the position') }}</label>
        </div>
        @if ($errors->has('position'))
            <div class="text-danger">{{ $errors->first('position') }}</div>
        @endif
    </div><!-- end   :: Column -->
</div>


<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2">{{ __('Password') }}</label>
        <div class="form-floating">
            <input type="password" class="form-control" id="password_inp" name="password" autocomplete="off" />
            <label for="password_inp">{{ __('Enter the password') }}</label>
        </div>
        <p class="invalid-feedback" id="password"></p>
        @if ($errors->has('password'))
            <div class="text-danger">{{ $errors->first('password') }}</div>
        @endif
    </div><!-- end   :: Column -->
    <!-- begin :: Column -->
    <div class="col-md-6 fv-row">
        <label class="fs-5 fw-bold mb-2">{{ __('Password confirmation') }}</label>
        <div class="form-floating">
            <input type="password" class="form-control" id="password_confirmation_inp" name="password_confirmation"
                autocomplete="off" />
            <label for="password_confirmation_inp">{{ __('Enter the password confirmation') }}</label>
        </div>
        <p class="invalid-feedback" id="password_confirmation"></p>
    </div><!-- end   :: Column -->
    @if ($errors->has('password_confirmation'))
        <div class="text-danger">{{ $errors->first('password_confirmation') }}</div>
    @endif
</div>


<div class="row mb-8">
    <!-- begin :: Column -->
    <div class="col-md-12 fv-row">
        <label class="fs-5 fw-bold mb-2 required">{{ __('admin.interests') }}</label>
        <div class="form-floating">
            <select id="floatingSelect"  class="form-select" data-control="select2" data-placeholder="Select an option" aria-label="{{ __('admin.please-choose') }}" name="interests[]" multiple>

                <option disabled>{{ __('admin.please-choose') }}</option>
                @foreach ($interests as $interest)
                    @if (isset($user))
                        <option value="{{ $interest->id }}"
                            {{ old('interests') ? (1 == 1 ? 'selected' : '') : (in_array($interest->id, $user->interests->pluck('id')->toArray()) ? 'selected' : '') }}>
                            {{ LaravelLocalization::getCurrentLocale() == 'en' ? $interest->name_en : $interest->name_ar }}
                        </option>
                    @else
                        <option value="{{ $interest->id }}"
                            {{ old('interests') && old('interests') == $interest->id ? 'selected' : '' }}>
                            {{ LaravelLocalization::getCurrentLocale() == 'en' ? $interest->name_en : $interest->name_ar }}
                        </option>
                    @endif
                @endforeach
            </select>
            <label for="interest">{{ __('admin.please-choose') }} {{ __('admin.interest') }}</label>
        </div>

    </div><!-- end   :: Column -->
</div>




@push('styles')
    <style>
        .images-selector .image-selector {
            text-align: center;
        }

        .images-selector .image-selector img {
            display: block;
            margin: 6px auto;
            border-radius: 50%;
            height: 80px;
            width: 80px;
            text-align: center;
            border: 2px solid #0f1464;
            padding: 2px;
        }
    </style>
@endpush

@push('scripts')
    <script src="{{ asset('vendor/jsvalidation/js/jsvalidation.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\UserRequest') !!}
    <script>
        // Define form element
        const form = document.getElementById('floatingSelect');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form, {
                fields: {
                    'select2_input': {
                        validators: {
                            notEmpty: {
                                message: 'Select2 input is required'
                            }
                        }
                    },
                },

                plugins: {
                    trigger: new FormValidation.plugins.Trigger(),
                    bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row',
                        eleInvalidClass: '',
                        eleValidClass: ''
                    })
                }
            }
        );

        // Revalidate Select2 input. For more info, plase visit the official plugin site: https://select2.org/
        $(form.querySelector('[name="select2_input"]')).on('change', function() {
            // Revalidate the field when an option is chosen
            validator.revalidateField('select2_input');
        });

        function selectProfileImage(id) {
            $("#check" + id).prop('checked', true)
        }
    </script>
@endpush
