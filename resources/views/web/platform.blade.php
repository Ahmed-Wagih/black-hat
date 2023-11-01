@extends('web.layouts.app')
@section('page_title','Platform')
@section('content')
    <section class="platform-page">
        <div class="main">
            <div class="content">
                <div class="title">
                    <h2>@lang('admin.The-Platform')</h2>
                    <p>@lang('admin.The-Platform-p')</p>
                </div>
                <div class="boxes">
                    <div class="row gx-3 gy-3">
                        <div class="col-6">
                            <div class="box">
                                <h3>@lang('admin.Level-up-Area')</h3>
                                <p>@lang('admin.Level-up-Area-p')</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="box">
                                <h3>@lang('admin.Demo-Arena')</h3>
                                <p>@lang('admin.Demo-Arena-p')</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="box">
                                <h3>@lang('admin.Teater')</h3>
                                <p>@lang('admin.Teater-p')</p>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="box">
                                <h3>@lang('admin.X-Theater')</h3>
                                <p>@lang('admin.X-Theater-p')</p>
                            </div>
                        </div>
                    </div>

                </div>
             <div>

        </div>
    </section>
    @endsection
@push('scripts')


@endpush
