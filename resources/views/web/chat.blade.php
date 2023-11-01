@extends('web.layouts.app')
@section('page_title', 'Chat')
@section('content')
    <section class="chat-page mt-5">
        <div class="chat">
            <div class="contact">
                <div class="info">
                    <a href="{{ route('web.chats') }}"><img src="{{ asset('web/images/back.svg') }}" alt="" /></a>
                    <div class="pic">
                        <img src="{{ getImage('Users', $user->profile_image) }}" alt="" />
                    </div>
                    <div>
                        <h2 class="name">
                            {{ $user->full_name }}
                        </h2>
                        <small class="seen">
                            @lang('admin.Online')
                        </small>
                    </div>
                </div>
                <button><img src="{{ asset('web/images/dots.svg') }}" /></button>
            </div>
            <div class="messages" id="chat">
                {{-- <div class="time">
                    Today
                </div> --}}
                @foreach ($messages as $message)
                    @if ($message->sender_id == auth()->user()->id)
                        <div class="message user">
                            <div class="sender">
                                <img src="{{ getImage('Users', auth()->user()->profile_image) }}" />
                            </div>
                            <p>{{ $message->message }}</p>
                            <div class="msg_status">
                                <img src="{{ asset('web/images/seen.svg') }}" />
                                <span>{{ $message->created_at->format('g:i A') }}</span>
                            </div>
                        </div>
                    @else
                        <div class="message">
                            <div class="sender">
                                <img src="{{ getImage('Users', $user->profile_image) }}" />
                            </div>
                            <p>{{ $message->message }}</p>
                            <div class="msg_status">
                                <span>{{ $message->created_at->format('g:i A') }}</span>
                            </div>
                        </div>
                    @endif
                @endforeach


            </div>
            <div class="footer">
                <div class="emojiTooltip" role="tooltip"
                    style="position: absolute; inset: 0px auto auto 0px; margin: 0px; transform: translate3d(0px, 29.5px, 0px);"
                    data-popper-placement="top">
                    <emoji-picker></emoji-picker>
                </div>
                <div class="input">
                    <button class="emoji"><img src="{{ asset('web/images/emoji.svg') }}" /></button>
                    <input id="chatInput" placeholder="Write a message..." type="text">
                </div>
                <button id="sendMessage"><img src="{{ asset('web/images/send.svg') }}" /></button>
            </div>
        </div>
    </section>

@endsection
@push('scripts')
    <script type="module" src="https://cdn.jsdelivr.net/npm/emoji-picker-element@^1/index.js"></script>
    <script type="module">
        import insertText from 'https://cdn.jsdelivr.net/npm/insert-text-at-cursor@0.3.0/index.js'
        document.querySelector('emoji-picker').addEventListener('emoji-click', e => {
            insertText(document.querySelector('input'), e.detail.unicode)
        })
    </script>
    <script type="module">
        import * as Popper from 'https://cdn.jsdelivr.net/npm/@popperjs/core@^2/dist/esm/index.js'

        const button = document.querySelector('.emoji')
        const tooltip = document.querySelector('.emojiTooltip')
        Popper.createPopper(button, tooltip)

        document.querySelector('.emoji').onclick = () => {
            tooltip.classList.toggle('shown')
        }

        $('#chat').scrollTop($('#chat').prop('scrollHeight'));
    </script>








    <script>
        function sendMessage() {
            let chatInput = $("#chatInput");
            let message = chatInput.val();
            let url = "{{ route('web.chat.send', $user->id) }}";
            let form = $(this);
            let formData = new FormData();
            let token = "{{ csrf_token() }}";
            let friendId = "{{ $user->id }}";
            formData.append('message', message);
            formData.append('_token', token);
            formData.append('user_id', friendId);

            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                dataType: 'JSON',
                success: function(response) {
                    // if (response.success) {
                    console.log(response.data);
                    chatInput.val('');
                    appendMessageToSender(message);
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
        }

        function appendMessageToSender(message) {
            let messageElment = `
            <div class="message user">
                    <div class="sender">
                        <img src="{{ getImage('Users', auth()->user()->profile_image) }}" />
                    </div>
                    <p>${message}</p>
                    <div class="msg_status">
                        <img src="{{ asset('web/images/seen.svg') }}" />
                        <span>9:18 PM</span>
                    </div>
                </div>
            `;
            $('#chat').append(messageElment);
            $('#chat').scrollTop($('#chat').prop('scrollHeight'));
        }

        function appendMessageToReceiver(message) {
            let messageElment = `
            <div class="message">
                    <div class="sender">
                        <img src="{{ getImage('Users', $user->profile_image) }}" />
                    </div>
                    <p>${message}</p>
                    <div class="msg_status">
                        <span>9:18 PM</span>
                    </div>
                </div>
            `;
            $('#chat').append(messageElment);
            $('#chat').scrollTop($('#chat').prop('scrollHeight'));
            
        }
        
    </script>
@endpush
