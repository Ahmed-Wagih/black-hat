@extends('web.layouts.app')
@section('page_title', 'Edit Profile')
@section('content')
    <section class="auth-page edit-page">
        <div class="main">
            <div class="content">
            <div class="title">
                 <a href="{{ route('web.home') }}">
                    <img src="{{ asset('web/images/back.svg') }}" alt="" />
                </a>
                <h2>{{ __('admin.editprofile') }}</h2>
            </div>
             
                <form action="{{ route('web.updateprofile') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    @error('error')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                
                    <div class="form-group">
                        <div class="images-selector">
                            <div class="row">
                                @for ($i = 1; $i <= 6; $i++)
                                    <div class="col-4">
                                        <div class="image-selector p-1">
                                            <img class="img-fluid" id="image{{ $i }}" src="{{ getImage('Users', $i . '.jpeg') }}" alt="" onclick="selectProfileImage('{{ $i }}')">
                                            <input class="form-check-input" id="check{{ $i }}" name="profile_image" type="radio" value="{{ $i . '.jpeg' }}"  {{ auth()->user()->profile_image == $i . '.jpeg' ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                            @error('profile_image')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fullName">{{ __('admin.username') }}</label>
                        <input id="fullName" type="text" name="full_name"
                            class="form-control @error('full_name') is-invalid @enderror"
                            placeholder="{{ __('Enter your name') }}" id="exampleInputFullName" aria-describedby="emailHelp"
                            autocomplete="off" aria-describedby="validationFullName"
                            value="{{ old('full_name', auth()->user()->full_name) }}">
                        @error('full_name')
                            <div id="validationFullName" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gamerId">{{ __('admin.Position') }}</label>
                        <input id="gamerId" type="text" name="position"
                            value="{{ old('position', auth()->user()->position) }}"
                            class="form-control @error('position') is-invalid @enderror"
                            placeholder="{{ __('Enter your Position') }}" id="exampleInputGamerId"
                            aria-describedby="emailHelp" autocomplete="off" aria-describedby="validationGamerId">
                        @error('position')
                            <div id="validationGamerId" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gamerId">{{ __('admin.CompanyName') }}</label>
                        <input id="gamerId" type="text" name="company_name"
                            value="{{ old('company_name', auth()->user()->company_name) }}"
                            class="form-control @error('company_name') is-invalid @enderror"
                            placeholder="{{ __('Enter your Company') }}" id="exampleInputGamerId"
                            aria-describedby="emailHelp" autocomplete="off" aria-describedby="validationGamerId">
                        @error('company_name')
                            <div id="validationGamerId" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('admin.Email') }}</label>
                        <input type="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                            class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com"
                            id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off"
                            aria-describedby="validationServer03Feedback">
                        @error('email')
                            <div id="validationServer03Feedback" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">{{ __('admin.password') }}</label>
                        <input id="password" type="password" name="password"
                            class="form-control password  @error('password') is-invalid @enderror"
                            placeholder="{{ __('Enter your password') }}" id="password">
                        @error('password')
                            <div id="validationServer03Feedback" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn main-button">{{ __('admin.edit') }}</button>
                </form>
            </div>
        </div>
    </section>




@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $(".toggle-password").click(function() {
                const passwordInput = $("#password");
                if (passwordInput.attr("type") === "password") {
                    passwordInput.attr("type", "text");
                    $(this).removeClass("bi-eye-slash");
                    $(this).addClass("bi-eye");
                } else {
                    passwordInput.attr("type", "password");
                    $(this).removeClass("bi-eye");
                    $(this).addClass("bi-eye-slash");
                }
            });
        });


        function previewImage(event) {
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('preview-image').src = e.target.result;
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

        function selectProfileImage(id) {
            $("#check" + id).prop('checked', true)
        }
    </script>
@endpush
