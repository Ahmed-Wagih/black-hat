@extends('dashboard.layouts.app')
@section('page_title', 'agendas List')
@section('content')
    <!--begin::Toolbar-->
    <div class="toolbar d-flex flex-stack mb-3 mb-lg-5" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            @component('dashboard.components.breadcrumb')
                @slot('titleBreadcrumb')
                    {{ __('admin.agendas') }}
                @endslot

                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">{{ __('admin.agendas') }}</li><!--end::Item-->
            @endcomponent
            <!--end::Page title-->


        </div><!--end::Container-->
    </div><!--end::Toolbar-->
    <div class="uploading-progress-bar d-none">
        <h3 class="text-center progress-title">Uploading...</h3>
        <div class="progress">
            <div id="progress-bar" class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">
                <h5 id="progress-bar-percentage"><strong>0%</strong></h5>
            </div>
        </div>
    </div>
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">

        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::agendas-->
            <!--begin::Wrapper-->
            <div class="d-flex flex-stack mb-5">
                <!--begin::Search-->
                <div class="d-flex align-items-center position-relative my-1">
                    <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                    <span class="svg-icon svg-icon-1 position-absolute ms-6">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                            <path
                                d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                fill="currentColor" />
                        </svg>
                    </span><!--end::Svg Icon-->

                    <input type="text" data-kt-docs-table-filter="search"
                        class="form-control form-control-solid w-250px ps-14"
                        placeholder="{{ __('admin.search') }} {{ __('admin.agenda') }}" />
                </div><!--end::Search-->

                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-docs-table-toolbar="base">
                    <!--begin::Filter-->


                    <!--begin::Menu 1-->
                    <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                        <!--begin::Header-->
                        <div class="px-7 py-5">
                            <div class="fs-5 text-dark fw-bold">Filter Options</div>
                        </div><!--end::Header-->

                        <!--begin::Separator-->
                        <div class="separator border-gray-200"></div><!--end::Separator-->

                        <!--begin::Content-->
                        <div class="px-7 py-5" data-kt-docs-table-filter="form">
                            <!--begin::Input group-->
                            <div class="mb-10">
                                <label class="form-label fs-6 fw-semibold">Team:</label>
                                <select class="form-select form-select-solid fw-bold" name="status" data-kt-select2="true"
                                    data-placeholder="Select option" data-allow-clear="true"
                                    data-kt-docs-table-filter="search" data-hide-search="true">
                                    <option></option>
                                    <option {{ old('team') == 'active' ? 'selected' : '' }} value="active">
                                        {{ __('Active') }}</option>
                                    <option {{ old('team') == 'pending' ? 'selected' : '' }} value="pending">
                                        {{ __('Pending') }}</option>
                                </select>
                            </div><!--end::Input group-->

                            <!--begin::Actions-->
                            <div class="d-flex justify-content-end">
                                <button type="reset" class="btn btn-light btn-active-light-primary fw-semibold me-2 px-6"
                                    data-kt-menu-dismiss="true" data-kt-docs-table-filter="reset">Reset</button>
                                <button type="submit" class="btn btn-primary fw-semibold px-6" data-kt-menu-dismiss="true"
                                    data-kt-docs-table-filter="filter">Apply</button>
                            </div><!--end::Actions-->
                        </div><!--end::Content-->
                    </div><!--end::Filter-->

                    <!--begin::Add customer-->
                    <a href="{{ route('agendas.create') }}" type="button" class="btn btn-primary" data-bs-toggle="tooltip">
                        {{ __('admin.add') }} {{ __('admin.agenda') }}
                    </a><!--end::Add customer-->
                </div><!--end::Toolbar-->

                <!--begin::Group actions-->
                <div class="d-flex justify-content-end align-items-center d-none" data-kt-docs-table-toolbar="selected">
                    <div class="fw-bold me-5">
                        <span class="me-2" data-kt-docs-table-select="selected_count"></span>Selected
                    </div>
                    <button type="button" class="btn btn-danger" data-kt-docs-table-select="delete_selected">Delete
                        Selected</button>
                </div>
                <!--end::Group actions-->
            </div><!--end::Wrapper-->
            @if (session('message'))
                <div id="success-message" class="alert alert-success">{{ session('message') }}</div>
            @endif
            <!--begin::Datatable-->
            <table id="kt_datatable_example_1" class="table align-middle table-row-dashed fs-6 gy-5">
                <thead>
                    <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                        <th class="w-10px pe-2">
                            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                <input class="form-check-input" type="checkbox" data-kt-check="true"
                                    data-kt-check-target="#kt_datatable_example_1 .form-check-input" value="1" />
                            </div>
                        </th>
                        <th> #</th>
                        <th>{{ __('admin.Name') }}</th>
                        <th>{{ __('admin.profile_Image') }}</th>
                        <th>{{ __('admin.category') }}</th>
                        <th>{{ __('admin.date') }}</th>
                        <th>{{ __('admin.address') }}</th>
                        <th class="text-end min-w-100px">{{ __('admin.Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                </tbody>
            </table><!--end::Datatable-->
            <!--end::agendas-->
        </div><!--end::Container-->
    </div><!--end::Post-->

@endsection
@push('scripts')
    {{--    ?v={{ now() }} --}}
    <script>
        var route = "{{ route('agendas.index', Request()->all()) }}";
        var csrfToken = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('dashboard-assets/datatables/agendas.js') }}"></script>
    <script>
        setTimeout(function(){
            document.getElementById('success-message').style.display = 'none';
        }, 5000);
    </script>
@endpush
