@extends('web.layouts.app')
@section('page_title', 'Register')
@section('content')
    <section class="auth-page">
        <div class="main">
            <div class="content">
                <h2>{{ __('admin.start-the-game') }} !</h2>
                <form action="{{ route('web.register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
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
                                            <input class="form-check-input" id="check{{ $i }}" name="profile_image" type="radio" value="{{ $i . '.jpeg' }}">
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
                            placeholder="{{ __('Enter your name') }}" id="exampleInputFullName"
                            aria-describedby="emailHelp" autocomplete="off" aria-describedby="validationFullName">
                        @error('full_name')
                            <div id="validationFullName" class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1">{{ __('admin.Email') }}</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                            placeholder="name@example.com" id="exampleInputEmail1" aria-describedby="emailHelp"
                            autocomplete="off" aria-describedby="validationServer03Feedback">
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

                    <button type="submit" class="btn main-button mt-5">{{ __('admin.sign-up') }}</button>
                    <div class="footer text-center">
                        <p><strong class="text-center">{{ __('OR') }}</strong></p>
                        <a href="{{ route('web.login') }}" class="btn sub-button"><span>{{ __('Login') }}</span></a>
                    </div>
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

        function selectProfileImage(id) {
            $("#check" + id).prop('checked', true)
        }
    </script>
@endpush
