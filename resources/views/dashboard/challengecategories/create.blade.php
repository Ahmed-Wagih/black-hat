@extends('dashboard.layouts.app')
@section('page_title', 'Add New challengecategories')
@inject('admin', 'App\Models\ChallengeCategory')
@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar d-flex flex-stack mb-3 mb-lg-5" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            @component('dashboard.components.breadcrumb')
                @slot('titleBreadcrumb')
                    {{ __('admin.challengecategories') }}
                @endslot

                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('challengecategories.index') }}"
                        class="text-muted text-hover-primary">{{ __('admin.challengecategories') }}</a>
                </li><!--end::Item-->

                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li><!--end::Item-->

                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">{{ __('admin.add') }} {{ __('admin.challengecategory') }}</li><!--end::Item-->
            @endcomponent
            <!--end::Page title-->
        </div><!--end::Container-->
    </div><!--end::Toolbar-->

    <!--begin::Container-->
    <div id="kt_content_container" class="container-xxl">
        <div class="card mb-5 mb-xl-10">
            <!-- begin :: Card body -->
            <div class="card-body">
                <!-- begin :: Form -->
                <form action="{{ route('challengecategories.store') }}" class="form" method="post" id="submitted-form"
                    data-redirection-url="{{ route('challengecategories.index') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- begin :: Card header -->
                    <span class="fs-4 fw-bold pe-2">
                        <h3 class="text-gray-500">{{ __('admin.add') }} {{ __('admin.challengecategory') }}</h3>
                    </span><!-- end   :: Card header -->

                    @include(checkView('dashboard.challengecategories.form'))




                    <!-- begin :: Form footer -->
                    <div class="form-footer">
                        <!-- begin :: Submit btn -->
                        <button type="submit" class="btn btn-primary" id="submit-btn">
                            <span class="indicator-label">{{ __('admin.create') }}</span>
                            <!-- begin :: Indicator -->
                            <span class="indicator-progress">{{ __('admin.please-wait') }}
                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                            </span><!-- end   :: Indicator -->
                        </button><!-- end   :: Submit btn -->
                        <a class="btn btn-secondary" href="{{ route('challengecategories.index') }}"> {{ __('admin.cancel') }} </a>
                    </div><!-- end   :: Form footer -->

                </form><!-- end   :: Form -->
            </div><!-- end   :: Card body -->
        </div>
    </div>

@endsection
