@extends('dashboard.layouts.app')
@section('page_title', 'challenges List')
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

                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">{{ __('admin.challenges') }}</li><!--end::Item-->
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
            <!--begin::challenges-->
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
                        placeholder="{{ __('admin.search') }} {{ __('admin.challenge') }}" />
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
                    <a href="{{ route('challenges.create') }}" type="button" class="btn btn-primary"
                        data-bs-toggle="tooltip">
                        {{ __('admin.add') }} {{ __('admin.challenge') }}
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
                        <th>{{ __('admin.qr') }}</th>
                        <th>{{ __('admin.Name') }}</th>
                        <th>{{ __('admin.cover_image') }}</th>
                        <th>{{ __('admin.category') }}</th>
                        <th>{{ __('admin.points') }}</th>
                        <th>{{ __('admin.player_number') }}</th>
                        <th>{{ __('admin.match_number') }}</th>
                        <th>{{ __('admin.number_top') }}</th>

                        <th class="text-end min-w-100px">{{ __('admin.Actions') }}</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">

                    @if($challenges->count() > 0)
                    @foreach ($challenges as $key=>$challenge)
                    <tr class="odd" id="sid{{ $challenge->id }}">
                        <td><input type="checkbox" class="checkBoxclass row-selected form-check-input"
                                name="ids" value="{{ $challenge->id }}" /></td>
                        <td>{{ $key+1 }}</td>
                        <td>
                            {!! QrCode::size(100)->generate(route('web.challenges.scan', $challenge->id)) !!}
                        </td>
                        <td >{{ LaravelLocalization::getCurrentLocale() == 'ar' ? $challenge->name_ar : $challenge->name_en  }}</td>
                        <td>
                            @if ($challenge->cover_image)
                                <img src="{{ getImage('Challenges', $challenge->cover_image) }}" class="w-35px me-3"
                                    alt="{{ LaravelLocalization::getCurrentLocale() == 'ar' ? $challenge->name_ar : $challenge->name_en  }}">
                            @else
                                <img src="/storage/Images/notfound.png" class="w-35px me-3"
                                    alt="{{ LaravelLocalization::getCurrentLocale() == 'ar' ? $challenge->name_ar : $challenge->name_en  }}">
                            @endif
                        </td>


                        <td>{{ LaravelLocalization::getCurrentLocale() == 'ar' ? $challenge->challengecategory->name_ar : $challenge->challengecategory->name_en  }} </td>
                        <td>{{ $challenge->pointes  }} </td>
                        <td>{{ $challenge->player_number  }} </td>
                        <td>{{ $challenge->match_number  }} </td>
                        <td>{{ $challenge->number_top  }} </td>
                        <td>
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                {{ __('admin.Actions') }}
                                <span class="svg-icon svg-icon-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="{{ route('challenges.edit',$challenge->id) }}" class="menu-link px-3 d-flex justify-content-between" data-kt-docs-table-filter="edit_row">
                                        <span>{{ __("admin.edit")}}</span>
                                        <span>  <i class="fa fa-edit text-primary"></i> </span>
                                    </a>
                                </div>
                                <!--end::Menu item-->
                                @php
                                        $name =LaravelLocalization::getCurrentLocale() == 'ar' ? $challenge->name_ar : $challenge->name_en;
                                @endphp
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <span  class="menu-link px-3 d-flex justify-content-between" onclick="deleteitem({{$challenge->id }},'{{ $name }}')">
                                         <span> {{  __('admin.delete')}}</span>
                                        <span>  <i class="fa fa-trash text-danger"></i> </span>
                                    </span>
                                </div>

                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->

                        </td>

                    </tr>


                @endforeach
                @else
                <tr class="odd">
                    <td colspan="10" style="text-align:center">{{ __('No data available in table') }}
                    </td>
                </tr>
                @endif
            </tbody>
        </table><!--end::Datatable-->
        {!! $challenges->links() !!}
            <!--end::challenges-->
        </div><!--end::Container-->
    </div><!--end::Post-->

@endsection
@push('scripts')
    {{--    ?v={{ now() }} --}}
    <script>
        var route = "{{ route('challenges.index', Request()->all()) }}";
        var csrfToken = "{{ csrf_token() }}";
    </script>
    <script src="{{ asset('dashboard-assets/datatables/deletechallenges.js') }}"></script>
    <script>
        setTimeout(function() {
            document.getElementById('success-message').style.display = 'none';
        }, 5000);
    </script>
@endpush
