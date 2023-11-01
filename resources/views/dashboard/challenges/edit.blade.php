@extends('dashboard.layouts.app')
@section('page_title', 'edit Challenge')

@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar d-flex flex-stack mb-3 mb-lg-5" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            @component('dashboard.components.breadcrumb')
                @slot('titleBreadcrumb')
                    {{ __('admin.challenges') }}
                @endslot

                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('challenges.index') }}" class="text-muted text-hover-primary">
                        {{ __('admin.challenges') }}</a>
                </li><!--end::Item-->

                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li><!--end::Item-->

                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">{{ $challenge->name }}</li><!--end::Item-->
            @endcomponent
            <!--end::Page title-->
        </div><!--end::Container-->
    </div><!--end::Toolbar-->

    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-10">
            {{-- @dd($errors) --}}
            <!-- begin :: Card body -->
            <div class="card-body">
                {{-- @dd($errors) --}}
                <!-- begin :: Form -->
                <form action="{{ route('challenges.update', $challenge->id) }}" enctype="multipart/form-data" class="form" method="post" id="submitted-form"
                    data-redirection-url="{{ route('challenges.index') }}" >
                    @csrf
                    @method('PUT')
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <!-- begin :: Card header -->
                    <div class="card-header d-flex align-items-center">
                        <h3 class="fw-bolder text-dark p-">{{ __('admin.edit') }} {{ __('admin.Challenge') }}</h3>
                    </div><!-- end   :: Card header -->

                    @include(checkView('dashboard.challenges.form'))



                    <!-- begin :: Form footer -->
                    <div class="form-footer">
                        <!-- begin :: Submit btn -->
                        <button type="submit" class="btn btn-primary" id="submit-btn">
                            <span class="indicator-label">{{ __('admin.edit') }}</span>
                            <!-- begin :: Indicator -->
                            <span class="indicator-progress">{{ __('admin.please-wait') }}
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span><!-- end   :: Indicator -->
                        </button><!-- end   :: Submit btn -->
                        <a class="btn btn-secondary" href="{{ route('challenges.index') }}"> {{ __('admin.cancel') }} </a>
                    </div><!-- end   :: Form footer -->

                </form><!-- end   :: Form -->
            </div><!-- end   :: Card body -->
        </div>
    </div>

@endsection
