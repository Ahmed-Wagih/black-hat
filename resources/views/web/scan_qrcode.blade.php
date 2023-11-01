@extends('web.layouts.app')
@section('page_title', 'Scan QR Code')
@section('content')
    <section class="statics-page">
        <div class="main">
            <div class="content">
                <div class="title">
                    <a href="{{ route('web.home') }}"><img src="{{ asset('web/images/back.svg') }}" alt="" /></a>
                </div>

                 <div id="reader" width="100%"></div>

                <div id="goToLink" class="box d-flex gap-4 justify-content-evenly mt-5">
                    
                </div>


            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        // To use Html5QrcodeScanner (more info below)
        import {
            Html5QrcodeScanner
        } from "html5-qrcode";

        // To use Html5Qrcode (more info below)
        import {
            Html5Qrcode
        } from "html5-qrcode";
    </script>
    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            console.log(`Code matched = ${decodedText}`, decodedResult);
            $('#goToLink').html(`<a class="text-decoration-none d-block m-auto" href="${decodedText}" style="width: 100%;text-align: center;font-size: 22px;">{{ __('Get challenge points') }}</a>`);
            html5QrcodeScanner.clear();
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 144,
                qrbox: {
                    width: 250,
                    height: 250
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>

    <script>
        function openCamera() {
            $('#reader').toggleClass('d-none');
        }
    </script>
@endpush