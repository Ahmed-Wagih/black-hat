@extends('web.layouts.app')
@section('page_title', 'Login')
@section('content')
    <section class="auth-page login-page">
        <div class="main">
            <div class="content">
                <h2>{{ __('Welcome Back!') }}</h2>
                <form action="{{ route('web.login') }}" method="POST">
                    @csrf
                    @error('error')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <div class="form-group">
                            <label for="exampleInputEmail1">{{ __('admin.Email') }}</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" autocomplete="off" aria-describedby="validationServer03Feedback" />
                            @error('email')
                                <div id="validationServer03Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">{{ __('admin.password') }}</label>
                            <input type="password" name="password" class="form-control password  @error('password') is-invalid @enderror" id="password" />
                            <span><i class="bi bi-eye-slash toggle-password"></i></span>
                            @error('password')
                                <div id="validationServer03Feedback" class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-between mt-4 mb-4">
                            <label class="form-check-label" for="flexSwitchCheckChecked">{{ __('Remember me') }}</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked />
                            </div>
                        </div>
                    </div>
                    <div class="footer">
                        <button type="submit" class="btn main-button mb-2">{{ __('Sign in') }}</button>
                        <a href="{{ route('web.register') }}" class="btn sub-button">{{ __('No account yet?') }} <span>{{ __('Sign up') }}</span></a>
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
    </script>
@endpush
