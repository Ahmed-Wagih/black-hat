@extends('web.layouts.app')
@section('page_title', 'Chats')
@section('content')
    <section class="chats-page">
        <div class="main">
            <div class="content">
                <div class="search">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend"> <span lass="input-group-text" id=" basic-addon1">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </div>
                        <input id="searchInput" type="text" class="form-control" placeholder="Search" aria-label="Search"
                             aria-describedby="basic-addon1">
                    </div>
                </div>
    
                <div class="p-3">
                    <h3 class="m-3">{{ __('admin.interests') }}</h3>
                    <div class="categories">
                        <a href="{{ route('web.chats') }}">
                            <div class="category">
                                <span>{{ __('All') }}</span>
                            </div>
                        </a>
                        @foreach (App\Models\Interest::get() as $interest)
                            <a href="{{ route('web.chats', ['interest_id' => $interest->id]) }}">
                                <div class="category">
                                    <img src=" {{ getImage('Interests', $interest->icon) }}"
                                        alt="" />
                                    <span>{{ LaravelLocalization::getCurrentLocale() == 'ar' ? $interest->name_ar : $interest->name_en }}</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>


                <div class="chats">
                    @foreach ($users as $index => $user)
                        <a href="{{ route('web.chat', $user->id) }}" class="text-decoration-none">
                            <div class="chat">
                                <div class="chat_info">
                                    <div class="chat_avatar">
                                        <img src="{{ getImage('Users', $user->profile_image) }}" alt="" />
                                    </div>
                                    <div>
                                        <h3 class="contact_name">{{ $user->full_name }}</h3>
                                        @if ($user->lastMessage() && $user->lastMessage()->message)
                                            <p class="contact_msg">{{ $user->lastMessage()->message }}</p>
                                        @endif
                                    </div>
                                </div>

                                <div class="chat_status">
                                    @if ($user->lastMessage() && $user->lastMessage()->message)
                                        <div class="chat_date new">{{ $user->lastMessage()->created_at->format('g:i A') }}
                                        </div>
                                    @endif

                                    @if (count($user->unSeenMessages()))
                                        <div class="messages_count">{{ count($user->unSeenMessages()) }}</div>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                @include('web.layouts.nav')

            </div>
    </section>
@endsection
@push('scripts')
    <script>
        let searchInput = $("#searchInput").on('keyup', function() {
            $('.chats').html('<p class="text-center mt-5 mb-5">{{ __('Searching.........') }}</p>');

            let search = $(this).val();
            let url = "{{ route('web.chat.search') }}";
            let form = $(this);
            let formData = new FormData();
            let token = "{{ csrf_token() }}";
            formData.append('search', search);
            formData.append('_token', token);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // if (response.success) {
                    $('.chats').html(response);
                    // }
                },
                error: function(xhr, status, error) {
                    // Error handler
                    console.log('Request failed!');
                    console.log('Status: ' + status);
                    console.log('Error: ' + error);
                    // Add your code to handle the error here
                }
            });
        });

    </script>
@endpush
